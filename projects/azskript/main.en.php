<p>
<a href="?lang=de">German version of this page.</a>
</p>

<p>
<b>Description</b><br>
AZSkript is a simple script language, you can use in your programs to
control dynamic routins, which you don't want to hardcore. For example
the action of what happens, when your player in a game falls down or what
your own web server should do, when a user requests a special URL or
something different. You can use it everywhere, it is very simple to
include it in your programs and to add your own commands for your needs.
</p>

<p>
<b>Progams using it</b><br>
I used in in a few programs, 2 of them are the race game
<a href="../sabo_racer?lang=en">SABO Racer</a> and
<a href="../azgames?lang=en">AZGames</a> (there the gameserver, who handles
the game itself).
</p>

<p>
<b>How to use it</b><br>
You only have to copy all source files into your program and inside your
code, you have to create a new instance of the AZSkript_MainInterface class
and handle
the events of it. There is the Load_ByFile method, you can use, to load
a script file from disc. To start it, you have to call the Execute_Main method
or the Execute_Main method
In the ExecuteCommand event, you handle your own specific commands.
This is all, what you have to do; I think, it is very simple.<br>
A more detailed description is in the ZIP-archive.
</p>

<p>
<b>Download</b><br>
<a href="azskript.zip">Source Code (VB)</a>
including the full reference and a sample project
</p>
