#!/bin/bash

SNAME=$1
[ "$SNAME" == "" ] && echo "please specify the artwork short name" && exit 1
[ ! -d "$SNAME" ] && echo "artwork $SNAME does not exist" && exit 1
[ ! -e "$SNAME/$SNAME.big.jpg" ] && echo "picture $SNAME.big.jpg does not exist" && exit 1
[ ! -e "$SNAME/$SNAME.low.jpg" ] && echo "picture $SNAME.low.jpg does not exist" && exit 1

function image_w() {
	sips "$1" -g pixelWidth | grep pixelWidth | grep -E "[0-9]+" -o
}

function image_h() {
	sips "$1" -g pixelHeight | grep pixelHeight | grep -E "[0-9]+" -o
}


if [ -e $SNAME/main.php ]; then
	echo "$SNAME/main.php already exists, ignoring template generation"
else
	
VARS="$(grep -E "%[A-Z0-9]+%" -o default/template_main.php | uniq)"
cp default/template_main.php $SNAME/main.php


for VAR in $VARS; do
	VAL=""
	case "$VAR" in
		"%SNAME%") VAL=$SNAME;;
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
