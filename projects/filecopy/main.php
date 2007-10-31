<p>
<b>Beschreibung</b><br>
Bei diesem Programm handelt es sich um ein simples Dateikopierprogramm 
mit ein paar Sonderfunktionen. Durch die Einfachheit kopiert das 
Programm haeufig schneller als die Windows-Kopierroutine. Das Programm 
ist optimiert, um Dateien einer instabilen Quelle zu kopieren, d. h. 
eine Quelle, zu der eventuell der Kontakt abbrechen kann (falls ueber 
Samba (die Datei-Freigabe von Windows) kopiert wird) oder bei welcher 
eventuell Lese-Fehler auftreten koennen. In diesem Fall bricht der 
Kopiervorgang nicht wie beim Windows-Explorer komplett ab, sondern 
laesst sich auf Bestaetigung des Benutzers hin fortsetzen (zur Wahl 
steht, die Datei fortzusetzen oder auch zur naechsten Datei 
fortzuschreiten).
</p>

<p>
<b>Bedienung</b><br>
Die Benutzeroberflaeche ist recht schlicht gehalten. Ueberhaupt ist das 
Programm urspruenglich nur als kleines Tool fuer mich selbst gedacht 
gewesen, weswegen ich mir bei Fehlerabfangroutinen und Design nicht so 
viel Gedanken gemacht habe. Nach dem Start erscheint ein kleines 
Fenster, in dem man Quelle und Ziel angeben muss (die Korrektheit wird 
nicht ueberprueft, bei einer fehlerhaften Eingabe koennte das Programm 
mit einer Fehlermeldung abstuerzen). Hier sind auch UNC-Pfade (also 
Windows-Freigaben) moeglich. Es empfiehlt sich mit dem Windows-Explorer 
an die entsprechende Stelle zu navigieren und die entsprechende Adresse 
zu kopieren.<br>
Im naechsten Schritt beginnt bereits das eigentliche Kopieren. Bei einem 
Fehler erscheint eine entsprechende Fehlermeldung, in der eine Eingabe 
erwartet wird (die moeglichen Eingaben muessten eigentlich in der 
Meldung selbst beschrieben sein). Eine undokumentierte Funktion bei den 
meisten Fehlern ist die Moeglichkeit, ein Ausrufezeichen vor die Eingabe 
zu setzen (funktioniert nicht bei allen Fehlern, allerdings bei den 
meisten). In diesem Fall wird die Eingabe gespeichert und fuer alle 
Fehler vom gleichen Typ wird diese Eingabe verwertet; auf die Weise kann 
man z. B. dem Programm nach dem ersten Lese-Fehler sagen, es soll bei 
jeder Datei mit Lese-Fehler diese ignorieren und direkt mit der 
naechsten Datei fortfahren.
</p>

<p>
<b>Screenshot</b><br>
<img src="FileCopy.Screenshot.png">
</p>

<p>
<b>Download</b><br>
<a href="FileCopy.zip">FileCopy.exe</a><br>
<a href="FileCopy.Source.zip">FileCopy-Source-Code (Visual Basic)</a><br>
meist benoetigte <a href="../downloads/mscomctl.zip">mscomctl.ocx</a>
</p>

<?php
	include("../vb_files.php");
?>
