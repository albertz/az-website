<p>
<?php if($lang == "en") { ?>
<a href="?lang=de">Deutsch ist toll.</a>
<?php } else { // german ?>
<a href="?lang=en">English is nice.</a>
<?php } ?>
</p>

<p>
<?php if($lang == "en") { ?>
<b>Description</b><br>
Robot is a adventure-game, where you lead your controled body through
different very exiting rooms up to the bad king. For your way, you need
the right keys for the dors, you need to destroy your enemies (the robots)
and you have to solve some problems.
<?php } else { // german ?>
<b>Beschreibung</b><br>
Robot ist ein Abenteuer-Spiel, in dem man seinen Koerper durch mehrere
Raeume steuert und sich einen Weg bis hin zum Koenig bahnt, dafuer
jeweils die entsprechenden Schluessel fuer alle Tueren finden muss und
Aehnliches. Auf dem ganzen Weg wird man bedroht von boesen bloeden
Robotern, die sich auf einen hetzen.
<?php } ?>
</p>

<p>
<?php if($lang == "en") { ?>
<b>Idea</b><br>
The idea based on the very old, famous, same-named
<a href="http://www.tom-games.de/ger/download.htm"
target="_blank">DOS-game Robot</a>.
The gameplay is the same, but the original game is much more complex,
the graphics are better and the world is bigger.<br>
The project Robot 2 is a port of my old Visual Basic project 
<a href="../robot">Robot 1</a>, one of my very first games. Robot 2 was coded
in Object Pascal for 
<a href="http://www.freepascal.org/" target="_blank">Free Pascal</a>
with
<a href="http://www.lazarus.freepascal.org/" target="_blank">Lazarus</a>.
You can desribe Lazarus as a plattform-independend, open-source and free
alternative to Delphi. Take a look at it, it is very nice.
<?php } else { // german ?>
<b>Idee</b><br>
Die ganz urspruengliche Spielidee ist in Anlehnung an das gleichnamige
und sehr kultige alte
<a href="http://www.tom-games.de/ger/download.htm"
target="_blank">DOS-Spiel Robot</a>.
Das Spielprinzip dort ist das Selbe, nur dass beim Original die Welten noch
um einiges groesser sind.<br>
Das Projekt Robot 2 ist eine Portierung meines sehr alten Projektes
<a href="../robot">Robot 1</a>, welches eins meiner allerersten Spiele war,
welches ich damals noch in Visual Basic programmiert habe und zwar in einer
Art und Weise, die man sich besser nicht angucken moechte.<br>
Robot 2 habe ich nun in
<a href="http://www.freepascal.org/" target="_blank">Free Pascal</a>
mit 
<a href="http://www.lazarus.freepascal.org/" target="_blank">Lazarus</a>
umgesetzt, ein sehr zu empfehlendes Plattformunabhaengiges leistungsstarkes
System, mit dem man leicht irgendwelche Programme schreiben kann (grob gesagt
ist Lazarus die Open Source Version von Delphi und auch fast kompatibel dazu).
<?php } ?>
</p>

<p>
<?php if($lang == "en") { ?>
<b>Versions</b><br>
The beta version (all version less than 2.0) was coded for beginning
programmers. I wanted to show how you can code a complex game like this
with very basic programming technics. After a little tutorial in Delphi
or Lazarus, everyone should be able to read and understand the whole source
code. See also my <a href="../coding_for_dummies">coding for absolute dummies</a>
tutorial (german only at the moment) for more information.<br>
The Super Special Laura Edition (1.6) (renamed to 'Hopper') is a special
version for Laura and contains some modifications of the look 
onto the game...<br>
Version 1.7 now contains a complete new world with new mysteries and an
ingame-leveleditor.
<?php } else { // german ?>
<b>Versionen</b><br>
Die Beta Version (d.h. alle Versionen kleiner als 2.0) richtet sich,
abgesehen vom Spiel selbst, vom Source
Code her besonders an Anfaenger, da ich demonstrieren wollte, wie man mit
sehr einfachen Mitteln bereits einiges machen kann. Manche Sachen sind
dadurch aus der Sicht erfahrener Programmierer vielleicht etwas ungeschickt
geloest, allerdings geht das halt nicht, einen Anfaenger direkt mit allen
supertollen Tricks und Techniken zu ueberhaeufen. Die Beta Version benutzt
keine Techniken, die man nicht an einem Tag erlernen kann. Fuer weitere Informationen
hierzu am besten auch mal mein <a href="../coding_for_dummies">coding for absolute dummies</a>
Tutorial anschauen.<br>
Die Super Special Laura Edition (1.6) (in Hopper umbenannt) richtet sich an Laura
und enthaelt ein paar Modifikation (Abwandlung der Beta) der Sichtweise auf
das Spiel...<br>
Die Version 1.7 enthaelt nun eine komplett neue Welt mit neuen Raetseln
und einem Ingame-Leveleditor.
<?php } ?>
</p>

<p>
<?php if($lang == "en") { ?>
<b>Leveleditor</b><br>
All beta versions after 1.7 contains an ingame-leveleditor.<br>
The control is easy:<br>
Go into the editor mode (menu). All game-objects are listed
in your knapsack. Simply select an object and place it in the
present room by left-clicking at the wanted position.
You can also select the objects in the knapsack by clicking on them.
With a right-click, you can remove an object. With Ctrl+Arrowkey,
you can switch to other rooms. Don't forget to come back
to the room where your body is, because else, you can't
resume playing on exiting the editor mode.
<?php } else { // german ?>
<b>Leveleditor</b><br>
Ab der Version 1.7 ist ein Ingame-Leveleditor enthalten.<br>
Im Leveleditor waehlt man einfach das zu setzende Spielobjekt aus dem
Rucksack aus (in diesem werden alle Spielobjekte im Editiermodus angezeigt)
und klickt mit der Maus (linke Taste) auf die entsprechende Stelle,
wo man das Spielobjekt hinhaben moechte. (Mit der rechten Maustaste kann man
ein Objekt vom Spielfeld loeschen.) Die Raeume wechselt man mit der
Tastenkombination Ctrl+Pfeiltaste. Wenn man wieder vom Editiermodus in den
Spielmodus zurueckkehrt, sollte man wieder den Raum auswaehlen, in dem sich
die Spielfigur befindet, da man sonst nicht weiterspielen kann.<br>
Man beachte, dass
beim Speichern irgendwelcher Aenderungen immer die <i>aktuelle</i> Welt
gespeichert wird. Wenn man beispielsweise etwas gespielt hat und dann etwas
aendert und das dann speichert, hat man dabei automatisch auch seinen
Spielstand gespeichert, d.h. z.B. evtl. weggeaetzte Mauern sind dann auch in
der gespeicherten Welt weg.
<?php } ?>
</p>

<p>
<?php if($lang == "en") { ?>
<?php // TODO !! ?>
<b>Control of your body</b><br>
The movement is controlled by the arrow-keys. You can catch things
laying around by simple go to them. They will be put into your knapsack.
Select the thing in your knapsack you want to use with spacebar.
You can use them by pressing enter. There are corrosive liquids filled
in bottles laying around. You can remove walls with it
(only the bright walls). Every door needs a key to enter it.
The are 3 diamonds laying somewhere around. You need them to defeat
the bad king. You have to put them near of the diamond-places
(go there and select it in your knapsack). You can save the game
with the clocks laying around. ...
<?php } else { // german ?>
<b>Spielobjekte</b><br>
Von den ungefaehren Spielobjekten (es gibt neun verschiedene Tueren
inkl. Schluessel, neun verschiedene Gegner, einen Endgegner, die
Spielfigur selbst, normale Waende, harte Waende und die 3 Schalter, fuer
die man jeweils das entsprechende Objekt zum freischalten benoetigt,
was notwendig dafuer ist, um den Endgegner zu besiegen, dann gibt es
noch die zerstoererischen Hindernisse, neun verschiedene Punkttypen,
Lebenselixir, Speicherfunktion, Mauerzerstoerer und Gegnerzerstoerer)
ist man natuerlich ein bisschen eingeschraenkt, in welcher Form diese
benutzt werden ist aber natuerlich voellig frei. Die Grafiken koennen
auch sehr leicht bearbeitet werden, es handelt sich um einfache BMPs.<br>
So koennen die Diamantenstellen beispielsweise umfunktioniert zu einem
Supercomputer werden und die Diamanten werden zu bestimmten Chipkarten.
Oder die Roboter koennen zu Monstern werden, der Elektrozaun wird zur
Dornenhecke, der Endgegner wird zu Satan, die Aetzflussigkeit wird zu
Hammer und Meissel, usw.
<?php } ?>
</p>

<p>
<?php if($lang == "en") { ?>
<b>Events</b><br>
You can change any event of some game-object or everything else by simply
change the dependent source code. You don't need any programming experience,
it is very easy. Open the Lazarus project-file (<i>robot.lpi</i>) with
Lazarus (download it 
<a href="http://sourceforge.net/project/showfiles.php?group_id=89339" target="_blank">
here</a>) and look at the code of <i>umainform.pas</i>.<br>
Perhaps the most interesting functions for you are <i>MoveToPlace</i> and
<i>UseKnapsackSelection</i>.<br>
If you make any change and think it will be interesting for others, simply
mail me.
<?php } else { // german ?>
<b>Ereignisse</b><br>
Ihr koennt auch bestimmte Aktionen der Objekte im Spiel umaendern oder
auch die Meldungen. Dafuer muesst ihr allerdings dann doch den Programmcode
selbst bearbeiten. Aber traut euch einfach mal, es ist wirklich nicht
schwer. Auch wenn ihr absolut keine Programmiererfahrungen habt, werdet
ihr recht schnell verstehen, was wofuer gut ist und wenn ihr das versteht,
seid ihr auch in der Lage, kleine Aenderungen durchzufuehren. Ihr solltet
vor allem keine Angst davor haben, ihr koennt ja nichts kaputt machen.
Haeufig ist der einfachste weg des Programmierens einfach das Ausprobieren
und wenn es nicht geht, versucht man es halt anders nochmal. Wenn ihr es
euch einfach mal angucken wollt, besorgt euch am besten Lazarus (Download
<a href="http://sourceforge.net/project/showfiles.php?group_id=89339" target="_blank">
hier</a>) und oeffnet
die Projektdatei (<i>robot.lpi</i>) einfach damit. Die interessantesten
Funktionen sind vermutlich <i>MoveToPlacey</i> und
<i>UseKnapsackSelection</i>.<br>
Wenn ihr irgend eine interessante Aenderung oder Erweiterung nun
durchgefuehrt habt, koennt ihr mir ruhig Bescheid sagen, ich werde eure
Extra-Levels, abgewandelten Grafiken und/oder auch erweitertes/abgewandeltes
Spiel gerne hier veroeffentlichen.
<?php } ?>
</p>

<p>
<b>Screenshots</b><br>
Robot 1.5 - inside of the game - Linux GTK<br>
<img src="robot1.5-screenshot1.png"><br><br>
Robot 1.7 - startscreen - Linux GTK<br>
<img src="robot1.7-shot1.png"><br><br>
Robot 1.7 - leveleditor - Linux GTK<br>
<img src="robot1.7-shot2.png">
</p>

<p>
<b>Download</b><br>
<?php if($lang == "en") { ?>
All archives include a precompiled Linux x86 bin, a Windows EXE and the
complete source code with the Lazarus project-file.
<?php } else { // german ?>
Bei allen Archiven sind (ausser anders angegeben) jeweils immer eine
vorkompilierte Linux x86 bin,
eine Windows EXE und der komplette Source Code als Projekt in Lazarus
enthalten.
<?php } ?>
<br>
<a href="robot.1.5.beta.rar">Robot 1.5 - Beta</a><br>
<a href="robot.1.5.beta.sourceonly.rar">Robot 1.5 - Beta - source only</a><br>
<a href="hopper.rar">Hopper 1.6 - Super Special Laura Edition</a><br>
Robot 1.7 with new levels and an ingame-eveleditor and additional Linux ppc bin:<br>
<a href="http://sourceforge.net/project/showfiles.php?group_id=92177&package_id=148359&release_id=440138" target="_blank">
Download at Lazarus-CCR Sourceforge</a> (faster download)<br>
<a href="robot1.7.zip">Robot 1.7 - everything</a><br>
<a href="robot1.7-win-only.zip">Robot 1.7 - win32 exec + source</a><br>
<a href="robot1.7-linux-x86-only.zip">Robot 1.7 - linux x86 bin + source</a><br>
<a href="robot1.7-linux-ppc-only.zip">Robot 1.7 - linux ppc bin + source</a><br>
<a href="robot1.7-source-only.zip">Robot 1.7 - source only</a>
</p>

<p>
<b>See also</b><br>
<?php if($lang == "en") { ?>
If you understand german, my tutorial <a href="../coding_for_dummies">coding for absolute dummies</a>
may be interesting for you. After some basic programing technics, it uses this game as a main sample.
<?php } else { // german ?>
Dieses Spiel wird in meinem Tutorial <a href="../coding_for_dummies">coding for absolute dummies</a>
im Anschluss an die Einfuehrungen in das grundsaetzliche Programmieren als Hauptbeispiel verwendet,
an dem weitere Sachen ausprobiert werden.
<?php } ?>
</p>
