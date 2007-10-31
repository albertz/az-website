<p>
English description available: <a href="?lang=en">here</a>
</p>

<p>
<b>Beschreibung</b><br>
Es praesentieren sich kleine nuetzliche Helferskripte
fuer ein Gentoo-System, die Funktionen bereitstellen,
die ich bisher noch vermisst habe.
</p>

<p>
<b>emerge_force.sh</b><br>
Wenn ich einen groesseren emerge starte, z.B. eine Liste
von Programmen, die ich zusammengestellt habe und nun installieren
moechte oder auch einfach nur ein System Update, starte ich meistens
einen einzelnen emerge und lasse dies dann ueber Nacht laufen oder
entferne mich von dem PC. Wenn nun ein Fehler auftritt, wird der
gesamte emerge-Vorgang abgebrochen, d.h. auch die Programme, die
nicht weiter betroffen von dem Fehler sind, werden auch nicht weiter
installiert. Diese fehlende Funktion in emerge stoerte mich sehr,
so dass es zu diesem kleinen Skript kam, welches weiterhilft.<br>
Aufruf: <code>./emerge_force.sh [options] [pakets]</code><br>
<i>options</i> koennen dabei irgendwelche Optionen sein, die dann
einfach an den emerge weitergegeben werden (z.B. <i>--update --deep</i>).<br>
<i>pakets</i> ist eine Liste von Paketen, die emerget werden soll.
Dabei sind auch Metapaketnamen wie <i>world</i> und <i>system</i> moeglich.
Ausserdem kann man hier auch <i>sync</i> oder <i>--sync</i> angeben.<br>
Die Funktionsweise ist die, dass fuer jedes Paket ein einzelner emerge
gestartet wird und die Liste dabei abgearbeitet wird. Auch fuer <i>world</i>
oder <i>system</i> wird nicht ein einzelner emerge gestartet, sondern
fuer jedes Paket einzeln, welches sich in <i>world</i> oder <i>system</i>
befindet.<br>
Beispiel:
<code>./emerge_force.sh --update --deep --newuse system --sync system world</code><br>
Dieser Aufruf tut folgendes: Durch <i>--update --deep --newuse</i> werden
nur Pakete neu emerged, die entweder in einer neuen Version verfuegbar sind oder
deren USE-flags geaendert wurden. Dabei werden auch tiefe Abhaenigkeiten
durchsucht. Als erstes wird nun jedes Paket in <i>system</i> durchgegangen.
Danach folgt ein <i>--sync</i> und nun wird ein weiteres mal <i>system</i>
durchgegangen, um evtl. System Updates zu installieren. Es folgen nun alle
restlichen Pakete in der world.<br>
Dieser Aufruf ist mit Sicherheit viel langsamer, als wenn man es direkt
machen wuerde, allerdings hat man nun die Gewissheit, dass das meistmoegliche
auch wirklich installiert wird.<br>
Download: <a href="emerge_force.sh">emerge_force.sh</a>
</p>

<p>
<b>add_keywords.sh</b><br>
Gentoo kann wunderbar ein sauberes System mit gemischt stable- und
testing-Paketen managen. Wenn man nun sich entscheidet, z.B. Gnome
oder sonst ein Paket als testing auf seinem System haben zu wollen
(d.h. im Falle einer x86 Architektur ist damit gemeint, dass das
~x86 KEYWORD fuer das entsprechende Paket akzeptiert werden soll;
so etwas gehoert dabei dann in die <i>/etc/portage/package.keywords</i>
geschrieben), muss man dabei haeufig auch viele weitere Pakete
als testing installieren und diese muss man alle entsprechend
in die <i>/usr/portage/package.keywords</i> hinzufuegen.<br>
Genau diesen Vorgang, alle noetigen Programme in diese Datei
hinzuzufuegen, wird von diesem kleinen Skript abgenommen.<br>
Aufruf: <code>./add_keywords.sh [emerge args]</code><br>
Das Programm gibt alle Parameter einfach direkt an emerge weiter
mit dem zusaetzlichen Parameter <i>--pretend --verbose</i>. Wenn
nun eine Meldung kommt a la "Das benoetigte Paket xxx/yyy ist mit dem
Keyword ~x86 gemaskt." fuegt das Skript das entsprechende Paket
in die <i>package.keywords</i> hinzu und versucht es nocheinmal.
Dies wird so lange wiederholt, bis keine solche Meldung mehr kommt.<br>
Beispiel:
<code>./add_keywords.sh ">=gnome-2.14.0"</code><br>
Beachtet dabei, dass ihr in diesem Fall Anfuehrungsstriche benutzen muesst,
da ansonsten eure Shell das > falsch interpretieren wird.<br>
Download: <a href="add_keywords.sh">add_keywords.sh</a>
</p>

