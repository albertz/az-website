#!/bin/bash

SONG=0
[ "x$1" == "x-s" ] && SONG=1 && shift
SNAME=$1
[ -f "$1" ] && FILE="$1" && SNAME="$(dirname "$1")"
[ "$SNAME" == "" ] && echo "please specify the artwork short name" && exit 1
[ ! -d "$SNAME" ] && echo "artwork $SNAME does not exist" && exit 1

function image_w() {
	sips "$1" -g pixelWidth | grep pixelWidth | grep -E "[0-9]+" -o
}

function image_h() {
	sips "$1" -g pixelHeight | grep pixelHeight | grep -E "[0-9]+" -o
}

for SVAR in name date description marking; do
	if [ -e $SNAME/mysql.$SVAR ]; then
		echo "mysql.$SVAR is already set"
	else
		VAL=""
		echo -n "$SVAR"
		case $SVAR in
			date) echo -n "(YYYY-MM-DD)";;
			marking) echo -n "(0-120)";;
		esac
		echo -n ": "
		read VAL
		echo "$VAL" > $SNAME/mysql.$SVAR
		svn add $SNAME/mysql.$SVAR
	fi
done

cd $SNAME
if [ ! -e index.php ]; then
	ln -s ../default/index.php
	svn add index.php
fi
cd ..

if [ -e $SNAME/main.php ]; then
	echo "$SNAME/main.php already exists, ignoring template generation"
else


TMPLFILE=default/template_pic.php
[ "$FILE" != "" ] && TMPLFILE=default/template_pic_simple.php
[ "$SONG" == "1" ] && TMPLFILE=default/template_song.php
 
VARS="$(grep -E "%[A-Z0-9]+%" -o $TMPLFILE | uniq)"
cp $TMPLFILE $SNAME/main.php

IMGFILE="$FILE"
[ "$IMGFILE" == "" ] && IMGFILE=$SNAME/$SNAME.low.jpg

for VAR in $VARS; do
	VAL=""
	case "$VAR" in
		"%SNAME%") VAL=$SNAME;;
		"%SDESC%") VAL="$(cat $SNAME/mysql.description)";;
		"%NAME%") VAL="$(cat $SNAME/mysql.name)";;
		"%MARKING%") VAL="$(cat $SNAME/mysql.marking)";;
		"%DATE%") VAL="$(cat $SNAME/mysql.date)";;
		"%FILE%") VAL="$(basename $FILE)";;
		"%W%") VAL=$(image_w $IMGFILE);;
		"%H%") VAL=$(image_h $IMGFILE);;
		*)
			echo -n "> "
			grep -m 1 "$VAR" $SNAME/main.php
			echo -n "$VAR: "
			read VAL
			;;
	esac
	sed -e "s|$VAR|$VAL|" -i "" $SNAME/main.php
done

# echo
# echo "---- result ----"
# cat $SNAME/main.php

svn add $SNAME/main.php

fi
