<p>
<b>Beschreibung</b><br>
Ich taufe dieses Spiel mit dem Namen: <i>CPP_Tut</i><br>
Dieses Spiel wurde rein aus Lehrzwecken programmiert. Es soll nicht
wirklich viel koennen, es soll nur ganz kurz eine kleine Einfuehrung
in C++ geben, wobei ausserdem auch auf die Nutzung objektorientierter
Moeglichkeiten verzichtet wurde, um alles so einfach wie moeglich zu
halten.
</p>

<p>
<b>Siehe auch</b><br>
Ein sehr viel grundlegenderes Programmieranfaengertutorial ist
<a href="../coding_for_dummies">coding for absolute dummies</a>. Wenn du
hierhin gefunden hast, wird dich dieses evtl. interessieren.
</p>

<p>
<b>Code</b><br>
Um Schrittweise den Code durchzugehen, habe ich 3 Versionen hier
veroeffentlicht, die im Laufe des Programmierens entstanden, so dass man
gut sehen kann, wo und wie man ueberhaupt mal anfaengt etwas zu
programmieren (dies ist ein nicht unbedeutendes Hinderniss fuer Anfaenger,
die haeufig einfach gar nicht wissen, so sie ueberhaupt anfangen sollen)
und wie sich das Programm dann so langsam immer weiter aufbaut, bis
es letztendlich zu etwas Spielbarem/Benutzbarem wird.
</p>

<p>
<b>Einfuehrung</b><br>
Es sind hier nicht sehr viele Vorraussetzungen noetig, um das Spiel zu
verstehen. Ich gehe nur davon aus, dass ihr vielleicht bereits einmal in
ein C/C++ Buch geguckt habt und somit C-Syntax lesen und verstehen koennt.<br>
Das Beispiel sollte auf jedem beliebigen System mit einer Shell laufen.
Das koennte Windows ausschliessen - ich habe es ehrlich gesagt nie auf
Windows getestet. Es reicht aber, wenn ihr SSH-Zugang zu einem beliebigen
Linux-PC habt, denn das Programm laeuft rein auf der Konsole.<br>
Die meisten der Funktionen bauen auf dem beruechtigten "Hallo Albert"
Anfangsbeispiel auf. Hier kurz noch mal die Wiederholung davon:
</p>

<p>
<b>"Hallo Albert" Beispiel</b>
<pre>
#include &lt;iostream&gt;

using namespace std;

int main() {
	cout &lt;&lt; "Hallo Albert" &lt;&lt; endl;
	return 42;
}
</pre>
Mit <i>#include</i> wird alles in der entsprechend angegebenen Datei
zu deiner Datei hinzugefuegt. In dem Fall bekommst du also alle in
<i>iostream</i> definierten Funktionalitaeten. Das sind, wie der Name sagt
(Abkuerzung fuer Input/Output Streaming), die Moeglichkeiten, Daten
fuer den Benutzer auszugeben und auch Daten von ihm einzulesen. In dem Fall
brauchen wir nur die Ausgabe-Moeglichkeit, denn sehr viel tut das
Programm ja nicht.<br>
Den <i>using namespace</i> Befehl versteht man eigentlich erst richtig,
wenn man sich mit Namespaces beschaeftigt hat. Fuer alles weitere ist das
aber vollkommen uninteressant. Grob gesagt sind alle Funktionalitaeten
der <i>iostream</i> in einem eigenen Namensbereich, so dass keine
Namenskonflikte entstehen (wenn du z.B. eine Funktion definieren willst,
die mit gleichem Namen aber schon in der <i>iostream</i> ist). Wir werden
darauf achten, dass keine Namenskonflikte entstehen (wenn das so waere,
wuerde der Kompiler das uns sowieso melden) und deshalb alles in dem
Namensbereich <i>std</i> mitbenutzen.<br>
<i>int main()</i> ist nun unsere Main-Funktion; das ist die Funktion, die bei
jedem Programm immer als erstes gestartet wird. Von hier aus muessen wir
alles weitere tun. Wenn wir aus der Funktion wieder raus sind, ist das
Programm damit beendet.<br>
Innerhalb der geschweiften Klammern (<i>{ ... }</i>) steht nun der
eigentliche Code des Programms, d.h. der Code, der auch wirklich etwas tut
(alles bisherige war ja nur Vorbereitung, damit wir jetzt z.B. die
Moeglichkeit haben, Sachen auszugeben).<br>
Mit <i>cout &lt;&lt; ... &lt;&lt; ... &lt;&lt; ... ... ;</i> koennen
wir nun beliebige
Sachen ausgeben, die letzendlich dann auf der Konsole angezeigt werden.
<i>endl</i> wurde auch in <i>iostream</i> definiert und bewirkt das Ende
einer Zeile (Abkuerzung: end line). Genaugenommen ist <i>cout</i> ein
Objekt (und zwar ein Stream-Objekt), was fuer die Ausgabe steht
(Abkuerzung: console output) und in das
ihr mit <i>&lt;&lt;</i> irgendwelche Daten reinleitet. Dies ist der uebliche
Weg um in C++ Daten auszugeben. Die genauen Hintergruende, washierbei
eigentlich genau passiert, interessieren uns nun aber erstmal nicht.
Um das Programm einfach zu halten, wollen wir uns erstmal ansonsten
komplett fernhalten von objektorientierter Programmierung, auch wenn wir
sie in diesem Fall quasi anwenden (was ihr aber nicht gemerkt haettet,
haette ich nicht davon erzaehlt).<br>
Da die Funktion <i>main</i> einen Rueckgabetyp ungleich <i>void</i> hat
(<i>void</i> steht fuer 'nichts'), muss auch ein Wert zurueckgegeben werden.
In diesem Fall ist ein <i>int</i> verlangt, also muss eine Zahl zurueckgegeben
werden (<i>int</i> steht fuer Integer und bedeutet uebersetzt Ganzzahl).
Die Main-Funktion ist immer von diesem Format, da jedes Programm immer
so eine Zahl an das System zurueckgibt. Was das System dann damit macht ist
eine andere Frage, in der Regel wird sie ignoriert. Man kann sie aber auch
abfragen und weiterverwerten. In der Regel gibt die Zahl den Status des
Programms an, also ob dieses erfolgreiche Arbeit getan hat oder ob
irgendwelche Probleme aufgetreten sind. Eine 0 als Rueckgabewert steht damit
fuer die erfolgreiche Arbeit, eine 1 oder -1 in der Regel fuer irgendeinen
Fehler. Mit <i>return</i> geben wir dann letztendlich den Wert zurueck,
fuer den wir uns entschieden haben und beenden damit gleichzeitig auch
die Prozedur (die aber dann sowieso zu Ende waere in dem Fall, da sonst
kein weiterer Befehl kommt).
</p>

<p>
<b>Kompilieren</b><br>
Das Kompilieren geht einfach: Wenn du eine Datei mit dem Namen
<i>kompiliere_mich.cpp</i> hast, musst du (im Falle von C++) folgendes
aufrufen:
<pre>g++ kompiliere_mich.cpp -o kompiliertes_ich</pre>
Starten kannst du die kompilierte Version dann so:
<pre>./kompiliertes_ich</pre>
Und bestaune das Ergebnis...
</p>

<p>
<b>Der Anfang - 1. Version</b><br>
Download: <a href="spiel1.cpp">spiel1.cpp</a><br>
Ladet euch den Code am besten runter und schaut ihn euch einmal an.<br>
<br>
In dieser 1. Version wollen wir eine Kugel sich von links nach rechts ueber
den Bildschirm bewegen lassen.<br>
Wir beginnen also mit dem Schreiben unserer
Main-Funktion, denn dies ist schliesslich unsere Startfunktion. Die
komplette Ausgabe soll ueber die Konsole geschehen, weil dies erstmal
das einfachste ist, was wir auch koennen. Da es nicht so ganz leicht
erscheint, die genaue Groesse der Konsole irgendwie zu ermitteln,
legen wir fuer den Anfang mal eine feste Hoehe und Breite fuer die
Ausgabe auf der Konsole fest. Passende Variablennamen dazu sind sicherlich
<i>screen_width</i> und <i>screen_height</i>. Da wir erstmal sowieso nur
eine Bewegung von links nach rechts realisieren wollen, ignorieren wir
vorerst alles auf der Y-Koordinate.<br>
<br>
Nun wollen wir uns unsere Kugel definieren. Wir koennten dafuer eine
einfache Variable definieren, die fuer die X-Koordinate der Kugel steht,
aber wir wollen direkt einmal einen allgemeinen Kugel-Typ definieren,
wenn wir spaeter mal mehrere solcher Kugeln anzeigen lassen wollen.<br>
Wir definieren uns also eine Struktur, die im
Endeffekt eine Kugel repraesentieren soll. Eine Struktur ist nichts anderes
als eine Menge von Variablen, also quasi eine Menge von Eigenschaften. In
diesem Fall hat unsere Struktur <i>Kugel</i> (so nennen wir die passenderweise)
die Eigenschaften <i>c</i>
(im Prinzip das visuelle Bild der Kugel; in dem Fall ein einzelnes Zeichen
(<i>char</i>)), <i>x</i> und <i>y</i> (die Koordinaten der Kugel). Da diese
Struktur fuer den gesamten restlichen Code bekannt sein soll, packen wir sie
ganz an den Anfang (allerdings unterhalb der Includes; dies ist so ueblich).<br>
Kehren wir nun zurueck in die Main-Funktion. Hier erstellen wir nun eine
Variable von unserem gerade definierten Kugel-Typ; die Variable nennen wir
einfach mal <i>myKugel</i>. Sie soll als ein grosses X dargestellt werden
und erstmal am Anfang auf der linken Seite sein.<br>
<br>
Die Kugel soll sich nun bewegen. Wir wollen einfache jede Position
von ganz links bis ganz rechts einmal durchlaufen. So etwas realisiert
man am besten mit einer Schleife, die genau jede Position einmal
durchlaeuft.<br>
Eine <i>for</i>-Schleife bekommt 3 Parameter inklusive einem Codeblock.
Der 1. Parameter definiert den Startwert. Wir wollen hierfuer mal eine
neue Variable definieren, wir koennten aber auch direkt <i>myKugel.x</i>
als Laufvariable verwenden. Unsere Laufvariable nennen wir passenderweise
mal <i>pos_x</i> und wir wollen ganz links beginnen, also an Position 0.<br>
Der 2. Parameter bestimmt die Abbruchbedingung der Schleife. Die 
<i>for</i>-Schleife wird dabei genau so lange immer wieder neu ausgefuehrt,
so lange die Bedingung des 2. Parameters den Wert <i>true</i> zurueckgibt.
Dieser 2. Parameter wird also zu Beginn jedes Durchlaufes des Codeblocks
ausgewertet und die komplette Auswertung der Schleife bricht genau dann ab,
wenn die Bedingung <i>false</i> ergibt. In unserem Fall soll die Schleife
immer dann noch weiter durchlaufen werden, so lange die Bewegung noch nicht
zu Ende ist. Die Bewegung ist dann zu Ende, wenn die Kugel ueber den rechten
Bildschirmrand hinaus will.<br>
Der 3. Parameter laesst die Laufvariable laufen. In unserem Fall soll sie
immer genau einen Wert vorwaerts gehen. Das <i>pos_x++</i> ist dabei eine
Abkuerzung fuer <i>pos_x = pos_x + 1</i>.<br>
Im Inneren des Schleifen-Codes, also des Codeblocks der Schleife, wollen
wir nun die Kugel an die entsprechende Position setzen, also die Bewegung
durchfuehren. Dies ist ein einzelner Befehl (<i>myKugel.x = pos_x;</i>).<br>
Nachdem das getan ist, kommt natuerlich noch ein entscheidender bisher
fehlender Teil in unserem Programm, naemlich die Darstellung von dem,
was wir da eigentlich tun, naemlich die Kugel zu bewegen.<br>
Unser aktueller Status ist der, dass wir nun die Kugel an einer bestimmten
Position haben und dies nun auf dem Bildschirm darstellen wollen.<br>
Dazu lassen wir erstmal alles bisherige auf dem Bildschirm komplett loeschen
und zeichnen dann das neue Bild. Da wir ja auf der Konsole unsere Sachen
ausgeben lassen, muessen wir dort also alles aktuell zu sehende loeschen.
Wie man dies genau tut, erfaehrt man auch leicht im Internet. Die Technik
ist im Prinzip die, dass bestimmte Steuerzeichen fuer die Konsole genau das
bewirken, naemlich das loeschen des aktuell zu sehenden Bereichs.
Da wir den Code verstaendlich halten wollen, packen wir dieses Senden der
speziellen Steuerzeichen in eine eigene Funktion, die wir passenderweise
<i>clear_screen()</i> nennen (die nichts zurueckgeben muss, deshalb
<i>void</i>). Nun zurueck in der Schleife rufen wir diese Funktion
<i>clear_screen()</i> einmal auf, um genau das zu bewirken, was wir
wollten.<br>
Nachdem wir das getan haben, haben wir nun also einen leeren Bildschirm.
Auf diesen muessen wir jetzt noch die Kugel irgendwie bekommen. Die Kugel
befindet sich an Position <i>myKugel.x</i>. Bisher kuemmern wir uns
erstmal nur um die X-Koordinate, d.h. wir zeichnen nur eine Zeile. Wir
gehen also diese eine Zeile von links nach rechts durch und geben
ein "X" aus, wenn wir gerade an der Position sind, wo die Kugel sich
befindet, ansonsten geben wir ein Leerzeichen aus (also ' '). Dieses
Leerzeichen auszugeben ist natuerlich wichtig, denn ansonsten wuerde
die Kugel einfach immer am linken Rand festkleben. Probiert es einfach
aus, indem ihr den entsprechenden Bereich auskommentiert (d.h.
setzt einfach <i>//</i> vor den Befehl).<br>
Wenn wir den bisherigen Code so testen (testet es am besten selbst),
werden wir feststellen, dass die Bewegung viel zu schnell ablaeuft.
Warum das so ist? Wir haben an keiner Stelle etwas einprogrammiert,
was die Bewegung langsam machen sollte. Damit die Bewegung langsamer
ablaeuft, lassen wir das Programm in jedem Schleifendurchlauf einfach
fuer 100 Millisekunden warten.<br>
Nach einer kurzen Suche im Internet finden wir die Funktion <i>usleep</i>.
Dafuer muessen wir noch eine 2. Datei includen und zwar die <i>unistd.h</i>.
Diese benoetige wir, um die Funktion <i>usleep</i> benutzen zu koennen.
<i>usleep</i> tut nichts weiter, als das Programm fuer die entsprechende
Anzahl an Mikrosekunden in den Schlaf zu versetzen, also beispielsweise
<i>usleep(250 * 1000);</i> setzt das Programm 1/4 Sekunde in den Schlaf.<br>
Solche Sachen weiss man in der Regel natuerlich nicht auswendig, aber dafuer
gibt es ja das Internet. Es hat auch nicht besonders viel mit Programmieren
zu tun, jede noch so exotische Funktion auswendig zu kennen. Bei so
elementaren Funktionen wie eine Schlaf-Funktion findet man in der Regel
recht schnell das was man braucht. Und ansonsten gibt es ja auch
zahllose Foren, wo einem geholfen wird.<br>
Nachdem wir das eingebaut haben, werden wir feststellen, dass das
Programm nun zwar viel langsamer ablaeuft, aber nicht jeder einzelne
Bewegungsschritt richtig gezeichnet wird. Dies scheint uns im ersten Moment
voellig unverstaendlich zu sein. Nach ein wenig weiterer Forschung im
Internet finden wir heraus, dass <i>cout</i> einen Cache benutzt, d. h.
es wird nicht sofort direkt alles ausgegeben, sondern erstmal gespeichert
und erst dann ausgegeben, wenn genug Daten zusammen sind. Das ist
natuerlich nicht gut fuer das was wir wollen, naemlich das das Bild immer
sofort direkt ausgegeben wird. Dies ist mit der <i>flush()</i> Methode
von <i>cout</i> moeglich, die alle Daten, die im Moment im Cache sind, in
jedem Fall nun ausgibt.<br>
Nach einem weiteren Test werden wir feststellen, dass das Programm
nun endlich genau das tut, was wir wollen, naemlich die Anzeige
der Bewegung einer Kugel von links nach rechts.<br>
<br>
Screenshot:<br>
<img src="spiel1-screenshot.png">
</p>

<p>
<b>Es schreitet voran - 2. Version</b><br>
Download: <a href="spiel2.cpp">spiel2.cpp</a><br>
<br>
Wir wollen unser bisheriges Programm nun so erweitern, dass wir anstatt
nur einer Kugel gleich mehrere Kugeln darstellen koennen. Ausserdem
wollen wir uns nun auch um die Y-Koordinate kuemmern. Dies sind keine
wirklich grossartigen Erweiterungen, aber sie werden schon mal
mehr Moeglichkeiten fuer weiteres schaffen.<br>
<br>
Da wir ein einheitliches System schaffen wollen, wo wir alle Kugeln
unterbringen, erschaffen wir eine neue Struktur, in der wir eine Liste
aller Kugeln und sonstigem zu zeichnendem Inhalt speichern wollen.<br>
Diese Struktur nennen wir <i>World</i>. Diese Welt enthaelt auch eine
Groesse. Im eigentlichen Code, d.h. in der Main-Funktion, erstellen wir
uns nun eine Variable von unserem neu definierten Typ <i>World</i>; die
Variable nennen wir <i>myWorld</i>. Diese Welt, in der unsere Kugeln
sein werden, soll die komplette Groesse des Bildschirms einnehmen.
Die Welt soll erstmal aus 2 Kugeln bestehen, was wir in der Struktur
vorerst direkt festlegen muessen. Wir koennen diese Zahl auch variable
halten, das wird aber dann etwas mehr Aufwand. Wir definieren uns direkt
auch eine Funktion <i>World_KugelnCount</i>, die die Anzahl der Kugeln
in einer Welt ermittelt. Die 2 Kugeln in <i>World</i> sind als Array
definiert, ein Array mit 2 Elementen vom Typ <i>Kugel</i>. Die Funktion
<i>World_KugelnCount</i> tut nichts anderes, als die Groesse des
Arrays zu betrachten und durch die Groesse einer einzelnen Kugel
zu teilen - so bekommen wir natuerlich die Anzahl der Elemente in dem
Array.<br>
<br>
Zurueck in der Main-Funktion weisen wir nun unseren 2 Kugeln bestimmte
Startwerte zu. Die 1. Kugel ('A') soll links oben in der Ecke sein
und die 2. Kugel ('B') rechts unten. Wir wollen nun, dass sich beide
Kugeln gleichzeitig bewegen - und zwar soll sich die Kugel 'A' von
links nach rechts bewegen und die Kugel 'B' von rechts nach links -
beide mit gleicher Geschwindigkeit.<br>
Wir lassen dazu unsere bisherige <i>for</i>-Schleife so wie sie ist,
nur dass wir den Codeblock nun ein wenig anpassen muessen. Die
Kugel 'A' bekommt dabei genauso wie im 1. Beispiel die Position der alten
Kugel; die Kugel 'B' bekommt nun genau die gleiche Entfernung, allerdings
vom rechten Rand aus gemessen. Um genau zu sein ignorieren wir im
Moment voellig die Groesse von myWorld, sondern beziehen uns direkt
auf die Groesse vom gesamten Bildschirmbereich, was aber egal ist, da
beide Groessen uebereinstimmen.<br>
<br>
Das Zeichnen der Kugeln wird jetzt noch erweitert durch das Zeichnen
jeder einzelnen Zeile (bisher war es ja nur eine einzige). Um den Code
uebersichtlich zu halten, verpacken wir alles, was mit dem Zeichnen zu
tun hat, in eine Funktion, die wir passenderweise <i>World_draw</i> nennen
wollen. Diese Funktion soll als Parameter die entsprechend zu zeichnende
Welt bekommen, also eine Variable vom Typ <i>World</i>; in unserem Fall
wird sie also <i>myWorld</i> ueberwiesen bekommen. Ganz am Ende in der
Schleife soll dann natuerlich, wie auch im ersten Beispiel, eine
realistische Geschwindigkeit mit <i>usleep</i> erzwungen werden.<br>
<br>
Wir muessen nun also die Funktion <i>World_draw</i> noch programmieren.
Der Aufbau ist aehnlich wie schon im ersten Beispiel. Wir beginnen damit,
erstmal den Bildschirm zu saeubern, um einen leeren Bildschirm zu haben.
Im ersten Beispiel haben wir nun einfach immer ein Leerzeichen gezeichnet
bis zu dem Punkt, wo die Kugel zu zeichnen war. In diesem Fall haben wir
evtl. auch manche Zeilen, wo ueberhaupt keine Kugeln sind (da wir nur
2 Kugeln ueberhaupt bei unserer Welt zu zeichnen haben, werden das auch
einige Zeilen sein). Wir wollen also erstmal untersuchen, ob wir in dieser
Zeile ueberhaupt etwas zu Zeichnen haben und erst wenn wir wissen,
dass sich wirklich etwas in der Zeile befindet, zeichnen wir auch diese
Zeile. Das Zeichnen der Zeile selbst geschieht dabei dann genauso wie
beim 1. Mal, nur dass wir diesmal noch ein paar mehr Kugeln zu
ueberpruefen haben. Nach der Zeile muessen wir natuerlich noch zur
naechsten Zeile springen, also muessen wir ein <i>endl</i> ausgeben.<br>
Zum Test koennt ihr mal den Part mit der Ueberpruefung, ob die Zeile
ueberhaupt gezeichnet werden soll, weglassen (d.h. auskommentieren)
und <i>draw_this_line</i> immer auf <i>true</i> setzen. Wenn ihr einen
etwas aelteren PC habt, werden ihr vielleicht einen kleinen Unterschied
bemerken.<br> 
<br>
Screenshot:<br>
<img src="spiel2-screenshot.png">
</p>

<p>
<b>Endversion - 3. Version</b><br>
Download: <a href="spiel3.cpp">spiel3.cpp</a><br>
<br>
Wir wollen nun von der automatischen Bewegung der Kugeln weggehen
und die Kugeln vom Benutzer bewegen lassen. Dazu muessen wir also
eine Auswertung der Benutzereingaben vornehmen. Ich habe bereits
am Anfang von dein Eingabe Moeglichkeiten der <i>iostream</i>
geredet. Diese sind in unserem Fall aber eher nicht zu gebrauchen, denn
diese Eingaben dort (das <i>cin</i>-Objekt) sind dafuer gedacht, irgendwelche
Werte vom Benutzer zu erfragen und diese dann weiter zu verarbeiten.
Fuer unser kleines Programm ist es aber besser, wenn wir nur genau
ein einzelnes Zeichen vom Benutzer erfragen. Dazu sehen wir uns mal wieder
ein bisschen im Internet um und stossen auf die vorprogrammierte Funktion
<i>getch</i>. Diese kopieren wir uns einfach in unser Programm rein.
Diese Funktion benoetigt noch das Includen der Datei <i>termios.h</i>.
Mit dieser Funktion haben wir nun die Moeglichkeit, ein einzelnes Zeichen
vom Benutzer abzufragen. Wie die Funktion selber genau funktioniert,
interessiert uns dabei weniger, uns reicht zu wissen, dass wir so das
naechste vom Benutzer eingegebene Zeichen ermitteln koennen.<br>
<br>
Wir wollen unsere Welt erweitern auf 5 Kugeln. Dazu passen wir einfach
unsere <i>World</i>-Struktur entsprechend an. 2 von diesen 5 Kugeln
wollen wir von der Tastatur steuern lassen, die 1. dabei von den Tasten
'w', 'a', 's', 'd' und die 2. von den Tasten 'i', 'j', 'k', 'l'.
Da es aber bloed ist, immer nur die gleichen 2 Kugeln steuern zu koennen,
fuehren wir 2 Variablen <i>input1</i> und <i>input2</i> ein, die festlegen,
welche 2 Kugeln wir steuern. Wenn die Taste 'e' gedrueckt wird, soll
<i>input1</i> neu festgelegt werden koennen, bei der Taste 'o'
entsprechend fuer <i>input2</i>.<br>
Soweit erstmal die Idee der Steuerung. Mit ESC soll das Programm beendet
werden.<br>
<br>
Beim Initialisieren unserer Welt muessen wir uns noch um die Startpositionen
kuemmern. Da es langweilig ist, wenn die Kugeln immer an den gleichen
Positionen starten, wollen wir die Position zufaellig festlegen.
Nach einer weiteren Nachforschung im Internet stossen wir dazu auf die
Funktion <i>rand()</i>. Um diese Benutzen zu koennen, muessen wir die Datei
<i>stdlib.h</i> includen. <i>rand()</i> liefert dabei dann einen zufaelligen
positiven ganzzahligen Wert zurueck. Diese Zufallsfunktion muss bei Beginn
des Programms aber erstmal initialisiert werden mit der Funktion
<i>srand()</i>. Wir benoetigen hierfuer einen zufaelligen Anfangswert,
der jedes Mal anders sein wird. Hierfuer bietet sich die Zeit an, also
benotigen wir noch einen Include fuer die Datei <i>time.h</i>, die uns
dann die Funktion <i>time(..)</i> bereitstellt. Zum Initialisieren der
Zufallsfunktion erstellen wir uns nun eine Funktion <i>randomize</i>.
Das alles ist so ueblich und findet man so in jedem 2. Beispiel zur
Anwendung der <i>rand()</i>-Funktion.<br>
<br>
Zurueck in der Main-Funktion: Wir sind immer noch dabei, die 5 Kugeln
zu initialisieren. Wir wollen diese mit 'A' bis 'E' bezeichnen.
Die Position soll zufaellig gewaehlt im kompletten Raum der Welt sein.
Mit <i>rand() % myWorld.width</i> erhalten wir einen zufaelligen Wert
von 0 bis <i>myWorld.width - 1</i>, denn <i>%</i> ist der Modulo-Operator,
der den rechten Wert so lange von dem linken Wert abzieht, bis dieser
kleiner als der rechte ist. Entsprechendes tun wir fuer die Y-Koordinate.<br>
<br>
Wir beginnen nun damit, die Eingaben des Benutzers abzufragen. Dafuer
definieren wir uns eine Variable <i>input</i>, in der wir das zuletzt
vom Benutzer eingegebene Zeichen speichern wollen. Dieses wollen wir
immer wieder neu abfragen, quasi endlos, bis der Benutzer mit ESC mitteilt,
er moechte das Programm beenden. Diesen Status wollen wir in der Variable
<i>end</i> speichern. Wir gehen nun also in eine Schleife, die so lange
wiederholt werden soll, solange <i>end == false</i> ist. Dafuer bietet
sich die <i>while</i>-Schleife an. In ihr programmieren wir die
entsprechenden Aktionen auf das eingegebene Zeichen, so wie wir sie haben
wollen. Zur einfacheren Handhabung der Bewegung einer Kugel definieren
wir uns noch eine <i>Kugel_move</i>-Funktion, die nichts anderes tut,
als eine Kugel zu bewegen.<br>
<br>
Unsere <i>World_draw</i>-Funktion wollen wir auch etwas erweitern - und
zwar sieht es noch netter aus, wenn wir einen Rand um die Funktion
drumrum zeichnen. Wir wollen ausserdem die aktuelle Position jeder
Kugel angeben. Den Aufruf dieser Funktion <i>World_draw_debug</i>, die genau
das tut, koennen wir auch spaeter auskommentieren, wenn wir diese
Informationen nicht mehr ausgeben wollen.<br>
<br>
Im Prinzip ist damit erstmal alles fertig, was wir haben wollten.
Irgendwelche Erweiterungen sollten jetzt auch nicht weiter schwierig
sein.<br>
<br>
Screenshot:<br>
<img src="spiel3-screenshot.png">
</p>

<p>
<b>Fragen, Sonstiges</b><br>
Falls ihr irgendwelche Fragen oder sonstige Rueckmeldungen habt,
schreibt mich einfach an. Ich werde bei Aenderungswuenschen dann auch
entsprechend diesen Artikel erweitern.
</p>

<p>
<b>Weiterfuehrendes Tutorial</b><br>
Ich kann jedem nur waermstens die Programmiersprache Free Pascal empfehlen.
Es handelt sich um einen freien Open Source Pascal Compiler. Darauf aufbauend
gibt es Lazarus, eine RAD-Entwicklungsumgebung aehnlich wie Delphi oder 
Visual Basic auf Basis einer sehr maechtigen Programmiersprache mit allen
Vorzuegen der objektorientierten Programmierung. Auch ohne diese vielen
schoenen Moeglichkeiten der Programmiersprache zu nutzen, kann man aber
bereits schon so einiges schaffen. Als aehnliches Tutorial wie dies hier
habe ich dazu ein etwas komplexeres Spiel programmiert, welches aber im
Prinzip genauso wenig Voraussetzungen benoetigt wie auch dieses Tutorial.<br>
Hier ist der Link: <a href="../robot2">Robot 2</a>
</p>
