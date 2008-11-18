#!/bin/bash

for d in *; do
	if [ -d "$d" ] && [ "$d" != "default" ]; then
		[ ! -e "$d/mysql.name" ] && echo "$d"
	fi
done

