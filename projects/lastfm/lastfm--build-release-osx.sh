#!/bin/sh
#
# Usage: build-relese-osx.sh [--clean] [-j]
#
# RUN FROM INSIDE your lastfm root dir
#
# Adding the -j parameter results in building a japanese version.
################################################################################

# this script is a modified version of dist/build-release-osx.sh


# clean all:
# find . -name "Makefile" -type f -print | xargs rm
# rm src/libFingerprint/fplib/pro_qmake/Makefile.fplib

if [ ! -e Last.fm.xcodeproj ]; then
	echo "Error: run from inside your lastfm directory" 
	exit -1
fi


# needed for correct Makefile generation with qmake
export QMAKESPEC=macx-g++

ADDQTSCRIPT=`pwd`/`dirname $0`/lastfm--add-Qt-to-bundle.sh
DEPOSXSCRIPT=`pwd`/`dirname $0`/lastfm--deposx.sh

[ ! -x $ADDQTSCRIPT ] && echo "Error: $ADDQTSCRIPT not found" && exit -1
[ ! -x $DEPOSXSCRIPT ] && echo "Error: $DEPOSXSCRIPT not found" && exit -1




function header {
    echo -e "\033[0;34m==>\033[0;0;1m $1 \033[0;0m"
}

function die {
    echo $1
    exit $?
}

oldversion=$(cat src/version.h | grep LASTFM_CLIENT_VERSION | cut -d\" -f2);
versionprefix=$(cat src/version.h | grep LASTFM_CLIENT_VERSION | cut -d\" -f2 | cut -d'.' -f1,2,3);
VERSION=$versionprefix.`svn info | grep "Last Changed Rev" | cut -d' ' -f4`

# HACK (to prevent update)
VERSION="1.6.1.1337"

sed -ie "s/$oldversion/$VERSION/g" src/version.h


QTDIR=`which qmake`
QTDIR=`dirname $QTDIR`
QTDIR=`dirname $QTDIR`
QTDIR=`readlink -f $QTDIR`

[ -z $QTDIR ] && QTDIR=/Library/Frameworks

if [ -z $QTDIR ]
then
    echo QTDIR must be set
    exit 1
fi


ROOT=`pwd`

export QTDIR
export VERSION
################################################################################


if [[ "$1" == "--upload" ]]
then
    curl -T dist/Last.fm-$VERSION.symbols.tar.bz2 http://oops.last.fm:80/symbols/upload
    exit 0
fi
################################################################################


if ( [ "$1" = "-j" ] || [ "$2" = "-j" ] )
then
    header "Building version $VERSION in Japanese."
    export JAPANESE="1"
else
    header "Building $VERSION."
fi


if [ "$1" == "--clean" ]
then
    header "Cleaning source directory..."
    tools/dist-clean.sh
fi

# fix b0rked fplib build process
mkdir -p build/fplib/release

set -e

header "Configuring project (qmake)..."
    DEFINES='DEFINES += NDEBUG'
    test "$JAPANESE" && DEFINES="$DEFINES HIDE_RADIO"
    qmake "CONFIG += release app_bundle x86 ppc warn_off breakpad" "CONFIG -= debug warn_on" "$DEFINES"


header "Starting build..."
    nice -n 20 make -j2

set +e

svn revert src/version.h

header "Updating plist files..."
    cp dist/mac/Info.plist.in bin/Last.fm.app/Contents/Info.plist
    cp dist/mac/fm.last.lastfmhelper.plist bin/Last.fm.app/Contents/MacOS
    perl -pi -e 's/0\.0\.0\.0/'$VERSION'/g' bin/Last.fm.app/Contents/Info.plist
    perl -pi -e 's/0\.0\.0/'`echo $VERSION | cut -d'.' -f1,2,3`'/g' bin/Last.fm.app/Contents/Info.plist


header "Generating qm files..."
    dist/i18n.pl

    if [ -z "$JAPANESE" ]
    then
    	rm -f bin/Last.fm.app/Contents/MacOS/data/i18n/lastfm_jp.qm
    	rm -f bin/Last.fm.app/Contents/MacOS/data/i18n/qt_jp.qm
    fi


header "Assembling application bundle..."
    pushd bin > /dev/null
    # copy the libs and executables we need
    # the exes link to *.x.dylib for some reason, so we have to copy those
    for x in `find . -maxdepth 1 -name \*.dylib | grep '^[^0-9]*\.[0-9]\.dylib'` \
             Last.reporter \
             LastFmHelper
    do
        # the Mach-O bit is to stop us copying shell scripts and DLLs etc.
        test -n "`file -L $x | grep 'Mach-O'`" && cp $x Last.fm.app/Contents/MacOS
    done

    # copy misc files that we need
    cp $ROOT/COPYING Last.fm.app/Contents/
    cp $ROOT/ChangeLog.txt Last.fm.app/Contents/ChangeLog
    cp -R services Last.fm.app/Contents/MacOS
    cp -R extensions Last.fm.app/Contents/MacOS
    cp -R data Last.fm.app/Contents/MacOS
    cp -R $ROOT/dist/mac/Resources Last.fm.app/Contents
    cp $ROOT/bin/*.dylib Last.fm.app/Contents/MacOS/
    cp $ROOT/bin/updater-autorestart.sh Last.fm.app/Contents/MacOS/updater-autorestart.sh
    find . -name .svn | xargs rm -rf

    # fake helper package to prevent helper getting a dock icon too
    pushd Last.fm.app/Contents/MacOS
    mkdir -p LastFmHelper.app/Contents
    cd LastFmHelper.app/Contents
    ln -s ../../ MacOS
    ln -s ../../../Resources
    cp ../../fm.last.lastfmhelper.plist Info.plist
    perl -pi -e "s/%HELPERAPP%/LastFmHelper/g" Info.plist
    popd

    cd Last.fm.app
    $ADDQTSCRIPT \
                   'QtCore QtGui QtXml QtNetwork QtSql' \
                   imageformats \
                   sqldrivers/libqsqlite.dylib

    $DEPOSXSCRIPT

    #HACK avoid issues when upgrading due to renaming of executable for 1.3.0
    cd Contents/MacOS
    ln -s Last.fm LastFM

    popd > /dev/null


header "Building dump_syms..."
    d=src/breakpad/external/src
    g++ -I$d -I$d/common/mac -o build/dump_syms \
        -framework Foundation -lcrypto \
        $d/tools/mac/dump_syms/dump_syms_tool.m \
        $d/common/mac/*.cc \
        $d/common/mac/dump_syms.mm


header "Building breakpad symbolstore..."
    mkdir -p build/syms
    files=`find bin/Last.fm.app -type f -a -perm -100`

    # stolen from mozilla Makefile.in
    echo $files | xargs file -L \
                | grep "Mach-O" \
                | grep -v "for architecture" \
                | cut -f1 -d':' \
                | xargs dist/breakpad-make-symbolstore.pl \
    	                -a "ppc i386" \
    	                build/dump_syms \
    	                build/syms \
                > build/syms/Last.fm-$VERSION-mac.symbols.txt


header "Stripping binaries..."
    for x in $files
    do
    	if [[ "`file $x | grep library`" != "" ]]
    	then
    	    echo "L $x"
    	    strip -S -x $x
    	else
    	    echo "F $x"
    	    strip $x
    	fi
    done


header "Creating update.tar.bz2..."
    pushd bin/Last.fm.app/Contents &> /dev/null
    tar cjf ../../../dist/Last.fm_Mac_Update_$VERSION.tar.bz2 .
    popd &> /dev/null


header "Creating dmg package..."
    dist/mac/create-dmg.sh bin/Last.fm.app


header "Packing symbols..."
    pushd build/syms &> /dev/null
    tar cjf ../../dist/Last.fm-$VERSION.symbols.tar.bz2 .
    popd &> /dev/null


header Done!
echo "The release products are in dist/"
echo "To upload the symbols to oops.last.fm, issue the following command:"
echo "       $0 --upload"
echo
