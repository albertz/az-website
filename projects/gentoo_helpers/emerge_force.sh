#!/bin/bash

# Gentoo Helper script written by Albert Zeyer
# look at: http://www.az2000.de/projects/gentoo_helpers

a_options=""
a_packages=""
for arg in $*; do
	if [ "$(echo $arg | cut -d"-" -f1)" == "" ]; then # arg is an option
		if [ "$arg" == "--sync" ]; then
			# treat --sync like a package
			a_packages="$a_packages sync"
		else
			# simply add option to list
			a_options="$a_options $arg"
		fi
	else # arg is a package-name
		if [ "$arg" == "world" ]; then
			# TO THE GENTOO DEVELOPERS:
			# is this the right way?
			a_packages="$a_packages $(cat /var/lib/portage/world)"
		elif [ "$arg" == "system" ]; then
			# TO THE GENTOO DEVELOPERS:
			# is this the right way?
			a_packages="$a_packages \
				$(cat /usr/portage/profiles/base/packages \
				| cut -d"#" -f1 \
				| cut -d"*" -f2)"
		else
			# no special package, add it simply to list
			a_packages="$a_packages $arg"	
		fi
	fi
done

perrors=""
for package in $a_packages; do
	if [ "$package" == "sync" ]; then
		echo "> emerge sync"
		emerge --sync \
			|| emerge --sync \
			|| perros="$perrors --sync"
	else
		echo "> emerge $a_options  $package"
		emerge $a_options  $package \
			|| emerge $a_options  $package \
			|| perrors="$perrors $package"
	fi
	sleep 0.3
done

if [ "$perrors" != "" ]; then
	echo ">>> I recognized errors with the following package(s):"
	echo "   $perrors"
else
	echo ">>> all packages emerged successfully !"
fi
