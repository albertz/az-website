<p>
Deutsche Beschreibung verfuegbar: <a href="?lang=de">hier</a>
</p>

<p>
<b>Description</b><br>
You have the possibility to download a few additional
features I missed in Gentoo.
</p>

<p>
<b>emerge_force.sh</b><br>
If you start a big emerge, for example a huge list of programs or
a system update, you will start it and go away. If anything go
wrong, it will stop your hole emerge, also the programs, that are
not affacted by the error. This is very disturbing and so I write
this script against it.
Execution: <code>./emerge_force.sh [options] [pakets]</code><br>
<i>options</i> are any options for the emerge, for example 
<i>--update --deep</i>).<br>
<i>pakets</i> is a list of packages you would like to see emerged. You
can also use <i>world</i> or <i>system</i> as a package and also
<i>sync</i> or <i>--sync</i> is allowed.<br>
The script will start a single emerge for every package. It will also
cut the <i>world</i>, if you used it, and start a single emerge for every
package in it (the same for <i>system</i>).<br>
Example:
<code>./emerge_force.sh --update --deep --newuse system --sync system world</code><br>
It will does the following: With <i>--update --deep --newuse</i>, only
new packages or packages with changed USE-flags will be emerged. The
script will start with all packages in <i>system</i>, then it syncs the
portage tree and then again, it searches for updates in <i>system</i> and
after that, it will update all the rest in <i>world</i>.<br>
This execution is more slowly than the direct usage, but you know,
that most of packages are emerged in every case.<br>
Download: <a href="emerge_force.sh">emerge_force.sh</a>
</p>

<p>
<b>add_keywords.sh</b><br>
If you would like to emerge a program in the testing-version,
there are propably a lot of packages, you have to put in your
<i>/etc/portage/package.keywords</i>. This script searches all
this packages and does it automatically for you.<br>
Execution: <code>./add_keywords.sh [emerge args]</code><br>
All passed arguments are used for the emerge with the additional
argument <i>--pretend --verbose</i>. If the script gets a message
like "The needed package xxx/yyy is masked by the ~x86 keyword.", then
it will add this package to your <i>package.keywords</i> and try it
again and again till no more messages of this type apears.<br>
Example:
<code>./add_keywords.sh ">=gnome-2.14.0"</code><br>
You have to put quotations here, because else, your shell will missinterpret
the >.<br>
Download: <a href="add_keywords.sh">add_keywords.sh</a>
</p>

