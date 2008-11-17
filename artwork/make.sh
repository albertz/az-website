#!/bin/bash

SNAME=$1
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

# [ ! -e "$SNAME/$SNAME.big.jpg" ] && echo "picture $SNAME.big.jpg does not exist" && exit 1
# [ ! -e "$SNAME/$SNAME.low.jpg" ] && echo "picture $SNAME.low.jpg does not exist" && exit 1
	
VARS="$(grep -E "%[A-Z0-9]+%" -o default/template_main.php | uniq)"
cp default/template_main.php $SNAME/main.php

for VAR in $VARS; do
	VAL=""
	case "$VAR" in
		"%SNAME%") VAL=$SNAME;;
		"%SDESC%") VAL="$(cat $SNAME/mysql.description)";;
		"%NAME%") VAL="$(cat $SNAME/mysql.name)";;
		"%MARKING%") VAL="$(cat $SNAME/mysql.marking)";;
		"%DATE%") VAL="$(cat $SNAME/mysql.date)";;
		"%W%") VAL=$(image_w $SNAME/$SNAME.low.jpg);;
		"%H%") VAL=$(image_h $SNAME/$SNAME.low.jpg);;
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
