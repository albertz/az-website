<p>
<a href="?lang=en">For english version, click here.</a>
</p>

<p>
<b>Beschreibung</b><br>
Es handelt sich um eine einzige PHP-Datei, welche als Ersatz fuer ein
Directory-Listing eines Verzeichnisses mit Bildern als Inhalt gedacht wurde.
Der PHP-Skript kuemmert sich sowohl um die Auflistung, als auch um die
Erstellung der Thumbnails (Vorschaubilder) und auch um die eigentliche
Darstellung der eigentlichen Bilder (in wahlweise verschiedenen
Qualitaetsstufen).
</p>

<p>
<i>(Im Moment gibt es die eigentliche Beschreibung fuer die aktuelle Version nur
in Englisch.)</i>
</p>

<p><b>Source Code</b>:
<a href="http://www.az2000.de/viewvc/Website/pics/pics.php?view=markup">pics.php</a>
<a href="http://www.az2000.de/viewvc/Website/pics/pic.cml?view=markup">pic.cml</a>
</p>

<hr>
<h2>Aeltere, etwas simplere Version</h2>

<p>
<b>Installation (auf einem Apache-Server)</b><br>
Das Skript liegt bei mir unter <i>/images/pics.php</i>. Das Skript muss evtl.
noch angepasst werden, um anderweitig zu laufen (sollte nicht weiter
schwierig sein, werde mich bald selbst mal daran setzen). Danach wird durch
einen kleinen Hack in der <i>.htaccess</i>-Datei eines entsprechenden
Verzeichnisses erreicht, dass dieses Verzeichnis absofort ueber den PHP-Skript
angezeigt wird. Wie folgt sieht beispielsweise der entsprechende Auszug meiner
<i>.htaccess</i> aus:
<pre>
Options -Indexes
ErrorDocument 403 /images/pics.php
</pre>
Ich hab das ganze so gemacht, da ich im Prinzip zu faul war, mich durch
viele Texte durchwuehlen zu muessen, um rauszukriegen, wie man das eigentlich
ellegant macht. Falls jemand mir das kurz schreiben kann, wie ich eigentlich
die <i>.htaccess</i> anpassen sollte, kann das gerne tun. Ich werde das dann
an dieser Stelle mit einer entsprechend angepassten PHP-Datei
veroeffentlichen.
</p>

<p>
<b>Download</b><br>
<a href="/images/pics.php.txt">Source Code (PHP)</a>
</p>
