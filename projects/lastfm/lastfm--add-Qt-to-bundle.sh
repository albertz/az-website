#!/bin/sh
# author: max@last.fm
# usage:  Run from inside the bundle root directory, eg. Last.fm.app
#         The first parameter should be the QtFrameworks to copy.
#         Remaining parameters are plugins to copy, directories and files are 
#         valid.
# eg:     add-Qt-to-bundle.sh 'QtCore QtGui QtXml' \
#                             imageformats \
#                             sqldrivers/libsqlite.dylib
################################################################################

# this is a modified copy of dist/mac/add-Qt-to-bundle.sh


if [ -z $QTDIR ]
then
    echo QTDIR must be set
    exit 1
fi


################################################################################


#first frameworks
mkdir -p Contents/Frameworks
for x in $1
do
    echo "C $x"
    F=$QTDIR/lib/$x.framework
    [ ! -d $F ] && F=/Library/Frameworks/$x.framework
    cp -Rf $F Contents/Frameworks/
done

#plugins
shift
mkdir -p Contents/MacOS
while (( "$#" ))
do
    echo "C $1"

    if [[ -d $QTDIR/plugins/$1 ]]
    then
        cp -R $QTDIR/plugins/$1 Contents/MacOS
    else
        dir=$(basename $(dirname $1))
        mkdir Contents/MacOS/$dir
        cp $QTDIR/plugins/$1 Contents/MacOS/$dir
    fi
    
    shift
done

#cleanup
find Contents/Frameworks -name Headers -o -name \*.prl -o -name \*_debug | xargs rm -rf
find Contents -name \*_debug -o -name \*_debug.dylib | xargs rm
