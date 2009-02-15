#!/usr/bin/python

import portage
import sys
import os

if len(sys.argv) < 2:
	print "give packagename as arg"
	quit(-1)

print "arg:", sys.argv[1]
pkgs = portage.portdb.match(sys.argv[1])

if len(pkgs) == 0:
	print "no packages found"
	quit(-1)

pkgname = pkgs.pop()
print "package:", pkgname

ebuild = portage.portdb.findname(pkgname)
print "ebuild:", ebuild

build_prefix = os.environ["HOME"] + "/gentoo-dev"
try:
	os.mkdir(build_prefix)
except:
	pass
os.environ["PORTAGE_TMPDIR"] = build_prefix

pkgtmpdir = build_prefix + "/portage/" + pkgname

os.system("sudo -E ebuild " + ebuild + " unpack")

os.system("sudo chown " + str(os.getuid()) + " -R " + pkgtmpdir)
if not os.path.exists(pkgtmpdir + "/work-orig"):
	os.system("cp -a " + pkgtmpdir + "/work " + pkgtmpdir + "/work-orig")


