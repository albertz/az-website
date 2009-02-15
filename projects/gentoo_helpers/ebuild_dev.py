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


os.chdir(pkgtmpdir)
diffcmd = "diff -U 3 -r work-orig work | grep -v \"Only in work\""
os.system("nautilus work &")

while True:
	# needed because portage resets the permissions
	os.system("sudo chown " + str(os.getuid()) + " -R " + pkgtmpdir + "/work")

	print "ready for merging? then just press enter"
	sys.stdin.readline()

	print "current diff:"
	os.system(diffcmd)
	
	if not os.system("sudo -E ebuild " + ebuild + " compile"):
		print "compiling was successfull, proceeding with merging"
		os.system("sudo -E ebuild " + ebuild + " install")
		os.system("sudo -E ebuild " + ebuild + " qmerge")
	else:
		print "there was an error while compiling"
		continue


	print "another try? then just press enter. or type 'ok' if you want to cleanup and print the final diff"
	answ = sys.stdin.readline().strip()
	if answ == "ok": break


os.system(diffcmd)
os.system(diffcmd " > ../../" + pkgname.split("/")[1] + ".diff")

