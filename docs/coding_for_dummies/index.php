<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="de-de"><head> <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type"><title>coding for absolute dummies</title> <meta content="Albert Zeyer" name="author"> <meta content="Tutorial zum Erlernen des Programmierens - geschrieben f&uuml;r absolute Laien" name="description"> <meta content="Tutorial,Programmieren,Algorithmus,Pascal,Object Pascal,einfach,Lernen,elementar" name="keywords"> <link rel="home" title="Webserver von Albert Zeyer" href="http://www.az2000.de/">
<link rel="start" title="Webserver von Albert Zeyer" href="http://www.az2000.de/"> <style type="text/css">
  body, table, p { font-family: sans-serif;
    }

  p { text-indent: 1.5em;
    margin-top: 0pt;
    }

  pre { border-style: solid ! important;
    border-width: 1px ! important;
    font-family: monospace,Courier New,Courier ! important;
    background-color: rgb(204, 255, 255) ! important;
    margin-left: 10px;
    margin-right: 10px;
    font-size: small ! important;
    }

  .algo { color: rgb(0, 0, 153);
    font-weight: inherit;
    line-height: normal;
    font-family: Courier New,Courier,monospace;
    }

  .aufgabe { color: rgb(102, 102, 0);
    }

  .offtopic { color: rgb(153, 153, 153);
    font-style: italic;
    }

  .var { color: rgb(51, 51, 51);
    font-family: Courier New,Courier,monospace;
    }


</style><?php include_once('print_code.php'); ?></head>
<body style="direction: ltr;"><h1 style="text-align: center;"><big>coding
for
absolute
dummies</big></h1>
<div style="text-align: center;">oder auch</div>
<h1 style="text-align: center;">Programmieren
f&uuml;r
absolute ... Laien</h1>
<p>Dies ist der Versuch, zu beweisen, dass <span style="font-weight: bold;">Programmieren</span> etwas
sehr einfaches ist.</p>
<p>Als ein Leser dieses Tutorials scheinst du vermutlich sehr
verzweifelt zu sein, immer noch nicht programmieren zu k&ouml;nnen
und gleichzeitig auch wohl deswegen, dass du gerade einen Text
w&auml;hlst, dessen Titel dich bereits beleidigt. Vielleicht bist
du auch ein Programmieranf&auml;nger und scheiterst immer wieder
bei den ersten Gehversuchen, obwohl du bisher nichtmals richtig
krabbeln
kannst (dies ist im &uuml;bertragenen Sinne gemeint).</p><p>Die
gr&ouml;&szlig;te &Uuml;berwindungsh&uuml;rde ist
h&auml;ufig die, damit klar zu werden, dass
Programmieren wirklich etwas sehr einfaches ist - und wegzugehen von
der Einstellung "Hm, das sieht ja alles ganz trivial aus, aber so
extrem simpel kann das doch gar nicht sein, also muss das wohl ganz
kompliziert sein, denn diesen komplizierten Inhalt sehe ich nicht."</p>
<p><span class="offtopic" style="font-weight: bold;">Hinweis</span><span class="offtopic">:
Dieses Tutorial ist zur Zeit noch nicht vollst&auml;ndig und wird
stetig
nachbearbeitet und erweitert. (Das Endziel ist die komplette
Einf&uuml;hrung in die objekt-orientierte Programmierung.) Bitte nicht
erschrecken, wenn das Ende
etwas pl&ouml;tzlich kommt. Auch bin ich f&uuml;r Tipps
deinerseits
dankbar, falls du etwas nicht verstanden hast, so dass ich in dem Fall
auf das entsprechende Detail noch genauer eingehen kann.</span></p>
<p>Das wird dich erwarten: (Und falls du denkst, bereits etwas
schon lange zu wissen und verstanden zu haben, kannst du ruhig Kapitel
&uuml;berfliegen bzw. auslassen.)<br></p><ol><li><a href="#anfang">Beginn der absoluten Grundlagen des
Programmierens</a></li><li><a href="#pascal">Schnelleinf&uuml;hrung
in Object Pascal</a></li><li><a href="#lazarus">Schnelleinf&uuml;hrung in Lazarus</a></li><li><a href="#Robot">Praktische Anwendung in
Object Pascal</a></li></ol><h2><a name="anfang"></a>Der
Anfang</h2><p>Beginnen wir mit dem Anfang:<br>
Programmieren, was ist das eigentlich?</p>
<h2>Definitionsversuch</h2>
<p>Man k&ouml;nnte allgemein sagen, Programmieren ist das
Aufschreiben und &Uuml;berlegen von <span style="font-weight: bold;">Algorithmen</span>.</p>
<p>Da das Schreiben hoffentlich keine Schwierigkeit darstellt und
die Schwierigkeiten beim &Uuml;berlegen sich in Grenzen halten,
bleibt noch die Frage, was Algorithmen sind.</p>
<p><img style="width: 200px; height: 188px; float: right;" alt="TODO Liste" src="todo_liste.png"></p><p>Algorithmen
sind, grob gesagt, <span style="font-weight: bold;">Anleitungen</span>,
wie ein
bestimmtes
<span style="font-weight: bold;">Ziel</span> zu
einem <span style="font-weight: bold;">Problem</span>
bzw. einer Aufgabe erreicht&nbsp; werden
kann. Diese Anleitung ist dabei in der Art einer <span style="font-weight: bold;">Liste</span> von <span style="font-weight: bold;">Anweisungen</span>,
die abgearbeitet werden m&uuml;ssen. Je nach Kontext ist es
nat&uuml;rlich wichtig, die Anweisungen hinreichend primitiv zu
halten - eine Anweisung wie "l&ouml;se das Problem" ist nicht
zugelassen. Man beachte dabei: Bei der allgemeinen Definition ist
absolut nicht festgelegt, f&uuml;r wen diese Anweisungen sind, also
von wem sie ausgef&uuml;hrt werden sollen. Dies kann sowohl ein
Computer als auch ein Mensch oder sonst etwas ganz anderes sein. Auch
die Problemstellung und das
gew&uuml;nschte Ziel kann alles beliebige sein. Wichtig
ist nur, dass in jedem Fall klar definiert ist, was getan werden soll.
Es muss klar sein, welches die erste Anweisung ist. Es muss
au&szlig;erdem klar sein nach dem Ausf&uuml;hren einer
beliebiger Anweisung, welche Anweisung als n&auml;chstes
auszuf&uuml;hren ist. Auch nicht definiert ist, in welcher Sprache
oder in welcher Form diese Liste von Anweisungen sein muss.</p>
<h2>Beispiele von Algorithmen</h2>
<p>Ein paar <span style="text-decoration: underline;">Beispiele</span>:</p>
<p><span style="text-decoration: underline;"><a name="muellentfernen"></a>Aufgabe</span>:<br>
<span class="aufgabe">In meinem Zimmer befindet sich ein
Haufen Abfall (sagen wir 1
m&sup3;), der in den M&uuml;llkontainer im Keller soll.</span></p>
<p><img style="width: 300px; height: 192px;" alt="" title="M&uuml;ll Situation" src="muell_situation.png"></p><p><span style="text-decoration: underline;">L&ouml;sung
1</span>:<br>
</p><ol> <li><span class="algo">Man
nehme
meinen
M&uuml;llkorb, </span><span class="algo" style="font-style: italic;">[der 1/3
m&sup3;
transportieren kann]</span></li> <li><span class="algo">f&uuml;lle ihn mit 1/3
m&sup3; des Abfalls,</span></li> <li><span class="algo">laufe damit nach unten in
den Keller,</span></li> <li><span class="algo">entleere
ihn im
M&uuml;llkontainer,</span></li> <li><span class="algo">laufe mit ihm wieder nach
oben in mein Zimmer,</span></li> <li><span class="algo">f&uuml;lle
ihn&nbsp;mit 1/3 m&sup3; des Abfalls,</span></li> <li><span class="algo">laufe damit nach unten in
den Keller,</span></li> <li><span class="algo">entleere
ihn im
M&uuml;llkontainer,</span></li> <li><span class="algo">laufe mit ihm wieder nach
oben in mein Zimmer,</span></li> <li><span class="algo">f&uuml;lle ihn mit 1/3
m&sup3; des Abfalls,</span></li> <li><span class="algo">laufe damit nach unten in
den Keller,</span></li> <li><span class="algo">entleere
ihn im
M&uuml;llkontainer.</span></li>
</ol><p><a name="schleife"></a>Um
Schreibarbeit zu
sparen, fasst man wiederholende
Aktionen h&auml;ufig zusammen (was vollkommen legitim ist, solange
eindeutig bleibt, was genau getan werden soll; man nennt dies eine <span style="font-weight: bold;">Schleife</span>):</p>
<p>Nochmal <span style="text-decoration: underline;">L&ouml;sung
1</span>:<span class="algo"><br>
(1.) Man nehme meinen
M&uuml;llkorb</span><br>
<span class="algo">F&uuml;hre folgende
Aktionen 3 Mal aus:<br>
</span><span class="algo">&nbsp;&nbsp;&nbsp;
(2.) f&uuml;lle ihn mit 1/3
m&sup3; des Abfalls,</span><br>
<span class="algo">&nbsp;&nbsp;&nbsp;
(3.) laufe damit nach unten in den
Keller,</span><br>
<span class="algo">&nbsp;&nbsp;&nbsp;
(4.) entleere ihn im
M&uuml;llkontainer,</span><br>
<span class="algo">&nbsp;&nbsp;&nbsp;
(5.) laufe mit ihm wieder nach oben in
mein Zimmer,</span><br>
<span class="algo">Ende der zu wiederholenden
Aktionen</span><br>
</p><span class="algo"></span><span class="algo"></span><p><img style="width: 400px; height: 127px;" alt="" title="M&uuml;llentfernungsalgorithmus 1" src="muell_algo1.png"><br></p><p>Man
beachte, dass man, je nach Kontext, evtl. das
F&uuml;llen des M&uuml;llkorbes auch noch weiter spezifizieren
muss (man kann nat&uuml;rlich an <span style="font-weight: bold;">anderer Stelle</span>
definieren, was genau damit gemeint ist).<br>
Da man sich gerne allgemeiner h&auml;lt (was ist, wenn der
M&uuml;llberg doch gr&ouml;&szlig;er ist oder mein
M&uuml;llkorb noch mehr fassen kann?), k&ouml;nnte man den
Algorithmus aus so formalieren:</p>
<p><span style="text-decoration: underline;">L&ouml;sung
2</span>:<br>
</p><ol> <li><span class="algo">Man
nehme
meinen
M&uuml;llkorb,</span></li> <li><span class="algo">f&uuml;lle ihn (den
M&uuml;llkorb) mit Abfall, bis er voll
ist,</span></li> <li><span class="algo">laufe
damit nach unten in
den Keller,</span></li> <li><span class="algo">entleere
ihn im
M&uuml;llkontainer,</span></li> <li><span class="algo">laufe mit ihm wieder nach
oben in mein Zimmer,</span></li> <li><span class="algo"> </span><span class="algo" style="font-weight: bold;">wenn</span><span class="algo">
noch M&uuml;ll vorhanden ist, </span><span class="algo" style="font-weight: bold;">dann</span><span class="algo">
(7.) fahre mit Aktion 2 fort</span></li>
</ol><p>Dies ist nicht exakt der gleiche Algorithmus, denn
die
Aktionen sind nicht ganz dieselben. Abgesehen von der allgemeineren
Fassung ist hier die Anweisung 6 von neuem Charakter. Die Anweisung 7
nennt man eine <span style="font-weight: bold;">bedingte
Anweisung</span>, die n&auml;mlich genau dann
ausgef&uuml;hrt wird, wenn die <span style="font-weight: bold;">Bedingung</span>
der Anweisung 6 erf&uuml;llt wird (bzw. sie soll dann
ausgef&uuml;hrt werden; ein Algorithmus ist nichts, was getan wird,
sondern beschreibt eine M&ouml;glichkeit, etwas zu tun). Naiv ist
hoffentlich sehr klar, wenn ich z.B. dir diese Anleitung gebe, was du
zu tun hast. Entsprechend k&ouml;nnte man bei so einer bedingten
Anweisung nat&uuml;rlich noch einen "sonst tue was anderes"-Fall
hinzuf&uuml;gen.</p>
<p>"Fahre mit Aktion 2 fort" nennt man einen <span style="font-weight: bold;">Sprung</span> und zwar in
diesem Fall zu Aktion 2 (deshalb w&uuml;rde man es auch <span style="font-weight: bold;">R&uuml;cksprung</span>
nennen). Auf diese Art wird hier die Schleife realisiert.</p>
<p>In diesem Fall ist die Schleife noch relativ simpel (inklusive
dem ganzen Algorithmus). Es k&ouml;nnte aber F&auml;lle geben,
in denen das ganze nicht so gut &uuml;berschaubar ist. Es stellt
sich dann die wichtige Frage, ob es bei der Ausf&uuml;hrung des
Algorithmus' passieren kann, dass man <span style="font-weight: bold;">unendlich lange</span> in
einer Schleife gefangen ist und nicht heraus kommt. Man nennt dies dann
eine <span style="font-weight: bold;">Endlosschleife</span>.
Insgeheim haben wir bisher angenommen, dass der Ausf&uuml;hrer des
Algorithmus der einzige ist, der auf den M&uuml;ll in meinem Zimmer
zugreift - wenn beispielsweise aber aus einem unerkl&auml;rlichen
Grund irgendwoher&nbsp;pro Sekunde 1/10 m&sup3; neuer
M&uuml;ll hinzukommt, der Ausf&uuml;hrer mit dem
F&uuml;llen des M&uuml;lleimers aber bereits schon eine halbe
Minute braucht, sieht man leicht, dass der Ausf&uuml;hrer des
Algorithmus' in L&ouml;sung 2 in einer Endlosschleife ist. In
L&ouml;sung 1 w&auml;re dies nicht so, allerdings w&auml;re
am Ende des Algorithmus das Ziel nicht erreicht.</p>
<p><span style="text-decoration: underline;">L&ouml;sung
3</span>:<br>
</p><ol> <li><span class="algo">Gehe in
den Keller,</span></li> <li><span class="algo">nehme
den
M&uuml;llkontainer,</span></li> <li><span class="algo">laufe mit ihm nach oben
zur&uuml;ck in mein Zimmer,</span></li> <li><span class="algo">f&uuml;lle den im
Zimmer liegenden M&uuml;ll hinein,</span></li> <li><span class="algo">laufe mit dem
M&uuml;llkontainer zur&uuml;ck in den Keller.</span></li>
</ol><p>Genug zu diesem Beispiel und zu einem Neuen.</p>
<p><span style="text-decoration: underline;">Aufgabe</span>:<br>
<span class="aufgabe"><img style="width: 150px; height: 68px; float: right;" alt="n hoch k" src="n_hoch_k.png">Es soll errechnet werden, was <span class="var">n</span> hoch <span class="var">k</span> ist (auch
geschrieben als <span class="var">n</span>^<span class="var">k</span>). <span style="font-style: italic;">n</span> und <span style="font-style: italic;">k</span>
sollen dabei nicht negative, ganzen Zahlen (also ohne Nachkommastellen)
sein. Dem Ausf&uuml;hrer wird als Voraussetzung gegeben, dass er
multiplizieren kann.</span></p>
<p><img style="width: 200px; height: 102px; float: left;" alt="Speicherfelder" src="speicherfelder.png" hspace="10">Im
Folgenden kommt ein sehr wichtiges neues Element in dem
Algorithmus hinzu. Wir m&uuml;ssen uns gewisse Sachen merken. Wie
das Merken genau aussieht, spielt dabei wieder keine Rolle. Ein
Computer wird dazu seinen Arbeitsspeicher oder evtl. die Festplatte
benutzen. Ein Mensch benutzt einfach sein Ged&auml;chtnis oder ein
Notizblock oder eine sonstige Erinnerungsst&uuml;tze. F&uuml;r
jede Sache, die zu merken ist, haben wir dabei einen bestimmten Platz
(im Kopf, im Arbeitsspeicher oder wo auch immer). Wir wollen die
M&ouml;glichkeit lassen, nach gewisser Zeit an dieser Stelle neue
Daten/Werte zu merken. Das Merken ist dabei nicht (wie man es als
Mensch vielleicht ganz gerne h&auml;tte) etwas
Erg&auml;nzendes,
sondern es wird immer die alte Information an dieser Stelle vergessen
und &uuml;berschrieben mit der neuen Information. Vielleicht stellt
man
sich auch einfach eine Schublade vor, in die genau eine Information
reinpasst - und diese kann abgefragt werden oder auch durch eine andere
ersetzt werden.</p>
<p><span style="text-decoration: underline;">Beispiel</span>:<br>
<img style="width: 100px; height: 144px; float: left;" alt="Buchstaben-Speicherfeld" src="buchstabe.png" hspace="5" vspace="5">Wir wollen uns einen <span style="font-style: italic;">Buchstaben</span>
merken. Am Anfang wollen wir uns f&uuml;r den <span style="font-style: italic;">Buchstaben</span> mal das
'A' merken.<br>
Wir erinnern uns nun, dass wir uns f&uuml;r den <span style="font-style: italic;">Buchstaben</span> ein 'A'
gemerkt haben.<br>
Nun wollen wir uns f&uuml;r den <span style="font-style: italic;">Buchstaben</span>
stattdessen ein 'B' merken. Nun haben wir uns also f&uuml;r den <span style="font-style: italic;">Buchstaben</span> ein 'B'
gemerkt und wissen deshalb nichts mehr von dem 'A', denn nun haben wir
stattdessen uns ja das 'B' gemerkt. (Bei der Benutzung eines
Notizblocks hei&szlig;t das, dass beim neuen Setzen eines neuen
Wertes der alte gestrichen wird. F&uuml;r eine Sache, in diesem
Fall dem <span style="font-style: italic;">Buchstaben</span>,
kann immer nur ein Wert gemerkt werden.)</p>
<p>Man beachte, dass man einen Anfangswert auch angeben sollte,
denn
sonst hat man da ein Speicherfeld ohne Ihnalt am Anfang. Dies kann in
gewissen Situationen zu Uneindeutigkeiten kommen. (Was soll z. B. die
Anweisung bedeuten "multipliziere 5 mit dem Inhalt des Speicherfeldes",
wenn dort bisher kein Inahlt ist?)</p>
<p><span style="text-decoration: underline;">L&ouml;sung</span>
der eigentlichen Aufgabe "<span class="var">n</span> hoch <span class="var">k</span>":<br>
<span class="algo">(1.) Man merke sich einen <span class="var">Z&auml;hler</span>,
der bei <span class="var">k</span>
beginnen soll.</span><br class="algo">
<span class="algo">(2.) Man merke sich das <span class="var">Zwischenergebnis</span>,
welches erstmal 1 sein soll.</span><br class="algo">
<span class="algo">(3.) Wenn der <span class="var">Z&auml;hler</span>
nicht 0 ist, tue folgendes:</span><br class="algo">
<span class="algo">&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp; (4.) Multipliziere das <span class="var">Zwischenergebnis</span>
mit <span class="var">n</span> und
merke es sich als neues <span class="var">Zwischenergebnis</span>.</span><br class="algo">
<span class="algo">&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp; (5.) Z&auml;hle den <span class="var">Z&auml;hler</span> um
eins runter (subtrahiere ihn mit 1) und merke es sich als neuen <span class="var">Z&auml;hler</span>-Wert.</span><br class="algo">
<span class="algo">&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp; (6.) Gehe zu Befehl 3.<br>
</span><span class="algo">Ende der im Wenn-Fall
auszuf&uuml;hrenden Befehle.</span><br class="algo">
<span class="algo">(7.) Das <span class="var">Ergebnis</span> ist nun
der Wert vom <span class="var">Zwischenergebnis</span>.</span></p>
<p>Um alle bisherigen Prinzipien (die Schleife und die zu
merkenden
Sachen) noch mal zu verdeutlichen, wollen wir als Mensch den
Algorithmus einmal f&uuml;r <span style="font-style: italic;">n</span>=3
und <span style="font-style: italic;">k</span>=2
durchgehen.</p>
<ol class="algo"> <li>Befehl 1: Suche einen
Notizblock f&uuml;r den <span class="var">Z&auml;hler</span><span class="var">
</span>und
schreibe 2 drauf.</li> <li>B2: Suche einen Notizblock
f&uuml;r das <span class="var">Zwischenergebnis</span><span class="var">
</span>und schreibe 1 drauf.</li> <li>B3:
&Uuml;berpr&uuml;fe den Notizblock f&uuml;r
den <span class="var">Z&auml;hler</span>,
ob dort eine Zahl ungleich 0 draufsteht. Weil das der Fall ist (es
steht im Moment 2 drauf), gehe zu Befehl 4.</li> <li>B4:
Der Wert vom <span class="var">Zwischenergebnis</span>-Block
(ist im Moment 1) multipliziert mit 3 ergibt 3. Nun streichen wir den
alten Wert vom <span class="var">Zwischenergebnis</span>-Block
durch und schreiben stattdessen 3 drauf.</li> <li>B5: Der <span class="var">Z&auml;hler</span>block
ist im Moment 2. Eins weniger ist also 1. Radiere den alten Inhalt vom <span class="var">Z&auml;hler</span>block
nun aus und schreibe die 1 drauf.</li> <li>B6: Wir sollen
nun zu Befehl 3 gehen.</li> <li>B3:
&Uuml;berpr&uuml;fe den <span class="var">Z&auml;hler</span>blockwert,
ob dieser ungleich 0 ist. Er ist im Moment 2. Also gehen wir weiter zu
Befehl 4.</li> <li>B4: <span class="var">Zwischenergebnis</span>
bekommt den neuen Wert 9.</li> <li>B5: Der <span class="var">Z&auml;hler</span><span class="var">
</span>bekommt den neuen Wert 0.</li> <li>B6: Und weiter zu
Befehl 3.</li> <li>B3: <span class="var">Z&auml;hler</span><span class="var">
</span>ist nun 0, also gehe zum Ende der im Wenn-Fall auszuf&uuml;hrenden
Befehle und damit zu Befehl 7.</li> <li>B4: Das <span class="var">Ergebnis</span><span class="var">
</span>ist nun die Zahl, die auf dem <span class="var">Zwischenergebnis</span>-Block
draufsteht, also 9.</li>
</ol><p>Man mache sich einmal klar, dass dieser Algorithmus
genau dem
entspricht, was man auch sonst im Kopf ausgef&uuml;hrt
h&auml;tte. (Bei
diesen niedrigen Zahlen h&auml;tte man es hoffentlich noch im Kopf
geschafft.)</p>
<p>Direkt zu einem etwas komplexeren
Beispiel:</p>
<p><span style="text-decoration: underline;">Aufgabe</span>:<br>
<span class="aufgabe">Das Ergebnis der Addition 2er Zahlen
(nicht negative, ganze Zahlen,
also ohne Nachkommastellen), die im Dezimalsystem vorliegen, soll
errechnet werden.</span><br class="aufgabe">
<span class="aufgabe">Es ist dabei bekannt, wie 2 Zahlen
von 0 bis 9 inklusive einer 3. Zahl,
die entweder 0 oder 1 ist, zu addieren sind. Diese Addition 2er Ziffern
(mit &Uuml;bertragsziffer) kann also als Operation im Algorithmus
verwendet werden.</span></p>
<p><span style="text-decoration: underline;">L&ouml;sung</span>
(Grundschulmethode aus der 2. Klasse: "schriftlich addieren"):<br>
</p><ol> <li><span class="algo">Man
merke
sich die aktuelle
<span class="var">Ziffernposition</span><span class="var">
</span>und setze diese
<span class="var">Ziffernposition</span><span class="var">
</span>auf die 1. Ziffer </span><span class="algo" style="font-style: italic;">[wir
betrachten die ganz rechteste Ziffer beider Zahlen als die 1. Ziffer]</span></li>
<li><span class="algo">Man merke sich den
aktuellen <span class="var">&Uuml;bertrag</span><span class="var">
</span>als 0.</span></li> <li><span class="algo">Man
merke sich <span class="var">die Summe</span>
der Ziffern an der aktuellen
<span class="var">Ziffernposition</span><span class="var">
</span>der beiden <span class="var">gegebenen
Zahlen</span> sowie zus&auml;tzlich
dem <span class="var">gemerkten &Uuml;bertrag</span>. </span><span class="algo" style="font-style: italic;">[diese
k&ouml;nnen wir nach Voraussetzung berechnen]</span></li>
<li><span class="algo">Die 1. Ziffer <span class="var">dieser Summe</span>
notiere man sich als die Ziffer vom
<span class="var">Ergebnis</span><span class="var"> </span>an
der aktuellen <span class="var">Ziffernposition</span>.</span></li>
<li><span class="algo">Der <span class="var">&Uuml;bertrag</span><span class="var">
</span>soll
nun die 2. Ziffer der gemerkten Summe
sein (falls diese 2ziffrig ist, also &uuml;berhaupt ein
&Uuml;bertrag vorhanden ist.)</span></li> <li><span class="algo">Erh&ouml;he die
aktuelle <span class="var">Ziffernposition</span><span class="var">
</span>um 1.</span></li> <li><span class="algo">Wenn&nbsp;der
<span class="var">&Uuml;bertrag</span><span class="var">
</span>nicht 0 ist oder wir nicht mit
der aktuellen <span class="var">Ziffernposition</span><span class="var">
</span>hinter dem Ende beider Zahlen sind,
dann&nbsp;fahre mit Aktion 3 fort.</span></li>
</ol><p><img style="width: 250px; height: 66px;" alt="" title="Beispiel einer schriftlichen Addition" src="addition_bsp.png"> (Nur ein Beispiel.)</p>
<p><a name="variablen"></a>Im gesamten
Algorithmus wird der
Ausf&uuml;hrer sich
diesmal wieder viel merken m&uuml;ssen. Diese bereits im letzten
kleinen Beispiel erw&auml;hnten Merkpl&auml;tze oder auch
Speicherpl&auml;tze nennt man <span style="font-weight: bold;">Variablen</span>.
Der kleine Unterschied zwischen den aus der
Mathematik bekannten Variablen ist, dass diese
regelm&auml;&szlig;ig im
Algorithmus immer wieder neu gesetzt werden k&ouml;nnen - in der
Mathematik wird eine Variable nur ein einziges mal eindeutig definiert.
Variablen in
Algorithmen sind eher zu vergleichen mit einer <span style="font-weight: bold;">Speicherstelle</span>, z.B.
einer Textdatei auf dem Computer oder einem Notizblock. Das
Entscheidende ist, dass diese Variablen einen Wert enthalten (den
sogenannten <span style="font-weight: bold;">Inhalt</span>)
und dass dieser Inhalt jederzeit <span style="font-weight: bold;">neu
geschrieben</span> werden kann (genauso wie der Inhalt einer
Textdatei entfernt und neu geschrieben werden kann), wobei
nat&uuml;rlich dann der alte Inhalt verloren geht. Man sagt dazu
auch, dass man einer Variable einen Wert zuweist oder die Variable
setzt.</p>
<p>Man beachte, dass dies eine zus&auml;tzliche Voraussetzung
an den Ausf&uuml;hrer darstellt, n&auml;mlich die
F&auml;higkeit, sich Daten zu merken/speichern. Wenn nicht anders
angegeben, kann man diese F&auml;higkeit als gegeben annehmen. In
gewissen F&auml;llen steht man aber manchmal vor dem Problem, einen
Algorithmus speziell f&uuml;r einen Ausf&uuml;hrer zu
entwerfen, der diese M&ouml;glichkeit nicht hat. Der Algorithmus in
obiger Form w&auml;re dann so nicht m&ouml;glich. So eine
seltsame Situation betrachten wir hier aber nicht.</p>
<p>Wenn man das Prinzip der Variablen verstanden hat, kann man
den Algorithmus auch etwas lesbarer so schreiben:</p>
<p>Nochmal die <span style="text-decoration: underline;">L&ouml;sung</span>:<br>
</p><ol> <li><span class="algo">F&uuml;hre
neue
Variable ein:&nbsp;</span><span class="algo var">Ziffernposition</span></li>
<li><span class="algo">F&uuml;hre neue
Variable ein: </span><span class="algo var">&Uuml;bertrag</span></li>
<li><span class="algo">F&uuml;hre neue
Variable ein: </span><span class="algo var">Summe</span></li> <li><span class="algo">Setze </span><span class="algo var">Ziffernposition</span><span class="algo"><span class="var">
</span>auf 1.</span></li> <li><span class="algo">Setze
</span><span class="algo var">&Uuml;bertrag</span><span class="algo"><span class="var">
</span>auf 0.</span></li> <li><span class="algo">Setze
</span><span class="algo var">Summe</span><span class="algo"><span class="var">
</span>auf (Ziffer an</span><span class="algo" style="font-style: italic;">
</span><span class="algo var">Ziffernposition</span><span class="algo" style="font-style: italic;"> </span><span class="algo">von
<span class="var">gegebener Zahl 1</span>) +&nbsp;(Ziffer
an</span><span class="algo" style="font-style: italic;">
</span><span class="algo var">Ziffernposition</span><span class="algo" style="font-style: italic;"> </span><span class="algo">von
<span class="var">gegebener Zahl 2</span>) + </span><span class="algo var">&Uuml;bertrag</span><span class="algo">.</span></li> <li><span class="algo">Setze die&nbsp;</span><span class="algo var">Ziffernposition</span><span class="algo">-te
Ziffer vom <span class="var">Ergebnis</span> auf die 1. Ziffer von </span><span class="algo var">Summe</span><span class="algo">.</span></li> <li><span class="algo">Setze </span><span class="algo var">&Uuml;bertrag</span><span class="algo">
auf&nbsp;die 2. Ziffer von </span><span class="algo var">Summe</span><span class="algo">.</span></li> <li><span class="algo">Setze </span><span class="algo var">Ziffernposition</span><span class="algo">
auf </span><span class="algo var">Ziffernposition</span><span class="algo">
+ 1.</span></li> <li><span class="algo">Wenn
(</span><span class="algo var">&Uuml;bertrag</span><span class="algo">
nicht 0 ist) oder
(</span><span class="algo var">Ziffernposition</span><span class="algo">
nicht hinter dem Ende beider Zahlen), dann (11.) fahre mit Aktion 6
fort.</span></li>
</ol><p>Die im Algorithmus benutzten Klammern dienen dabei
nur dem
Zweck, zu verdeutlichen, was zusammengeh&ouml;rt (wie in der
Mathematik) und nicht dem Zweck, etwas auszuklammern.</p>
<p><a name="parameter_und_rueckgabe"></a>In
einem Algorithmus, wo ein spezieller Wert als Ergebnis
erwartet wird (in diesem Fall die Summe) und evtl. spezielle Werte
vorgegeben werden (in diesem Fall die beiden Zahlen), sieht man diese
<span style="font-weight: bold;">vorgegebenen Werte</span>
(auch h&auml;ufig <span style="font-weight: bold;">Argumente</span>
oder <span style="font-weight: bold;">Parameter</span>
genannt) und das <span style="font-weight: bold;">Ergebnis</span>
(oder auch <span style="font-weight: bold;">R&uuml;ckgabewert</span>
genannt)
auch als Variablen an, um so die Notation einheitlicher zu halten.</p>
<p>Wir wollen den Algorithmus noch ein letztes Mal, noch ein
wenig lesbarer, formulieren. Hierzu ist es praktisch, eine
Kurzschreibweise f&uuml;r die <span class="var">i</span>-te
Ziffer von einer <span class="var">Zahl
</span>einzuf&uuml;gen. Wir wollen diesen Wert also im Folgenden schreiben
als <span class="var">Zahl[i]</span>.
Au&szlig;erdem wollen wir mit <span class="var">ZifferAnzahl(Zahl)</span>
die Zifferanzahl der <span class="var">Zahl</span><span class="var">
</span>bezeichnen. Das Setzen einer Variable k&uuml;rzen wir ab mit einem
Definitionszeichen. <span class="var">Zahl1</span>
und <span class="var">Zahl2</span><span style="font-style: italic;"> </span>seien
nun die beiden vorgegebenen Zahlen und <span class="var">Ergebnis</span> soll das
Ergebnis sein. Da es kein einfaches Zeichen f&uuml;r
Kleiner-oder-gleich gibt, verwenden wir hierf&uuml;r <span class="var">&lt;=</span>
(entsprechend <span class="var">&gt;=</span>) (weil es meistens genau so gemacht wird).</p>
<p>Und nochmal die <span style="text-decoration: underline;">L&ouml;sung</span>:<br>
</p><ol> <li><span class="algo">Neue
Variable: </span><span class="algo var">Position</span></li>
<li><span class="algo">Neue Variable: </span><span class="algo var">&Uuml;bertrag</span></li>
<li><span class="algo">Neue Variable: </span><span class="algo var">Summe</span></li>
<li><span class="algo"> </span><span class="algo var">Position</span><span class="algo"><span class="var">
</span>:= 1.</span></li> <li><span class="algo">
</span><span class="algo var">&Uuml;bertrag</span><span class="algo"><span class="var">
</span>:= 0.</span></li> <li><span class="algo">
</span><span class="algo var">Summe</span><span class="algo"><span class="var">
</span>:= </span><span class="algo var">Zahl1</span><span class="algo">[</span><span class="algo var">Position</span><span class="algo">]</span><span class="algo"></span><span class="algo">
+ </span><span class="algo var">Zahl2</span><span class="algo">[</span><span class="algo var">Position</span><span class="algo">]</span><span class="algo">
+ </span><span class="algo var">&Uuml;bertrag</span><span class="algo">.</span></li> <li><span class="algo"> </span><span class="algo var">Ergebnis</span><span class="algo">[</span><span class="algo var">Position</span><span class="algo">]</span><span class="algo">
:= </span><span class="algo var">Summe</span><span class="algo">[</span><span class="algo var">1</span><span class="algo">]</span><span class="algo">.</span></li> <li><span class="algo"> </span><span class="algo var">&Uuml;bertrag</span><span class="algo">
:=&nbsp;</span><span class="algo var">Summe</span><span class="algo">[</span><span class="algo var">2</span><span class="algo">]</span><span class="algo">.</span></li> <li><span class="algo"> </span><span class="algo var">Position</span><span class="algo"><span class="var">
</span>:= </span><span class="algo var">Position</span><span class="algo">
+ 1.</span></li> <li><span class="algo">Wenn
(nicht </span><span class="algo var">&Uuml;bertrag</span><span class="algo"><span class="var">
</span>= 0 ist) oder
(</span><span class="algo var">Position</span><span class="algo">
&lt;= </span><span class="algo">ZifferAnzahl(</span><span class="algo var">Zahl1</span><span class="algo">)</span><span class="algo">)
oder (</span><span class="algo var">Position</span> <span class="algo">&lt;=</span> <span class="algo">ZifferAnzahl(</span><span class="algo var">Zahl2</span><span class="algo">)</span><span class="algo">),
dann (11.) fahre mit Aktion 6 fort.</span></li>
</ol><p><img style="width: 400px; height: 169px;" alt="" title="Beispiel eines Zwischenschritt" src="addition_bsp_zwischenschritt.png"><br>(Ausf&uuml;hrung
des Befehls 7 und 8 rot markiert.)</p>
<p>Man bemerke, dass bei allen Angaben des Algorithmus, der
Algorithmus selbst sich nie ge&auml;ndert hat, sondern nur die
Form, wie er aufgeschrieben wurde. Genauso wie ein "Hallo" sich in die
meisten Sprachen dieser und anderer Welten &uuml;bersetzen
l&auml;sst und sich auf die verschiedensten Formen hinschreiben
oder symbolisieren l&auml;sst, aber immer das gleiche bedeutet.</p>
<p><a name="funktion"></a>Wir wollen diesen
Algorithmus '<span class="algo">Addierer</span>'
nennen.
Dieser Algorithmus ist von den 2 gegebenen Zahlen abh&auml;ngig und
liefert ein Ergebnis. Alle gegebenen Werte/Informationen nennt man die <span style="font-weight: bold;">Parameter</span>. Das
Ergebnis nennt man auch den <span style="font-weight: bold;">R&uuml;ckgabewert</span>.
Da durch diesen Algorithmus nun bekannt ist, wie man 2 Zahlen addiert,
k&ouml;nnen wir diese Technik nat&uuml;rlich in anderen
Algorithmen weiterverwenden. Als Kurzform schreibt man h&auml;ufig,
wenn man 2 Zahlen <span class="var">X</span>
und <span class="var">Y</span>
addieren will, <span class="var"><span class="algo">Addierer</span>(X,Y)</span>. Die Parameter werden dabei in den Klammern
hintereinander angegeben, bekommen so also eine Reihenfolge. Wir wollen
einfach mal den ersten Parameter als <span class="var">Zahl1</span> und den 2.
Parameter als <span class="var">Zahl2</span>
festlegen (wobei es bei der Addition nat&uuml;rlich keine Rolle
spielt). Es gilt also z.B.: <span class="var">5 = </span><span class="var"><span class="algo">Addierer</span>(</span><span class="var">2,3</span><span class="var">)</span>. Man
betrachtet h&auml;ufig Addierer nun auch als <span style="font-weight: bold;">Funktion</span>, denn wie
im Mathematischen Sinne einer Funktion bekommt man zu gewissen
Parametern einen R&uuml;ckgabewert.</p>
<p>Betrachten wir zur Verdeutlichung eine neue Aufgabe. In dieser
wollen wir diesen Addierer-Algorithmus als bekannt voraussetzen.
Au&szlig;erdem soll bekannt sein, wie man eine Zahl um 1 vermindert.</p>
<p><span style="text-decoration: underline;">Aufgabe</span>:<br>
<span class="aufgabe">Berechne das Ergebnis der
Multiplikation 2er Zahlen (wieder ganze,
nicht negative Zahlen) </span><span class="aufgabe" style="font-style: italic;">Zahl1</span><span class="aufgabe">
und </span><span class="aufgabe" style="font-style: italic;">Zahl2</span><span class="aufgabe">.</span></p>
<p><span style="text-decoration: underline;">L&ouml;sung
1</span> (grob formuliert):<span style="text-decoration: underline;"><br>
</span><span class="algo">Rechne </span><span class="algo var">Zahl2</span><span class="algo">
genau </span><span class="algo var">Zahl1</span><span class="algo">-mal
aufeinander (also </span><span class="algo var">Zahl2</span><span class="algo">
+ </span><span class="algo var">Zahl2</span><span class="algo"> + </span><span class="algo var">Zahl2</span><span class="algo"> ...).</span><span style="text-decoration: underline;"></span></p>
<p><span style="text-decoration: underline;">L&ouml;sung
1</span> (exakte Formulierung):<br>
<span class="algo">(1.) Neue Variable: </span><span class="algo var">Zwischenergebnis</span><br class="algo">
<span class="algo">(2.) Neue Variable: </span><span class="algo var">Rest</span><br class="algo">
<span class="algo">(3.) </span><span class="algo var">Zwischenergebnis</span><span class="algo"><span class="var">
</span>:= 0</span><br class="algo">
<span class="algo">(4.) </span><span class="algo var">Rest</span><span class="algo"><span class="var">
</span>:= </span><span class="algo var">Zahl1</span><br class="algo">
<span class="algo" style="font-weight: bold;">Wiederhole</span><span class="algo">
folgende Befehle, </span><span class="algo" style="font-weight: bold;">wenn</span><span class="algo">
nicht </span><span class="algo var">Rest</span><span class="algo"><span class="var">
</span>= 0 ist:</span><br class="algo">
<span class="algo">&nbsp;&nbsp;&nbsp; (5.) </span><span class="algo var">Zwischenergebnis</span><span class="algo"><span class="var"> </span>:=
</span><span class="algo"><span class="algo">Addierer</span></span><span class="algo">(</span><span class="algo var">Zwischenergebnis</span><span class="algo">,&nbsp;</span><span class="algo var">Zahl2</span><span class="algo">)</span><br class="algo">
<span class="algo">&nbsp;&nbsp;&nbsp; (6.) </span><span class="algo var">Rest</span><span class="algo"><span class="var"> </span>:= </span><span class="algo var">Rest</span><span class="algo"><span class="var"> </span>- 1</span><br class="algo">
<span class="algo">Ende der zu wiederholenden Befehle</span><br class="algo">
<span class="algo">(7.) </span><span class="algo var">Ergebnis</span><span class="algo"><span class="var">
</span>:= </span><span class="algo var">Zwischenergebnis</span></p>
<p>Die Schleife wurde diesmal wieder ein wenig anders
geschrieben. Gemeint ist, dass alle Befehle innerhalb der Schleife
immer zusammen einmal hintereinander ausgef&uuml;hrt werden sollen
und danach erneut die &Uuml;berpr&uuml;fung der Bedingung der
Schleife (nicht <span style="font-style: italic;">Rest</span>
= 0) durchgef&uuml;hrt werden soll und falls diese
&Uuml;berpr&uuml;fung negativ ausf&auml;llt (wenn <span style="font-style: italic;">Rest</span> = 0 ist), dann
sollen die Befehle innerhalb der Schleife nicht noch ein weiteres Mal
ausgef&uuml;hrt werden, sondern damit ist die Schleife
abgeschlossen (und evtl. Befehle hinter der Schleife sollen nun
ausgef&uuml;hrt werden).</p>
<p>Man k&ouml;nnte mit Hilfe von bedingten Spr&uuml;ngen
die L&ouml;sung 1 auch &auml;quivalent so formulieren:</p>
<p><span style="text-decoration: underline;">L&ouml;sung
1</span>:<br>
</p><ol> <li><span class="algo">Neue
Variable: </span><span class="algo var">Zwischenergebnis</span></li>
<li><span class="algo">Neue Variable: </span><span class="algo var">Rest</span></li>
<li><span class="algo"> </span><span class="algo var">Zwischenergebnis</span><span class="algo"><span class="var">
</span>:= 0</span></li> <li><span class="algo">
</span><span class="algo var">Rest</span><span class="algo"><span class="var">
</span>:= </span><span class="algo var">Zahl1</span></li> <li><span class="algo">Wenn </span><span class="algo var">Rest</span><span class="algo"><span class="var">
</span>= 0 ist, fahre mit Befehl 9 fort.</span></li> <li><span class="algo"></span><span class="algo var">Zwischenergebnis</span><span class="algo"> :=
Addierer(</span><span class="algo var">Zwischenergebnis</span><span class="algo">,&nbsp;</span><span class="algo var">Zahl2</span><span class="algo">)</span></li> <li><span class="algo"> </span><span class="algo var">Rest</span><span class="algo">
:= </span><span class="algo var">Rest</span><span class="algo"> - 1</span></li> <li><span class="algo">Fahre nun mit Befehl 5 fort.</span></li>
<li><span class="algo"></span><span class="algo var">Ergebnis</span><span class="algo"><span class="var">
</span>:= </span><span class="algo var">Zwischenergebnis</span></li>
</ol><p><span style="font-style: italic;"></span>Im
Endeffekt ist aber nat&uuml;rlich die bessere Lesbarkeit zu
Empfehlen, die nat&uuml;rlich in der 'Wiederhole, wenn
...'-Variante mehr gegeben ist. Allgemein sind Spr&uuml;nge
irgenwelcher Art etwas verp&ouml;hnt unter Programmierern, denn
wenn man gleich 2 oder mehr Spr&uuml;nge in einem Algorithmus hat,
welche hin und her und durcheinander irgendwo hin springen, ist
f&uuml;r einen Leser h&auml;ufig nur schwer nachzuvollziehen,
was genau der Algorithmus eigentlich tun soll.</p>
<p>Noch einmal zu der Nutzung des anderen Algorithmus' innerhalb
diesem: Ein Algorithmus ist genau dann klar und eindeutig definiert,
wenn ein Ausf&uuml;hrer zu jedem Schritt genau wei&szlig;,
welcher Schritt als n&auml;chstes ausgef&uuml;hrt werden soll.
An der Stelle, wo nun der andere Algorithmus erw&auml;hnt und
benutzt wird, was genau hat der Ausf&uuml;hrer also
verst&auml;ndlicherweise zu tun? Er arbeitet nun nat&uuml;rlich
aus dem anderen Algorithmus die einzelnen Schritte ab, bis er das
Ergebnis ermittelt hat und kehrt dann wieder zur&uuml;ck (in dem
Fall kann dann damit nun die Variable <span class="var">Zwischenergebnis</span>
gesetzt werden).<br>
Dies ist nicht ungew&ouml;hnlich und entspricht genau dem
wirklichen
Leben. Wenn ich z.B. eine Maschine baue, die meine TV-Fernbedienung
benutzt, um den Fernseher auszuschalten und nun diese Maschiene starte
(meine Aktion), ist die Funktion der Fernbedienung exakt die gleiche,
wie wenn ich sie direkt benutzt h&auml;tte.</p>
<p>Wenn man sich diesen Algorithmus jetzt so mal betrachtet und
zum
Spa&szlig; ihn mal mit 2 Zahlen ausprobiert, sieht man gleich, dass
man
bei diesem Algorithmus bei etwas gr&ouml;&szlig;eren Zahlen
(vor allem
bei einer gro&szlig;en <span class="var">Zahl1</span>,
wenn wir die Addierer-T&auml;tigkeit mal als relativ gering
einsch&auml;tzen f&uuml;r alle Zahlen) ziemlich lange braucht.
Wenn man
so etwas feststellt, ist das ein Hinweis darauf, dass der Algorithmus
evtl. nicht optimal ist. Es stellt sich nat&uuml;rlich immer die
Frage,
ob es &uuml;berhaupt einen besseren Algorithmus gibt oder ob man
bereits den bestm&ouml;glichen hat. Diese Frage kann in
komplizierten
F&auml;llen sehr schwierig zu beantworten sein.</p>
<p>Wenn man diesen Algorithmus genauer auf seine <span style="font-weight: bold;">Geschwindigkeit</span>
hin
untersuchen will, versucht man eine ungef&auml;hre Formel
f&uuml;r die
Anzahl der Aktionen in Abh&auml;ngigkeit der Parameter (also der
Eingaben, d.h. der vorgegebenen Zahlen) zu
ermitteln.
Hierbei muss man sich nat&uuml;rlich darauf festlegen, was als eine
Aktion betrachtet werden soll (also in diesem Fall: soll die
Addierer-Benutzung in Befehl 6 die einzelnen Schritte des
Addierer-Algorithmus mitz&auml;hlen oder selbst nur ein Befehl
darstellen?). Wir wollen hier alle Befehle, so wie sie sind, nur
jeweils als eine Aktion betrachten, also den Aufwand der
Addier-T&auml;tigkeit vernachl&auml;ssigen (wenn man davon
ausgeht,
dass der Algorithmus von einem Computer ausgef&uuml;hrt wird, kann
man
auch durchaus davon ausgehen, dass das Addieren auf Prozessorebene nur
einen Befehl kostet). Man kommt zu dem Ergebnis, dass die Befehle 5, 6,
7 und 8 genau <span class="var">Zahl1</span>-mal
ausgef&uuml;hrt werden. Sonst hat man noch 5 Befehle, die
&uuml;berhaupt nur einmal ausgef&uuml;hrt werden
m&uuml;ssen. Insgesamt
hat man also 4*<span class="var">Zahl1</span>+5
auszuf&uuml;hrende Befehle. Da diese Formel&nbsp;linear von der
Eingabe (nur <span class="var">Zahl1</span>
in diesem Fall) abh&auml;ngt, sagt man auch, der Algorithmus liegt
in der linearen <span style="font-weight: bold;">Komplexit&auml;tsklasse</span>&nbsp;(der
h&ouml;chste Grad der Formel entscheidet dar&uuml;ber, denn der
h&ouml;chste Grad ist nat&uuml;rlich bei
gr&ouml;&szlig;eren Zahlen
immer domminierend).</p>
<p>Wie kann man den Algorithmus verbessern? Eine
M&ouml;glichkeit w&auml;re, falls <span class="var">Zahl1</span> &gt; <span class="var">Zahl2</span>,
diese beiden zu vertauschen, denn so sind dann weniger Befehle
auszuf&uuml;hren. Sind aber beide Zahlen gro&szlig;, hilft das
nicht so
viel. Eine andere M&ouml;glichkeit hat man bereits in der
Grundschule
in der 3. Klasse unter dem Namen "schriftlich Multiplizieren" gelernt.
Hier eine M&ouml;glichkeit, diesen Algorithmus zu formulieren:</p>
<p><span style="text-decoration: underline;">L&ouml;sung
2</span>:<br>
<span class="algo">Neue Variablen: </span><span class="algo var">Teil</span><span class="algo">[</span><span class="algo">1</span><span class="algo">]</span><span class="algo">, </span><span class="algo var">Teil</span><span class="algo">[</span><span class="algo">2</span><span class="algo">]</span><span class="algo"> ... bis </span><span class="algo var">Teil</span><span class="algo">[</span><span class="algo">ZifferAnzahl(Zahl2)</span><span class="algo">]</span><br class="algo">
<span class="algo">Neue Variable: </span><span class="algo var">Zwischenergebnis</span><br class="algo">
<span class="algo">Neue Variable: </span><span class="algo var">Position</span><br class="algo">
<span class="algo">F&uuml;r </span><span class="algo var">Position</span><span class="algo"><span class="var"> </span>:= 1 bis ZifferAnzahl(</span><span class="algo var">Zahl2</span><span class="algo">), tue:</span><br class="algo">
<span class="algo">&nbsp;&nbsp;&nbsp; (*1)
&nbsp;&nbsp; </span><span class="algo var">Teil</span><span class="algo">[</span><span class="algo var">Position</span><span class="algo">]</span><span class="algo"> := </span><span class="algo var">Zahl2</span><span class="algo">[</span><span class="algo var">Position</span><span class="algo">]</span><span class="algo"> * </span><span class="algo var">Zahl1</span><br class="algo">
<span class="algo"><span class="var">Zwischenergebnis</span> := 0</span><br class="algo">
<span class="algo">F&uuml;r </span><span class="algo var">Position</span><span class="algo"><span class="var"> </span>:= 1 bis ZifferAnzahl(</span><span class="algo var">Zahl2</span><span class="algo">), tue:</span><br class="algo">
<span class="algo">&nbsp;&nbsp;&nbsp; (*2)
&nbsp;&nbsp; </span><span class="algo var">Zwischenergebnis</span><span class="algo"><span class="var"> </span>:= </span><span class="algo var">Zwischenergebnis</span><span class="algo"><span class="var"> </span>+ </span><span class="algo var">Teil</span><span class="algo">[</span><span class="algo var">Position</span><span class="algo">]</span><span class="algo"> * 10^(</span><span class="algo var">Position</span><span class="algo">-1)</span><br class="algo">
<span class="algo var">Ergebnis</span><span class="algo"><span class="var"> </span>:= </span><span class="algo var">Zwischenergebnis</span></p>
<p>'F&uuml;r <span style="font-style: italic;">Position</span>
:= <span style="font-style: italic;">Start</span>
bis <span style="font-style: italic;">Ende</span>,
tue <span style="font-style: italic;">Aktion</span>'
soll bedeuten, dass wir <span style="font-style: italic;">Position</span>
als erstes auf <span style="font-style: italic;">Start</span>
setzen, dann die <span style="font-style: italic;">Aktion</span>
ausf&uuml;hren, danach <span style="font-style: italic;">Position</span>
um eins erh&ouml;hen, erneut die Aktion ausf&uuml;hren und dies
solange wiederholen, bis <span style="font-style: italic;">Position</span>
bei <span style="font-style: italic;">Ende</span>
angelangt ist, wof&uuml;r wir dann ein letztes Mal die Aktion
ausf&uuml;hren (insgesamt sind das <span style="font-style: italic;">Ziel</span> - <span style="font-style: italic;">Start</span> + 1
Ausf&uuml;hrungen von Aktion; falls <span style="font-style: italic;">Start</span> &gt; <span style="font-style: italic;">Ziel</span> ist, wollen
wir die Aktion gar nicht ausf&uuml;hren).</p>
<p>Wir wollen in (*1) die Multiplikation mal als primitiv
voraussetzen
(man k&ouml;nnte hierf&uuml;r beispielsweise den in
L&ouml;sung 1
angegebenen Algorithmus verwenden, denn <span style="font-style: italic;">Zahl2[Position]</span> ist
nur eine Ziffer, also eine Zahl von 0-9, so dass auch L&ouml;sung 1
hierf&uuml;r schnell sein sollte). In (*2) soll 10^<span style="font-style: italic;">k</span> f&uuml;r "10
hoch <span style="font-style: italic;">k</span>"
stehen. Die Multiplikation mit der 10er-Potenz bedeutet nur das
Anh&auml;ngen von Nullen an der rechten Seite der Zahl, kann also
auch
als primitiv angesehen werden.</p>
<p><a name="array"></a>Nachdem hoffentlich
klar geworden ist, dass dies exakt dem
entspricht, was man bei einer schriftlichen Multiplikation tut (<span style="font-style: italic;">Teil[</span>1<span style="font-style: italic;">]</span>, <span style="font-style: italic;">Teil[</span>2<span style="font-style: italic;">]</span> ... bis <span style="font-style: italic;">Teil[</span>ZifferAnzahl(<span style="font-style: italic;">Zahl2</span>)<span style="font-style: italic;">] </span>sind dabei die
untereinander hingeschriebenen Teilergebnisse, die man hinterher alle
zusammenaddiert),
die man aus der Grundschule kennt, wollen wir den Algorithmus etwas
verbessern. St&ouml;rend in ihm ist die ganze Reihe von Variablen (<span style="font-style: italic;">Teil[</span>1<span style="font-style: italic;">]</span>, <span style="font-style: italic;">Teil[</span>2<span style="font-style: italic;">]</span> ... bis <span style="font-style: italic;">Teil[</span>ZifferAnzahl(<span style="font-style: italic;">Zahl2</span>)<span style="font-style: italic;">]</span>),
denn hierf&uuml;r muss der Ausf&uuml;hrer eine ganze Menge von
Informationen sich merken (ein Mensch bei Verwendung eines Blatt
Papiers f&uuml;r die Ausf&uuml;hrung hat nat&uuml;rlich den
Speicherplatz dort zu Verf&uuml;gung; trotzdem w&auml;re es
nicht
n&ouml;tig und wenn er alles im Kopf machen w&uuml;rde,
h&auml;tte er
auch dabei Probleme). Man nennt diese Reihe von Variablen
&uuml;brigens
auch <span style="font-weight: bold;">Array</span>.
In anderen
F&auml;llen von anderen Problemstellungen kommt man nicht drum
herum,
so ein Array zu benutzen. Hier jedoch geht es einfacher:</p>
<p>bessere <span style="text-decoration: underline;">L&ouml;sung
2</span>:<br>
<span class="algo">Neue Variable: </span><span class="algo var">Teilmultiplikation</span><span class="algo" style="font-style: italic;"></span><br class="algo">
<span class="algo">Neue Variable: </span><span class="algo var">Zwischenergebnis</span><br class="algo">
<span class="algo">Neue Variable: </span><span class="algo var">Position</span><span class="algo" style="font-style: italic;"><br>
</span><span class="algo var">Zwischenergebnis</span><span class="algo"><span class="var"> </span>:= 0</span><br class="algo">
<span class="algo">F&uuml;r </span><span class="algo var">Position</span><span class="algo"><span class="var"> </span>:= 1 bis ZifferAnzahl(</span><span class="algo var">Zahl2</span><span class="algo">), tue:</span><br class="algo">
<span class="algo">&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="algo" style="font-style: italic;"></span><span class="algo var">Teilmultiplikation</span><span class="algo" style="font-style: italic;"></span><span class="algo"> := </span><span class="algo var">Zahl2</span><span class="algo">[</span><span class="algo var">Position</span><span class="algo">]</span><span class="algo"> * </span><span class="algo var">Zahl1</span><span class="algo" style="font-style: italic;"><br>
</span><span class="algo">&nbsp;&nbsp;&nbsp;
</span><span class="algo var">Teilmultiplikation</span><span class="algo" style="font-style: italic;">
:= </span><span class="algo var"></span><span class="algo var">Teilmultiplikation</span><span class="algo" style="font-style: italic;"> </span><span class="algo">* 10^(</span><span class="algo var">Position</span><span class="algo">-1)</span><br class="algo">
<span class="algo">&nbsp;&nbsp;&nbsp; </span><span class="algo var">Zwischenergebnis</span><span class="algo"><span class="var"> </span>:= </span><span class="algo var">Zwischenergebnis</span><span class="algo"><span class="var"> </span>+ </span><span class="algo var">Teilmultiplikation</span><br class="algo">
<span class="algo var">Ergebnis</span><span class="algo"><span class="var"> </span>:= </span><span class="algo var">Zwischenergebnis</span></p>
<p>Nun noch ein etwas anderes, sehr wichtiges Beispiel.</p>
<p><span style="text-decoration: underline;">Aufgabe</span>:<br>
<span class="aufgabe">Man bekommt ein <span style="font-style: italic;">Kartenblatt</span>
(Anzahl der Karten soll hier nicht weiter festgelegt sein) und soll
dieses Sortieren, wobei am Anfang die kleinste Karte stehen soll und am
Ende die Gr&ouml;&szlig;te. Wir wollen dabei keine Farben
unterscheiden. Wir wollen folgende Reihenfolge (niedrigste Karte bis
h&ouml;chste Karte): Ass, 2, 3, 4, 5, 6, 7, 8, 9, 10, Bube, Dame,
K&ouml;nig, Joker. Wir wollen <span style="font-style: italic;">Karte1</span>
&lt; <span style="font-style: italic;">Karte2</span>
schreiben, wenn <span style="font-style: italic;">Karte1</span>
niedriger ist. Wir k&ouml;nnen zur Vereinfachung dem Ass den
Zahlenwert
1 geben und Bube, Dame, K&ouml;nig, Joker entsprechend die Werte
11,
12, 13, 14. Wir betrachten also vereinfacht jede Karte als Zahl von
1-14.</span></p>
<p>Falls euch das verwirrend sollte, warum Ass am niedrigsten
ist: Das
soll ein Beispiel sein und ist v&ouml;llig absolut egal und
irrelevant
hier und jetzt! Au&szlig;erdem kann jeder selbst entscheiden, wie
er
gerne seine Karten sortieren will.</p>
<p>Macht euch als erstes einmal bewusst, dass ihr in der Lage
sein
solltet, diese Aufgabe zu l&ouml;sen (oder habt ihr noch nie Karten
gespielt?). Bei der &Uuml;berlegung, wie ein Algorithmus aussehen
k&ouml;nnte, &uuml;berlegt einfach, wie ihr selbst denn nun die
Karten
sortieren w&uuml;rdet. Die Schwierigkeit liegt nun dadrin, das, was
ihr
sonst immer so total unbewusst und automatisch immer wieder selbst
macht, in Worte zu fassen. Ihr solltet an dieser Stelle vielleicht auch
wirklich einmal versuchen, es selbst zu &uuml;berlegen und auch
aufzuschreiben (hierbei immer darauf achten: jeder einzelne Schritt
muss exakt sein und es muss immer eindeutig sein, welcher Befehl als
n&auml;chstes kommt).</p>
<p>Hier nun eine der vielen m&ouml;glichen
M&ouml;glichkeiten:</p>
<p><span style="text-decoration: underline;">L&ouml;sung
1</span> (Insertion-Sort auch genannt) grob formuliert:<br>
<span class="algo">Man nehme sich eine Karte und lege sie
in einen
neuen Stapel. Jede weitere Karte ist an die richtige Stelle im neuen
Stapel zu legen, d.h. man geht den neuen Stapel von Anfang an durch und
bei der ersten Position, wo die n&auml;chste Karte eine
gr&ouml;&szlig;ere ist, legt man die ausgew&auml;hlte Karte
hinein.
Dies wiederholt man, bis der urspr&uuml;ngliche Stapel keine Karten
mehr enth&auml;lt. Der neue Stapel enth&auml;lt nun alle Karten
in
sortierter Reihenfolge, also das gew&uuml;nschte Ergebnis.</span></p>
<p><span style="text-decoration: underline;">L&ouml;sung
1</span> exakt:<br>
<span class="algo">Neue Variable: <span class="var">Position</span></span><br class="algo">
<span class="algo">Neue Variable: <span class="var">Karte</span></span><br>
<span class="algo">Erstelle einen neuen (anfangs leeren)
Stapel, nenne ihn <span class="var">neuerStapel</span>.</span><br class="algo">
<span class="algo">Wiederhole folgendes, solange noch
Karten im <span class="var">Kartenblatt
</span>sind:</span><br class="algo">
<span class="algo">&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp; Nehme die erste <span class="var">Karte </span>aus dem <span class="var">Kartenblatt </span>heraus.</span><br class="algo">
<span class="algo">&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp; F&uuml;r <span class="var">Position </span>:= 1 bis
(Anzahl Karten in <span class="var">neuerStapel</span>),
tue:</span><br class="algo">
<span class="algo">&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp; Wenn <span class="var">neuerStapel</span></span><span class="algo">[</span><span class="algo"><span class="var">Position</span></span><span class="algo">]</span><span class="algo"> &gt; <span class="var">Karte</span> ist,
h&ouml;re mit dieser Schleife vorzeitig auf.</span><br class="algo">
<span class="algo">&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp; Ende der "F&uuml;r"-Schleife.</span><br class="algo">
<span class="algo">&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp; F&uuml;ge Karte in <span class="var">neuerStapel</span> an <span class="var">Position</span> ein
(zwischen <span class="var">Position</span>-1
und <span class="var">Position</span>).</span><br class="algo">
<span class="algo">Ende der "Wiederholen"-Schleife.</span><br class="algo">
<span class="algo"><span class="var">neuerStapel
</span>ist nun das <span class="var">Ergebnis</span>.</span></p>
<p>Wir wollen den Algorithmus noch etwas vereinfacht
aufschreiben. Es
bietet sich hier an, gleich eine ganze Reihe von Kurzschreibweisen
einzuf&uuml;hren. Wir wollen sowohl Kartenblatt als auch
neuerStapel
als eine Liste auffassen. Jeder Eintrag besitzt daher eine Position in
der Liste und eine Liste besitzt gew&ouml;hnlich auch eine
L&auml;nge,
d.h. eine Anzahl von Eintr&auml;gen (wir wollen ersteinmal keine
unendlichen Listen (wie z.B. die Liste aller positiven, ganzen Zahlen
1,2,3,...) betrachten).</p>
<p><a name="verweis_od_kopie"></a>Wenn wir nun
schreiben w&uuml;rden:<br>
&nbsp;&nbsp;&nbsp; <span class="algo var">Karte</span><span class="algo"> := </span><span class="algo var">Kartenblatt</span><span class="algo">[</span><span class="algo var">Position</span><span class="algo">]</span><br>
Dann stellt sich die Frage, ob das nun ein Rausnehmen aus dem <span style="font-style: italic;">Kartenblatt</span>
bedeuten soll oder aber, dass die <span style="font-style: italic;">Karte</span>
sich noch im <span style="font-style: italic;">Kartenblatt</span>
befindet und die Variable <span style="font-style: italic;">Karte</span>
nur ein <span style="font-weight: bold;">Verweis</span>
oder vielleicht auch eine <span style="font-weight: bold;">Kopie</span>
auf den Eintrag im <span style="font-style: italic;">Kartenblatt</span>.
Wir wollen uns darauf festlegen, dass in so einem Fall die Liste
niemals ge&auml;ndert wird (es w&uuml;rden an vielen anderen
Stellen,
wenn man sich auch mal die vorherigen Algorithmen betrachtet, sonst
Verwirrungen entstehen).</p>
<p>Es stellt sich immer noch die Frage, ob <span style="font-style: italic;">Karte</span> nun eine
Kopie der Karte im <span style="font-style: italic;">Kartenblatt</span>
ist oder nur ein Verweis auf diese Karte im <span style="font-style: italic;">Kartenblatt</span>
(in diesem Beispiel ist es f&uuml;r einen Mensch als
Ausf&uuml;hrer
nat&uuml;rlich nicht so leicht, die Karte eben mal zu kopieren;
wenn es
aber um ganz normale Zahlen geht, was wir ja vereinfacht angenommen
haben, ist dies nat&uuml;rlich m&ouml;glich).</p>
<p>Eine Kopie und ein Verweis (manchmal auch <span style="font-weight: bold;">Referenz</span> genannt)
ist aber nat&uuml;rlich etwas
unterschiedliches. Wenn man z.B. auf <span style="font-style: italic;">Karte</span> nun "Hallo"
oben links in die Ecke schreibt und es sich um eine Kopie gehandelt
hat, dann hat sich bei der Originalkarte im <span style="font-style: italic;">Kartenblatt</span> nichts
ge&auml;ndert. Wenn aber die Variable <span style="font-style: italic;">Karte</span> nur ein
Verweis auf die Karte im <span style="font-style: italic;">Kartenblatt</span>
war und nun auf <span style="font-style: italic;">Karte</span>
"Hallo" geschrieben wurde, ist damit die Karte im <span style="font-style: italic;">Kartenblatt</span>
beschrieben worden.</p>
<p>In manchen F&auml;llen kann es nun gew&uuml;nscht
sein, dass es sich
um einen Verweis handelt, in manchen anderen F&auml;llen ist es
eher
erw&uuml;nscht, dass man immer mit Kopien handelt. Man kann dies
nat&uuml;rlich immer an jeder Stelle explizit angeben, was gemeint
ist.
Man hat sich zus&auml;tzlich aber darauf geeinigt, dass man bei
primitiven Variablenwerten immer implizit eine Kopie meint (wenn nicht
anders angegeben) und im Falle von komplexeren Objekten meint man ein
Verweis. Primitive Typen sind z.B. Zahlen und k&uuml;rzere
Texte/Buchstabenfolgen. Komplexere Typen sind z.B. ganze Listen oder
andere Objekte, die gleich mehrere Sachen enthalten.</p>
<p><span style="text-decoration: underline;">Beispiel
1</span> (implizite Kopie):<br>
<span class="algo">Neue Variablen vom Typ Zahl: </span><span class="algo var">Zahl1</span><span class="algo">, </span><span class="algo var">Zahl2</span><br class="algo">
<span class="algo var">Zahl1</span><span class="algo"><span class="var"> </span>:= 10</span><br class="algo">
<span class="algo var">Zahl2</span><span class="algo"><span class="var"> </span>:= </span><span class="algo var">Zahl1</span><br class="algo">
<span class="algo var">Zahl2</span><span class="algo"><span class="var"> </span>:= 5</span><br class="algo">
<span class="algo var">Ergebnis</span><span class="algo"><span class="var"> </span>:= </span><span class="algo var">Zahl1</span></p>
<p>Das <span style="font-style: italic;">Ergebnis</span>
ist nun 10, da bei der &Auml;nderung von <span style="font-style: italic;">Zahl2</span> die <span style="font-style: italic;">Zahl1</span> nicht
ge&auml;ndert wurde, denn <span style="font-style: italic;">Zahl2</span>
war nur eine Kopie von <span style="font-style: italic;">Zahl1</span>,
stand mit ihr also in keinem Zusammenhang nach der Kopie.</p>
<p><span style="text-decoration: underline;">Beispiel
2</span> (impliziter Verweis):<br>
<span class="algo">Neue Variablen vom Typ Liste: </span><span class="algo var">Liste1</span><span class="algo">, </span><span class="algo var">Liste2</span><br class="algo">
<span class="algo var">Liste1</span><span class="algo"><span class="var"> </span>und </span><span class="algo var">Liste2</span><span class="algo"><span class="var"> </span>sollen erstmal leer sein.</span><br class="algo">
<span class="algo">F&uuml;ge die Zahl 5 in </span><span class="algo var">Liste1</span><span class="algo"> am Ende hinzu.</span><br class="algo">
<span class="algo">F&uuml;ge die Zahl 3 in </span><span class="algo var">Liste1</span><span class="algo"> am Ende hinzu.</span><br class="algo">
<span class="algo var">Liste2</span><span class="algo"> := </span><span class="algo var">Liste1</span><br class="algo">
<span class="algo">F&uuml;ge die Zahl 42 in </span><span class="algo var">Liste2</span><span class="algo"> am Ende hinzu.</span><br class="algo">
<span class="algo var">Ergebnis</span><span class="algo"> := </span><span class="algo var">Liste1</span></p>
<p>Das <span style="font-style: italic;">Ergebnis</span>
ist nun die Liste, die aus 5, 3 und 42 besteht.</p>
<p>Falls eine Kopie allerdings erw&uuml;nscht war,
k&ouml;nnte man es z.B. folgenderma&szlig;en aufschreiben:</p>
<p><span style="text-decoration: underline;">Beispiel
3</span> (explizite Kopie):<br>
<span class="algo">Neue Variablen vom Typ Liste: </span><span class="algo var">Liste1</span><span class="algo">, </span><span class="algo var">Liste2</span><br class="algo">
<span class="algo var">Liste1</span><span class="algo"><span class="var"> </span>und </span><span class="algo var">Liste2</span><span class="algo"><span class="var"> </span>sollen erstmal leer sein.</span><br class="algo">
<span class="algo">F&uuml;ge die Zahl 5 in </span><span class="algo var">Liste1</span><span class="algo"><span class="var"> </span>am Ende hinzu.</span><br class="algo">
<span class="algo">F&uuml;ge die Zahl 3 in </span><span class="algo var">Liste1</span><span class="algo"><span class="var"> </span>am Ende hinzu.</span><br class="algo">
<span class="algo var">Liste2</span><span class="algo"><span class="var"> </span>:= </span><span class="algo">Copy(<span class="var">Liste1</span>)</span><br class="algo">
<span class="algo">F&uuml;ge die Zahl 42 in </span><span class="algo var">Liste2</span><span class="algo"><span class="var"> </span>am Ende hinzu.</span><br class="algo">
<span class="algo var">Ergebnis</span><span class="algo"><span class="var"> </span>:= </span><span class="algo var">Liste1</span></p>
<p>Das <span style="font-style: italic;">Ergebnis</span>
ist nun die Liste, die aus 5 und 3 besteht.</p>
<p>Zur&uuml;ck zu dem urspr&uuml;nglichen Beispiel: Da
wir uns darauf
festgelegt haben, dass Zahlen implizit kopiert werden sollen und wir
die Karten als Zahlen darstellen wollten, liegen hier also Kopien vor.
Dies soll uns aber nicht weiter st&ouml;ren. Nach dem Befehl:<br>
&nbsp;&nbsp;&nbsp; <span class="algo var">Karte</span><span class="algo"> := </span><span class="algo var">Kartenblatt</span><span class="algo">[1]</span><br>
Ist es allerdings noch notwendig, die erste Karte aus dem <span style="font-style: italic;">Kartenblatt</span> zu
entfernen. Wir wollen hierzu eine Art Funktion einf&uuml;hren
(&uuml;bliche Schreibweise, zus&auml;tzliche Methoden als
Funktionen anzusehen), die wir <span style="font-style: italic;">Delete</span>
nennen wollen, wobei <span style="font-style: italic;">Delete</span>(<span style="font-style: italic;">Liste, i</span>) die <span style="font-style: italic;">i</span>-te Stelle der <span style="font-style: italic;">Liste </span>l&ouml;schen
soll. Wie bereits fr&uuml;her wollen wir mit <span style="font-style: italic;">Length</span>(<span style="font-style: italic;">Liste</span>) die Anzahl
der Eintr&auml;ge in der <span style="font-style: italic;">Liste</span>
bezeichnen. Wir wollen au&szlig;erdem mit der Funktion <span style="font-style: italic;">Add</span>(<span style="font-style: italic;">Liste</span>, <span style="font-style: italic;">i</span>, <span style="font-style: italic;">Eintrag</span>) das
Hinzuf&uuml;gen von <span style="font-style: italic;">Eintrag</span>
an der <span style="font-style: italic;">i</span>-ten
Stelle (d.h. zwischen dem <span style="font-style: italic;">i</span>-1-ten
und dem <span style="font-style: italic;">i</span>-ten
Eintrag) in der <span style="font-style: italic;">Liste</span>
bezeichnen. Legen wir uns im Folgenden nun auch darauf fest, dass neue
Variablen f&uuml;r Zahlen anfangs automatisch mit 0 initialisiert
werden sollen und Listen am Anfang nach der Einf&uuml;hrung leer
sein
sollen (um nicht immer wieder schreiben zu m&uuml;ssen, dass die
Liste
am Anfang leer sein soll).</p>
<p>Wir k&ouml;nnen den Algorithmus mit diesen neuen
Schreibweisen und Festlegungen nun noch ein wenig exakter so
formulieren:</p>
<p><span style="text-decoration: underline;">L&ouml;sung
1</span> exakt:<br>
<span class="algo">Neue Variable vom Typ Zahl: <span class="var">Position</span></span><br class="algo">
<span class="algo">Neue Variable vom Typ Zahl: <span class="var">Karte</span><br>
Neue Variable vom Typ Liste: <span class="var">neuerStapel</span></span><span style="font-style: italic;" class="algo"></span><br class="algo">
<span class="algo">Wiederhole folgendes, solange Length(<span class="var">Kartenblatt</span>)
&gt; 0 ist:</span><br class="algo">
<span class="algo">&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp; <span style="font-style: italic;">&nbsp;</span><span class="var">Karte
</span>:= <span class="var">Kartenblatt</span>[1]<br>
&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;Delete(<span class="var">Kartenblatt</span>, 1)
&nbsp; &nbsp;&nbsp;&nbsp; </span><br class="algo">
<span class="algo">&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp; F&uuml;r <span class="var">Position </span>:= 1 bis
Length(<span class="var">neuerStapel</span>),
tue:</span><br class="algo">
<span class="algo">&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp; Wenn <span class="var">neuerStapel</span>[<span class="var">Position</span>] &gt; <span class="var">Karte</span> ist,
h&ouml;re mit dieser Schleife vorzeitig auf.</span><br class="algo">
<span class="algo">&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp; Ende der "F&uuml;r"-Schleife.<br>
</span>&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp; <span class="algo">Add(<span class="var">neuerStapel</span>, <span class="var">Position</span>, <span class="var">Karte</span>)</span><br class="algo">
<span class="algo">Ende der "Wiederholen"-Schleife.</span><br class="algo">
<span class="algo"><span class="var">Ergebnis</span>
:= </span><span class="algo var">neuerStapel</span></p>
<p><a name="vartyp"></a>Etwas stillschweigend
haben wir hier und auch schon bereits in
den
vorherigen kleineren Beispielen f&uuml;r Variablen spezielle <span style="font-weight: bold;">Typen</span>
mitangegeben. Dies war in den allerersten einfachen Beispielen noch
nicht notwendig, da sowieso im ganzen Algorithmus nur ein Typ verwendet
wurde. Durch solche neuen Fragen wie die Kopie oder dem Verweis und
auch durch solche Funktionen wie Length, Delete und Add und die
Schreibweise <span style="font-style: italic;">Liste</span>[<span style="font-style: italic;">i</span>]
ist es aber sinnvoll, einen Typ im Vorhinein mit anzugeben, da sonst
Verwirrungen und Unklarheiten auftreten k&ouml;nnten (was z.B. soll
bedeuten: Delete(<span style="font-style: italic;">Zahl</span>,
1) ?). Die meisten Computer z.B. unterscheiden auch zwischen ganzen
Zahlen und Zahlen mit Nachkommastellen.</p>
<p>Betrachten wir noch einen weiteren Algorithmus zum Sortieren:</p>
<p><span style="text-decoration: underline;"><a name="bubblesort_pseudo"></a>L&ouml;sung
2</span> (Bubble-Sort):<br>
<span class="algo">Neue Variablen vom Typ Zahl: <span class="var">x</span>, <span class="var">i</span>, <span class="var">j</span></span><br class="algo">
<span class="algo">F&uuml;r <span class="var">i</span> := 1 bis Length(<span class="var">Kartenblatt</span>), tue</span><br class="algo">
<span class="algo">&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp; F&uuml;r <span class="var">j</span> := 1 bis Length(<span class="var">Kartenblatt</span>)-1, tue</span><br class="algo">
<span class="algo">&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp; Wenn <span class="var">Kartenblatt</span>[<span class="var">j</span>] &gt; <span class="var">Kartenblatt</span>[<span class="var">j</span>+1], dann tue</span><br class="algo">
<span class="algo">&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp; <span class="var">x</span>
:= <span class="var">Kartenblatt</span>[<span class="var">j</span>]</span><br class="algo">
<span class="algo">&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp; <span class="var">Kartenblatt</span>[<span class="var">j</span>] := <span class="var">Kartenblatt</span>[<span class="var">j</span>+1]</span><br class="algo">
<span class="algo">&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp; <span class="var">Kartenblatt</span>[<span class="var">j</span>+1] := <span class="var">x</span></span><br class="algo">
<span class="algo">&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp; Ende "Wenn"-Fall</span><br class="algo">
<span class="algo">&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp; Ende "F&uuml;r"-Schleife</span><br class="algo">
<span class="algo">Ende "F&uuml;r"-Schleife<br>
<span class="var">Ergebnis</span> :=
<span class="var">Kartenblatt</span></span></p>
<p>Dies ist interessanterweise der Algorithmus, auf den die
meisten
Leute als erstes kommen, wenn sie sich einen Algorithmus zum Sortieren
&uuml;berlegen sollen. Man beachte, dass offensichtlich immer 3*<span style="font-style: italic;">n</span>*<span style="font-style: italic;">n</span> Befehle (<span style="font-style: italic;">n</span> sei dabei die
Anzahl der Eintr&auml;ge im <span style="font-style: italic;">Kartenblatt</span>)
notwendig sind. L&ouml;sung 1 ist ein abh&auml;ngig von der
bereits gegebenen Ordnung vom <span style="font-style: italic;">Kartenblatt</span>,
aber selbst im extremsten Fall ist L&ouml;sung 1 schneller.</p>
<p>Es gibt noch viele weitere Algorithmen zum Sortieren von
Listen, die
teilweise (vor allem f&uuml;r sehr gro&szlig;e Listen) noch
deutlich
schneller sind. Diese sind aber auch etwas umst&auml;ndlicher,
deshalb
wollen wir hier erstmal nicht darauf eingehen.</p>
<p>Wir wollen nun zu einem neuen Kapitel &uuml;bergehen. Das
&Uuml;berlegen von Algorithmen bleibt aber immer beim Programmieren
die
absolute Grundlage. Es kann daher n&uuml;tzlich sein, sich zu
bestimmten Sachen selbst Algorithmen zu &uuml;berlegen.</p>
<p>Ein paar Denkans&auml;tze f&uuml;r weitere
Problemstellungen (manche
davon leichter, manche schwerer und bei manchen wurde erst vor
vergleichsweise kurzer Zeit mathematisch bewiesen, dass eine
L&ouml;sung nicht m&ouml;glich ist):<br>
</p><ul class="aufgabe"> <li>Durchsuchen der
Festplatte nach einem Dateinamen. (Vorgabe
soll die
Verzeichnisstruktur der Festplatte sein. Man nennt Strukturen dieser
Art auch B&auml;ume.)</li> <li>Wegfindung in einem
Labyrinth. (Man stelle sich ein
typisches, in
einem R&auml;tselheft vorgegebenes, Labyrinth vor.)</li> <li>Automatische
schnellste Wegermittlung auf einer
Stra&szlig;enkarte.
(Man stelle sich es vereinfacht erstmal als eine Knotenpunktmenge vor,
wobei jeder vorhandenen Verbindung eine L&auml;nge zugewiesen ist.)</li>
<li>Algorithmischer Gegner beim Schach oder bei anderen Spielen
(z.B.
"Mensch &auml;rgere dich nicht" oder "Mau Mau").</li> <li>Bei
einem vorgegebenen Algorithmus automatisch
nachpr&uuml;fen,
ob
dieser unter Umst&auml;nden in einer Endlosschleife landet. (Man
sagt
dann auch, er terminiert nicht.)</li>
</ul><p>Man beachte auch, dass das &Uuml;berlegen von
Algorithmen
etwas sehr
altes ist. Jedes Kuchenrezept, jede Bauanleitung und jeder sonstige
beschriebene Vorgang ist ein Algorithmus. Wir Menschen haben uns
Algorithmen &uuml;berlegt, seit es uns gibt. Selbst Tiere leben ihr
gesamtes Leben nach einem Algorithmus ab, der sich intuitiv in ihnen
befindet, programmiert von der Evolution. (Wenn Hunger, dann esse. Wenn
Durst, dann trinke. Wenn gewisse sexuellen Bed&uuml;rftnisse, dann
Partnersuche. Wenn m&uuml;de, dann suche Platz zum Schlafen und
schlafe. ... Wiederhole &Uuml;berpr&uuml;fungen wieder am
Anfang.) Und
nat&uuml;rlich ist das Arbeitsprinzip einer Maschiene nichts
anderes,
als einfach einen festgelegten Algorithmus Schritt f&uuml;r Schritt
abzuarbeiten.</p>
<p>Hier noch vom Lehrstuhl 1 der Informatik der RWTH Aachen eine
sehr sch&ouml;ne Beschreibung eines Algorithmus' zum Suchen einer
CD aus einer geordneten Sammlung von CDs:<br>
<a href="http://www-i1.informatik.rwth-aachen.de/%7Ealgorithmus/algo1.php" target="_blank">www-i1.informatik.rwth-aachen.de/~algorithmus/algo1.php</a></p>
<h2><a name="pascal"></a>Einf&uuml;hrung
in
eine Programmiersprache (Object Pascal)</h2>
<p>An dieser Stelle sind bereits nun alle Grundlagen zum
Programmieren gelegt und wenn ihr alles verstanden habt k&ouml;nnt
ihr
bereits sagen, dass ihr programmieren k&ouml;nnt, auch wenn das
Bisherige vom Wissensumfang wirklich minimal und trivial ist.</p>
<p>Damit sich das Wissen aber auch irgendwie festsetzt und
h&auml;lt,&nbsp;wollen wir nun das Programmieren praktisch
anwenden. Wir
wollen damit beginnen, geschriebene Algorithmen testen zu lassen
und sie in einer einheitlicheren Form aufzuschreiben. Abgesehen
von dem Lerneffekt ist es auch ein unbeschreiblich cooles
Gef&uuml;hl
zu sehen, wie da der eigene Algorithmus durchl&auml;uft und genau
das
tut, was er soll. Hierf&uuml;r
wurden sogenannte <span style="font-weight: bold;">Programmiersprachen</span>
entwickelt. In Programmiersprachen sind sehr strikte Regeln vorgegeben,
in welcher Form der Algorithmus aufgeschrieben werden muss. Zu dieser
Form, die man auch <span style="font-weight: bold;">Grammatik</span>
nennt, geh&ouml;ren solche Details wie z.B. ein Semikolon am Ende
eines Befehls und &Auml;hnliches. Au&szlig;erdem kann man
grunds&auml;tzlich in der Programmiersprache nur die von der
Programmiersprache bereitsgestellten Befehle benutzen (diese Menge von
Befehlen wird h&auml;ufig auch das <span style="font-weight: bold;">Vokabular</span> genannt).
Auch wird von der Programmiersprache meistens eine Reihe von
Standardvariablentypen bereitgestellt, die meistens Ganzzahlen, Zahlen
mit Nachkommastellen, Listen und weiteres enthalten. Der Vorteil dieser
sehr strikten Regeln ist, dass die Algorithmen in so einer klarer Form
dann geschrieben sind, dass sie ein <span style="font-weight: bold;">Computer</span>
sehr leicht <span style="font-weight: bold;">interpretieren</span>
und ausf&uuml;hren kann.</p><p>Im
Folgenden, vor allem in der Einf&uuml;hrung in Object Pascal, werden
sehr viele spezielle Details aufgelistet. Es ist nicht notwendig,
wirklich alles davon auswendig zu lernen. Sobald man ein wenig dadrin
selbst arbeitet, kommt das Lernen automatisch und kurze Zeit
sp&auml;ter, nachdem man den Anfang hinter sich hat, wo man noch immer
wieder alles nachgucken muss und h&auml;ufig alles nicht auf Anhieb
funktioniert, wird es dann ungemein Spa&szlig; machen.</p>
<p>Bevor wir die Programmiersprache einf&uuml;hren, ist es allerdings
notwendig, zumindest einige wesentliche Grundlagen der Arbeitsweise
eines Computers zu kennen und zu verstehen, daher hier eine kurze
Zusammenfassung:</p>
<p>Der <span style="font-weight: bold;">Kern</span>
eines jeden Computers ist sein <span style="font-weight: bold;">Prozessor</span>.
Dieser f&uuml;hrt die eigentlichen Befehle aus. Er kennt dabei eine
vorgegebene Menge von relativ primitiven Befehlen, mit denen
letztendlich jede Funktion
eines Computers&nbsp;realisiert werden muss. Man nennt
diese primitiven Befehle die <span style="font-weight: bold;">Maschienenbefehle</span>.
Diese Befehle sind dabei einfach durchnummeriert, hat einen bestimmten
Namen und erwarten jeweils
eine bestimmte vorgegebene Anzahl von
Parametern.&nbsp;Au&szlig;erdem
besitzt jeder Computer einen begrenzten <span style="font-weight: bold;">Arbeitsspeicher</span>,
in dem er sich Sachen (Variablen) speichern kann. Dieser
Arbeitsspeicher ist kein dauerhafter Speicher, d.h. bei einem Neustart
ist alles wieder leer. F&uuml;r die dauerhafte Speicherung ist die <span style="font-weight: bold;">Festplatte</span> gedacht,
die genauso eine begrenzte Speichermenge&nbsp;zu Verf&uuml;gung
stellt.</p>
<p>Ein <span style="font-weight: bold;">Computerprogramm</span>
ist nun
nichts anderes, als eine Auflistung von Maschienenbefehlen (d.h. deren
zugeordnete Nummer), wobei jedem Maschienenbefehl immer die Parameter
folgen. Der Prozessor f&uuml;hrt nun einen Befehl nach dem anderen
aus.</p>
<p>So und zwar wirklich genau so l&auml;uft alles, was man
auf dem
Monitor erkennen kann, intern in einem Computer auf unterster Ebene ab.
(Wozu soll man es auch komplizierter machen, wenn es schon so einfach
funktioniert.)</p>
<p>Da diese vom Prozessor unterst&uuml;tzten
Maschienenbefehle sehr
primitiver Art sind (grob gesagt ist da nicht sehr viel mehr als das
Schreiben und Auslesen bestimmter bin&auml;rer Daten auf die bzw.
von
der&nbsp;Hardware und dann noch grundlegende mathematische Befehle
wie
Addieren, Multiplizieren, usw.), hat man sogenannte <span style="font-weight: bold;">h&ouml;here
Programmiersprachen</span> entwickelt, in denen man die Programme
in Textform formulieren kann. Man nennt diesen Text <span style="font-weight: bold;">Programmcode</span>. Dieser
Programmcode kann dann&nbsp;von sogenannten <span style="font-weight: bold;">Compiler</span>-Programmen
in <span style="font-weight: bold;">Maschienencode</span>,
d.h. ein vom Prozessor ausf&uuml;hrbares Programm, umgewandelt
werden. (Diese Umwandlung nennt man auch <span style="font-weight: bold;">compilieren</span>.)</p>
<p>Von solchen h&ouml;heren Programmiersprachen gibt es
heutzutage eine
fast unendliche Menge, die teilweise sehr verschiedener Art sind.
Grunds&auml;tzlich hat man sich aber in den meisten
Programmiersprachen
f&uuml;r Bezeichnungen auf die Sprache Englisch geeinigt (und
allgemein auf relativ gut lesbare Konstrukte). Ein
erster
Unterschied, der auff&auml;llt zu den in rein sprachlicher Form
aufgeschriebenen Algorithmen, ist die Wichtigkeit der Einhaltung
gewisser von der Programmiersprache vorgegebener Details. Diese Details
umfassen z.B., dass ein Befehl (je nach Programmiersprache) immer mit
einem Semikolon enden muss und &Auml;hnliches.</p>
<p>Wir wollen hier die Programmiersprache <span style="font-weight: bold;">Object Pascal</span>
f&uuml;r
weitere Beispiele verwenden. Object Pascal ist relativ gut lesbar
f&uuml;r einen Nicht-Programmierer und auf der anderen Seite aber
auch
sehr m&auml;chtig. Object Pascal ist die objektorientierte
Erweiterung
von dem urspr&uuml;nglichen Pascal. Was genau objektorientierte
Programmierung ist, wird sp&auml;ter behandelt und spielt erstmal
keine
weitere Rolle. Bekannte Compiler f&uuml;r Object Pascal sind z.B.
<span style="font-weight: bold;">Delphi</span> oder <span style="font-weight: bold;">Lazarus</span> basierend
auf <span style="font-weight: bold;">Free Pascal</span>.
Lazarus bietet den
Vorteil, als Open Source Projekt frei verf&uuml;gbar zu sein und
au&szlig;erdem auf allen g&auml;ngigen Betriebssystemen und
Computerarchitekturen zu laufen. Der unter Windows manuell
auszuf&uuml;hrende, notwendige Download des Programms kann auf der
Homepage&nbsp;<a href="http://www.lazarus.freepascal.org/" target="_blank">www.lazarus.freepascal.org</a>
durchgef&uuml;hrt werden.</p><p>Wir beginnen direkt mit
einem Beispiel, anhand dem wir weitere
Details dann erkl&auml;ren wollen. Dieses Beispiel soll den vorhin
besprochenen BubbleSort-Algorithmus darstellen:</p>
<?php PrintCode("bubblesort.pas");?><p>Beginnen
wir, im Detail die Einzelheiten der Sprache festzuhalten.</p>
<p>Der
Programmcode beginnt mit dem Schl&uuml;sselwort <span class="algo">procedure</span>. Wir hatten bereits
erw&auml;hnt, dass man einen Algorithmus h&auml;ufig als
<a href="#funktion">Funktion</a> ansieht, denn
dieser bekommt in der Regel gewisse <a href="#parameter_und_rueckgabe">Parameter</a>
(in diesem Fall nur einen, n&auml;mlich <span style="font-style: italic;">list</span>; beachte, dass
auch wenn die Liste selbst vielleicht einiges an Informationen
enth&auml;lt, die Liste an sich trotzdem nur ein Objekt ist).
Au&szlig;erdem gibt ein Algorithmus in der Regel einen Wert
zur&uuml;ck, den sogenannten R&uuml;ckgabewert. Im Falle der
Addition z.B. war dies das Ergebnis. Es gibt aber auch F&auml;lle,
wo im Algorithmus irgendetwas aktiv getan wird, wie z.B. das Entfernen
des M&uuml;lls oder in diesem Fall das Sortieren der Liste. Einen
solchen Algorithmus ohne speziellen R&uuml;ckgabewert nennt man
auch h&auml;ufig <span style="font-weight: bold;">Prozedur</span>
oder <span style="font-weight: bold;">Methode</span>.
In anderen Programmiersprachen gibt es kein spezielles
Schl&uuml;sselwort f&uuml;r eine Prozedur, da man dort einfach
eine Funktion ohne R&uuml;ckgabewert beschreiben kann. Ich werde
deshalb im weiteren h&auml;ufig auch Prozeduren als Funktionen
bezeichnen. Von manchen Leuten wird dies nicht so gerne gesehen, da im
mathematischen Sinn eine Funktion immer einen R&uuml;ckgabewert
haben muss, da es sonst keine Funktion ist. Ich hoffe, ihr seit
hinreichend gest&auml;rkt, um trotzdem damit fertig zu werden.</p>
<p>Der
gesamte Code in Pascal besteht aus Funktionen und Prozeduren, in
welchen die eigentlichen Aktionen ablaufen (bzw. beschrieben sind).
Beim Schreiben einer Prozedur oder einer Funktion muss mit dem ersten
Wort gekennzeichnet sein, ob es sich um eine Prozedur (in dem Fall <span class="algo">procedure</span>) handelt oder um eine
Funktion (in dem Fall <span class="algo">function</span>).</p>
<p>Als
n&auml;chstes legt man den Namen der Funktion fest. In diesem Fall
ist er passenderweise <span class="algo" style="font-style: italic;">BubbleSort</span>.</p>
<p>Falls
die Funktion Parameter bekommen soll, werden diese nun in Klammern
angegeben. (Eine Funktion muss nicht unbedingt Parameter bekommen. Das
<a href="#muellentfernen">M&uuml;llentfernen</a>
beispielsweise ist eine Aktion. Das
Herunterfahren des PCs ist auch eine Aktion. In beiden F&auml;llen
sind vermutlich zus&auml;tzliche Parameter nicht so sinnvoll. Das
bleibt aber nat&uuml;rlich dem Author des Algorithmus
&uuml;berlassen.) Alle in den Klammern angegebenen Parameter sind
durch ein Semikolon zu trennen (da in diesem Fall nur ein Parameter da
ist,
ist auch nichts zu trennen).</p>
<p>Das im Beispiel benutze
Schl&uuml;sselwort <span class="algo">var</span>
hat eine besondere Bedeutung. Es symbolisiert, dass der Parameter ein
Verweis und keine Kopie sein soll (der Unterschied wurde <a href="#verweis_od_kopie">bereits</a> besprochen). Dies
bedeutet, dass Manipulationen des Parameters sich direkt auf das
Original auswirken sollen. (Ansonsten w&auml;re der oben angegebene
Algorithmus auch nicht sinnvoll, da die kopierte sortierte Liste
nirgendwo zur&uuml;ckgegeben wird. Es w&auml;re
nat&uuml;rlich in dem Fall dann eine gute Idee, diese kopierte
Liste auch zur&uuml;ckzugeben. Das <a href="#parameter_und_rueckgabe">Zur&uuml;ckgeben</a>
einer Liste
wird aber in der Sprache Pascal nicht erlaubt, da eine Liste ein zu
komplexes Objekt ist. Mehr hierzu sp&auml;ter und auch, wie man es
sonst h&auml;tte machen k&ouml;nnen.) Das
Schl&uuml;sselwort <span class="algo">var</span>
kann benutzt werden (hat dann die beschriebene Wirkung), muss aber
nicht (in dem Fall ist der entsprechende Parameter eine Kopie).</p>
<p>Der
Parameter selbst, genauso wie auch <a href="#variablen">Variablen</a>
(dazu gleich), besteht
dann aus dem Namen (in diesem Fall <span style="font-style: italic;">list</span>)
und, getrennt mit einem Doppelpunkt, dem <a href="#vartyp">Typen</a>
des Parameters bzw. der
Variable. Beachte, dass in Pascal (sowie auch in vielen anderen
Programmiersprachen) der Typ immer angegeben werden muss. Dies
erleichtert es, den Code zu lesen, gewisse Vorhersagen &uuml;ber
das Verhalten des Codes bei der Ausf&uuml;hrung machen zu
k&ouml;nnen und au&szlig;erdem f&uuml;r den Compiler,
Fehler im Code zu finden. (Man kann sehr froh sein, wenn der Compiler
einen Fehler im Code findet, denn dann kann man diesen leicht beheben.
Falls der Compiler den Fehler nicht findet und man dann das Programm
startet, es aber irgendwie nicht richtig funktioniert, ist es deutlich
schwieriger, eigentlich &uuml;berhaupt die Fehlerursache zu finden.)</p>
<p><table style="text-align: left; width: 834px;" border="1" cellpadding="2" cellspacing="2"> <caption>Primitive
<span style="font-weight: bold;">Variablentypen</span></caption><tbody>
<tr> <th>Typ</th> <th>Bedeutung</th> <td>Beispiel</td>
</tr> <tr> <td class="algo var">Integer</td>
<td>eine ganze Zahl</td> <td>-2
oder 10</td> </tr> <tr> <td class="algo var">Real</td>
<td>eine
Zahl mit Nachkommastellen</td> <td>3.1415</td> </tr>
<tr> <td class="algo var">Boolean</td> <td>nur
2
m&ouml;gliche Werte: true oder false</td> <td>true</td>
</tr> <tr> <td class="algo var">String</td>
<td>ein Text</td> <td>'Einen
sch&ouml;nen guten Tag.'</td> </tr> <tr> <td class="algo var">Char</td> <td>(genau) ein
einzelnes
Zeichen</td> <td>'b' oder '3' oder '+' oder ' '</td>
</tr> </tbody></table></p><p><table style="text-align: left; width: 836px;" border="1" cellpadding="2" cellspacing="2"> <caption>Komplexere
<span style="font-weight: bold;">Variablentypen</span></caption><tbody>
<tr> <th>Typ</th> <th>Bedeutung</th> <td>Beispiel</td>
</tr> <tr> <td class="algo">array of <span style="font-style: italic;">&lt;<span class="var">Typ</span>&gt;</span></td>
<td>ein <a href="#array">Array</a> (variabler
L&auml;nge) vom Variablentyp <span style="font-style: italic;">&lt;<span class="var">Typ</span>&gt;</span></td>
<td>(1,
2)</td> </tr> <tr> <td class="algo">array[0..<span class="var">n</span>] of <span style="font-style: italic;">&lt;<span class="var">Typ</span>&gt;</span></td>
<td>ein
Array (fester L&auml;nge, n&auml;mlich genau <span class="var">n</span>+1
Eintr&auml;gen) von <span style="font-style: italic;">&lt;<span class="var">Typ</span>&gt;</span></td>
<td>('a',
'b', 'c')</td> </tr> </tbody>
</table></p><p>Weitere Typen werden sp&auml;ter
eingef&uuml;hrt.</p>
<p>Wir haben
nun nahezu die erste Zeile des Codes komplett erkl&auml;rt. Was
fehlt
ist das Semikolon am Ende der Zeile. Mit dem Semikolon
schlie&szlig;t
man in Pascal Dinge ab, in diesem Fall die Funktionsbeschreibung.
Ansonsten wird es auch benutzt (bzw. muss benutzt werden; auf so etwas
legt der Compiler Wert), um 2 Befehle voneinander zu trennen.</p>
<p>Nun
k&ouml;nnen, wenn Variablen in der Funktion ben&ouml;tigt
werden, diese
festgelegt werden. Wir m&uuml;ssen hier zu Beginn alle in der
Funktion
benutzten Variablen direkt festlegen und k&ouml;nnen
sp&auml;ter im
eigentlichen Code keine weiteren hinzuf&uuml;gen. Das sollte aber
kein
Problem darstellen, denn dann schreiben wir einfach alle Variablen nun
hier hin. Die Variablenliste leitet man mit dem Schl&uuml;sselwort <span class="algo">var</span>
an dieser Stelle ein. (Man beachte, dass je nach Stelle im Code,
gewisse gleiche Schl&uuml;sselw&ouml;rter unterschiedliche
Bedeutungen
haben k&ouml;nnen.) Diese werden im gleichen Format
niedergeschrieben,
wie auch die Parameter. Man beachte auch die von Pascal erlaubte
Zusammenfassung von Variablen (bzw. auch Parametern), welche im
Beispiel auch benutzt wurde. Man h&auml;tte es auch schreiben
k&ouml;nnen:<br>
&nbsp;&nbsp;&nbsp; <span class="algo">var <span class="var">x</span>:
<span class="var">Integer</span>; <span class="var">i</span>: <span class="var">Integer</span>; <span class="var">j</span>: <span class="var">Integer</span>;<br>
</span>Falls keine Variablen erw&uuml;nscht werden,
l&auml;sst man das Schl&uuml;sselwort <span class="algo">var</span>
einfach weg.</p>
<p>Man
beachte, dass Zeilenumbr&uuml;che (so wird es genannt, wenn eine
neue
Zeile beginnt) und Leerzeichen (auch Tabulatoren) keine Rolle in Pascal
spielen. Diese k&ouml;nnen gesetzt werden, wo sie auch immer zur
besseren Lesbarkeit erw&uuml;nscht werden.</p>
<p>Auch k&ouml;nnen
(sollten) Kommentare im Code hinterlassen werden. Diese werden entweder
in geschweifte Klammern gesetzt oder beginnen alternativ mit <span class="algo">//</span>
(2 mal Schr&auml;gstrich) und gelten dann bis zum Ende der Zeile
(die
Kommentare innerhalb der geschweiften Klammern k&ouml;nnen
&uuml;ber
mehrere Zeilen gehen). Alle diese Kommentare werden vollkommen vom
Compiler ignoriert und dienen damit nur der Lesbarkeit.</p>
<p>Der eigentliche Code wird nun mit dem Schl&uuml;sselwort <span class="algo">begin</span> eingeleitet, gefolgt von den
eigentlichen Befehlen. Generell geh&ouml;rt zu jedem <span class="algo">begin</span> auch immer ein <span class="algo">end</span> am Ende. So ein <span class="algo">begin</span>/<span class="algo">end</span>
markiert einen <span style="font-weight: bold;">Codeblock</span>.
Ein Codeblock ist nichts weiter als ein Block (d.h. eine gewisse Anzahl
von Befehlen) Code. Solche Codebl&ouml;cke k&ouml;nnen auch
ineinander
geschachtelt werden, wie es auch im Beispiel gemacht wurde. Einzelne <span style="font-weight: bold;">Befehle</span> sind dabei
entweder Zuweisungen (<span class="algo"><span class="var">variable</span> :=
irgendwas</span>), Funktions- oder Prozeduraufrufe, ein
Schleifenanfang oder eine <span class="algo">if</span>-Abfrage.</p>
<p>Der erste Befehl im Beispiel ist direkt eine <a href="#schleife">Schleife</a>. In diesem Fall wurde
die <span class="algo">for</span>-Schleife
verwendet. Die Ausf&uuml;hrung der Schleife geschieht dabei exakt
genauso, wie es bereits f&uuml;r den &auml;quivalenten
Pseudocode
beschrieben wurde. Die <span class="algo">for</span>-Schleife
sieht in Pascal immer folgenderma&szlig;en aus:<br>
&nbsp;&nbsp;&nbsp; <span class="algo">for <span class="var">i</span> := <span class="var">start</span> to <span class="var">ende</span> do <span class="var">aktion</span>;</span><br>
<span style="font-style: italic;">i</span>, <span style="font-style: italic;">start</span> und <span style="font-style: italic;">ende</span> sind dabei
beliebige Variable oder Werte&nbsp;vom Typ Integer. <span style="font-style: italic;">aktion</span> ist entweder
ein einzelner Befehl oder ein Codeblock.</p>
<p>Beachte, dass in Pascal ein Array immer beginnt mit dem 0-ten
Eintrag. Die&nbsp;im Beispiel benutzen Funktion <span class="algo">High</span> bekommt als Parameter ein
Array und liefert als R&uuml;ckgabewert den <span style="font-weight: bold;">Index</span> des letzten
Eintrags (der Index eines Eintrags ist die Position in dem Array bzw.
in einer Liste). <span class="algo">High</span>(<span style="font-style: italic;">list</span>) gibt als eins
weniger als die Anzahl der Eintr&auml;ge in <span style="font-style: italic;">list</span>
zur&uuml;ck, da der 0-te Eintrag noch hinzukommt.</p>
<p>Der restliche Code entspricht nach allen Erkl&auml;rungen
nun exakt <a href="#bubblesort_pseudo">dem</a>, was
auch als Pseudocode bereits pr&auml;sentiert wurde.</p>
<p>Um
zu Vergewissern, dass auch klar ist, was im Detail genau passiert (was
sehr wichtig f&uuml;r das Verst&auml;ndnis ist), werden wir mal
genau
im Beispiel durchgehen, was der Computer bei der Ausf&uuml;hrung
dieser
Prozedur genau in welcher Reihenfolge tut, also wie er diesen Code
liest. Sei dazu <span class="algo"><span class="var">meine_liste</span> = (2,1)</span>
gegeben. Wir beschreiben nun, was genau der Computer macht, wenn an
anderer Stelle der Befehl <span class="algo">BubbleSort(<span class="var">meine_liste</span>);</span>
aufgerufen wird.</p>
<ol> <li class="algo">Setze den Parameter <span class="var">list</span> als Verweis
auf <span class="var">meine_liste</span>.</li>
<li class="algo">Erstelle die Variablen <span class="var">x</span>, <span class="var">i</span> und <span class="var">j</span> im
Arbeitsspeicher.</li> <li class="algo">Gehe zu
Befehl 1.</li> <li class="algo">Rufe die Funktion
High auf, mit <span class="var">list</span>
als Parameter
und speichere den Wert als Endwert der Schleife. (Der <span class="var">Endwert</span> ist damit
1.)</li> <li class="algo">Setze <span class="var">i</span> := 0.</li> <li class="algo">Gehe zu Befehl 2.</li> <li class="algo">Rufe die Funktion High mit <span class="var">list</span> als Parameter
auf, subtrahiere den Wert mit 1 und speichere den Wert als <span class="var">Endwert</span> der
Schleife. (Der <span class="var">Endwert</span> ist damit 0.)</li> <li class="algo">Setze
<span class="var">j</span> := 0.</li>
<li class="algo">Gehe zu Befehl 3.</li> <li class="algo">&Uuml;berpr&uuml;fe, ob <span class="var">list</span>[<span class="var">j</span>] &gt; <span class="var">list</span>[<span class="var">j</span>+1] gilt. <span class="var">j</span> ist 0, <span class="var">j</span>+1 ist 1, <span class="var">list</span>[0] ist 2 und <span class="var">list</span>[1] ist 1. Weil
2&gt;1 ist, gilt es also. Also gehe zu Befehl 4.</li> <li class="algo">Setze <span class="var">x</span>
:= <span class="var">list</span>[<span class="var">j</span>]. (<span class="var">x</span> ist damit 2.)</li>
<li class="algo">Setze <span class="var">list</span>[<span class="var">j</span>] := <span class="var">list</span>[<span class="var">j</span>+1]. (Beachte,
hier wird direkt <span class="var">meine_liste</span>
ge&auml;ndert! An der 0-ten Stelle ist nun eine 1. Also ist <span class="var">list</span> = (1,1), denn
die 1-te Stelle wurde ja nicht ge&auml;ndert.)</li> <li class="algo">Setze <span class="var">list</span>[j+1] := <span class="var">x</span>. (Damit ist <span class="var">list</span><span style="font-style: italic;"> </span>= (1,2).)</li>
<li class="algo">Ende des Codeblocks der if-Abfrage.</li>
<li class="algo">Ende des Codeblocks der
for-Schleife&nbsp;aus Befehl 2, gehe also zur Stelle 2 und
erh&ouml;he <span style="font-style: italic;">j</span>
um eins. (<span class="var">j</span>
ist dann 1.) &Uuml;berpr&uuml;fe, ob <span class="var">j</span> nun
gr&ouml;&szlig;er als der gespeicherte <span class="var">Endwert</span> ist (der <span class="var">Endwert</span>
war 0).
Dies ist der Fall, also h&ouml;re auf, die Schleife noch einmal zu
durchlaufen und gehe damit zum n&auml;chsten Befehl hinter der
Schleife.</li> <li class="algo">Ende des Codeblocks
der for-Schleife
aus Befehl 1, gehe also zur Stelle 1 und erh&ouml;he <span class="var">i</span> um eins. (<span class="var">i</span> ist dann 1.)
&Uuml;berpr&uuml;fe, ob <span class="var">i</span>
nun gr&ouml;&szlig;er als der gespeicherte Endwert ist (der
Endwert war
1). Dies ist nicht der Fall, also fahre mit Befehl 2 fort.</li> <li class="algo">Rufe die Funktion High mit <span class="var">list</span><span class="var"> </span>als Parameter
auf, subtrahiere den Wert mit 1 und speichere den Wert als <span class="var">Endwert</span> der
Schleife. (Der <span class="var">Endwert</span> ist damit 0.)</li> <li class="algo">Setze
<span class="var">j</span> := 0.</li>
<li class="algo">Gehe zu Befehl 3.</li> <li class="algo">&Uuml;berpr&uuml;fe, ob <span class="var">list</span>[<span class="var">j</span>] &gt; <span class="var">list</span>[<span class="var">j</span>+1] gilt.&nbsp;<span class="var">list</span>[0] ist 1 und <span class="var">list</span>[1] ist 2. Weil
nicht 1&gt;2 gilt, &uuml;berspringen wir den Inhalt der
if-Abfrage. Also gehe zum n&auml;chsten Befehl dahinter.</li>
<li class="algo">Ende
des Codeblocks der for-Schleife&nbsp;aus Befehl 2, gehe also zur
Stelle 2
und erh&ouml;he <span class="var">j</span>
um eins. (<span class="var">j</span>
ist dann 1.) &Uuml;berpr&uuml;fe, ob <span class="var">j</span> nun
gr&ouml;&szlig;er als
der gespeicherte Endwert ist (der <span class="var">Endwert</span> war 0). Dies ist der Fall,
also h&ouml;re auf, die Schleife noch einmal zu durchlaufen und
gehe damit
zum n&auml;chsten Befehl hinter der Schleife.</li> <li class="algo">Ende des Codeblocks der for-Schleife
aus Befehl 1, gehe also zur Stelle
1 und erh&ouml;he <span style="font-style: italic;">i</span>
um eins. (<span class="var">i</span>
ist dann 2.) &Uuml;berpr&uuml;fe, ob <span class="var">i</span> nun
gr&ouml;&szlig;er als
der gespeicherte Endwert ist (der <span class="var">Endwert</span> war 1). Dies ist der
Fall, also h&ouml;re auf, die Schleife noch einmal zu durchlaufen
und gehe zum n&auml;chsten Befehl dahinter.</li> <li class="algo">Ende des Codeblocks der
Funktion. Damit sind wir fertig.</li>
</ol><p>Ist das alles verstanden, sollte damit klar sein,
wie man grunds&auml;tzlich Programmcode in Object Pascal schreibt.
Falls sich das bei dir im Kopf alles noch nicht so feste gesetzt hat,
ist das nicht schlimm und auch nicht weiter verwunderlich. Wirklich
festsetzen tut
sich sowas erst nach ein wenig praktischer Anwendung -
und bei den ersten Gehversuchen (Krabbeln sollte jetzt bei dir jetzt
drin sein) und auch &uuml;berhaupt immer kann man sich ja
irgendwelche Referenzen oder Tutorials zur Vorlage nehmen (ist ja
v&ouml;llig egal, wie man an sein Endresultat kommt, nur das
Endresultat hinterher z&auml;hlt wirklich).</p><p>Was
noch ein wenig unklar ist, ist wie man grunds&auml;tzlich nun ein
lauff&auml;higes Programm in Object Pascal schreibt. Dazu mal ein
einfaches <a name="sample_hallo_welt_extended"></a>Beispiel:<br>
<?php PrintCode("hallo_welt_extended.pas"); ?></p><p>Dieses Programm
ist ein reines Konsolenprogramm. Im Hauptcode wird direkt als einzige
Aktion die main-Funktion gestartet. Diese enth&auml;lt die eigentlichen
Aktionen des Programms. Am Anfang liest sie 10 Zeichen vom Benutzer auf
der Konsole ein, danach gibt es diese 10 Zeichen wieder aus, danach
wird unsere bereits besprochene Prozedur BubbleSort darauf angewendet
und letztendlich wird die Liste der 10 Zeichen dann ein weiteres Mal
ausgegeben (nun hoffentlich korrekt sortiert).</p><p>Die
erste richtige Zeile leitet in Object Pascal immer die Datei ein. Das
kann dabei sowohl eine <span style="font-weight: bold;">Unit</span>
(<span class="algo">unit <span style="font-style: italic;">name</span>;</span>)
oder auch hier die <span style="font-weight: bold;">Programm-Deklaration</span>
(<span class="algo">program <span style="font-style: italic;">name</span>;</span>)
selbst sein.&nbsp;Der Name sollte dabei dem Dateinamen (ohne
Dateierweiterung) entsprechen, ansonsten k&ouml;nnte es zu
Verwirrungen beim Compiler kommen. Diese Einleitung muss ganz am Ende
der Datei mit einem <span class="algo">end.</span>
abgeschlossen werden.</p><p>Ein vollst&auml;ndiges
Programm besteht immer aus einer solchen Programm-Deklaration und
mehreren Units (bei diesem Beispiel war gar keine zus&auml;tzliche
Unit mehr n&ouml;tig). Die Units benutzt man, um sein Programm ein
wenig aufzuteilen und so eine &uuml;bersichtlichere Struktur zu
bekommen (wir h&auml;tten beispielsweise die BubbleSort-Prozedur in
eine extra Unit packen k&ouml;nnen). Die Programm-Deklaration
h&auml;lt man in der Regel auch so klein wie m&ouml;glich, man
will eigentlich immer den gesamten Code in den Units haben.</p><p>Programm-Deklarations-Struktur:<br>
<?php PrintCode("program_dekl_sample.pas"); ?></p><p>Unit-Struktur:<br>
<?php PrintCode("unit_sample.pas"); ?></p><p>Im
Prinzip sind viele alle Teile optional, d.h. wenn ein Teil nicht
ben&ouml;tigt wird, l&auml;sst man ihn einfach weg (nicht immer
muss man Konstanten einf&uuml;hren oder ben&ouml;tigt
f&uuml;r die ganze Unit globale Variablen oder braucht einen
Initialisierungscode usw.). Nur die Grundstruktur, d.h. bei einer Unit
der Interfaceteil und der Implementationteil, muss vorhanden sein.</p><p>Die Unterteilung
&uuml;brigens zwischen <span style="font-weight: bold;">Interface</span>
und <span style="font-weight: bold;">Implementierung</span>
hat seinen Sinn: Unter einem Interface versteht man die genaue Angabe
der Schnittstelle der Unit, d.h. die nach au&szlig;en hin
(f&uuml;r andere Units) zu Verf&uuml;gung gestellten Sachen.
Dies sind in erster Linie eigene Funktionen und eigene Variablentypen,
aber auch Konstanten und &auml;hnliches (alles das, was unter <span class="algo">interface</span> steht). Nicht alles muss
man nach au&szlig;en hin zu Verf&uuml;gung stellen - nur das,
was man als sinnvoll erachtet. Unter einer Implementierung versteht man
einen Programmcode f&uuml;r eine spezielle Sache, z.B. eine im
Interface deklarierte Funktion. Der Grund zur Unterteilung zwischen
Interface und Implementierung ist, dass man als menschlicher Leser
schneller erkennen kann, was einem eine Unit anbietet. Die
Implementierung ist in der Regel um ein vielfaches
gr&ouml;&szlig;er und l&auml;nger als das Interface.</p><h2><a name="lazarus"></a>Kurzeinf&uuml;hrung
in Lazarus</h2><p>Das <a href="#sample_hallo_welt_extended">letzte&nbsp;Beispiel</a> war ein
reines Konsolenprogramm. Angenommen, der Dateiname der Programmdeklaration war <span style="font-style: italic;">hallo_welt_extended.pas</span>. In der Konsole gibt man einfach folgendes ein, um das Programm zu kompilieren:</p><p class="algo">fpc hallo_welt_extended.pas</p><p>Man erh&auml;lt dann die ausf&uuml;hrbare Datei hallo_welt_extended. Die noch gestartet und das ganze sieht dann so aus:<br><img style="width: 496px; height: 277px;" alt="FPC Beispiel" src="fpc_console_use_sample.png"></p><p>Da
es Dank Lazarus aber nicht wirklich schwieriger ist, direkt ein
Programm mit grafischer Oberfl&auml;che zu programmieren und dies
au&szlig;erdem unter Windows, Linux oder sonst wo auf gleiche Art und
Weise ohne weitere Probleme durchf&uuml;hrbar ist und man
au&szlig;erdem so direkt, auch als Anf&auml;nger, zu viel netteren
Ergebnissen kommen kann, wollen wir im weiteren das auch tun.</p><p>So sieht Lazarus direkt nach dem (ersten) Start aus:<br><img style="width: 806px; height: 694px;" alt="Lazarus Startbildschirm" src="lazarus_startscreen.png"><br></p><p>Ganz
kurz zur Erkl&auml;rung: Oben sieht man das Standardmen&uuml;
(Lazarus-Editor ...), wo man so Standardsachen machen kann (Speichern,
neue Units anlegen, neues Projekt erstellen, usw.). Dieser gr&uuml;ne
Playknopf (<img style="width: 16px; height: 22px;" alt="Start-Symbol" src="lazarus_start.png">) startet das Programm. Au&szlig;erdem findet man hier die
Liste aller verf&uuml;gbaren Steuerelemente (z.B. Buttons, Textfelder,
usw., die man nach Auswahl auf der Form platzieren kann). Links der
Objektinspektor listet die auf der aktuell ausgew&auml;hlten Form
verf&uuml;gbaren Objekte/Steuerelemente auf. Hier gibt man auch
erweiterte Eigenschaften an (wie z.B. die Beschriftung von einem
Button, den internen Namen (&uuml;ber den das Objekt im Code
angesprochen wird), die Farbe, die Schriftart und sonstiges). In der
Mitte im Hintergrund ist der Lazarus-Quelltexteditor, in dem man immer
den kompletten Code der gerade ausgew&auml;hlten Unit sieht und
editieren kann. Die Form rechts im Bild ist das Fenster, welches
sp&auml;ter vom erstelten Programm benutzt wird. Zur Entwicklungszeit
kann man hier die Steuerelemente einf&uuml;gen, wie man gerade Lust
hat. Nach einem Doppelklick auf ein Steuerelement (z.B. auf ein dort
platzierten Button) gelangt man automatisch zu dem entsprechenden Code
des Standardereignisses des Steuerelements (z.B. ist sehr h&auml;ufig
das Standardereignis ein einfacher Mausklick).</p><p>Packen wir nun mal ein Button (<img style="width: 28px; height: 18px;" alt="Button-Symbol" src="lazarus_button.png">), ein Label (<img style="width: 25px; height: 19px;" alt="Label-Symbol" src="lazarus_label.png">) und ein Timer (der findet sich unter der Kategorie 'System':&nbsp;<img style="width: 23px; height: 21px;" alt="Timer-Symbol" src="lazarus_timer.png">) auf unsere Form:<br><img style="width: 300px; height: 270px;" alt="Form mit Label, Button und Timer" src="lazarus_formwithlabeltimerbutton.png"></p><p>Ein
Button ist dabei eins dieser wohlbekannten Klickfelder. Ein Label tut
nichts anderes als einen Text anzuzeigen. Und ein Timer ist daf&uuml;r
da, irgendwelchen Code in regelm&auml;&szlig;igen Abst&auml;nden
auszuf&uuml;hren. Nun w&auml;hlen wir den Button aus und geben ihm ein
paar vern&uuml;nftige Eigenschaften. Es empfiehlt sich, die
<span class="var">Caption</span>-Eigenschaft (die Beschriftung) zu &auml;ndern. Damit du in etwa
das gleiche Ergebnis wie ich im Folgenden bekommst, solltest du beim
Timer das Intervall auf 100 setzen. Auch die internen Namen (<span class="var">Button1</span>,
<span class="var">Label1</span>, <span class="var">Timer1</span>) habe ich soweit erstmal gelassen.</p><p>Der <a name="new_empty_laz_project"></a>aktuelle Code sieht nun folgenderma&szlig;en aus:<br><?php PrintCode("lazarus_newproj_sample.pas");?></p><p>Lazarus
hat f&uuml;r uns, wie man sieht, bereits gute Arbeit geleistet. Diese
<span class="var">Unit1</span> ist die entsprechend zu der <span class="var">Form1</span> geh&ouml;rige Unit. Es wurden
bereits alle abh&auml;ngigen Units im <span class="algo">uses</span>-Teil aufgelistet. Unsere Form wurde im <span class="algo">type</span>-Bereich
dabei als neuer Typ (und zwar <span class="var">TForm1</span>) eingef&uuml;hrt, der auf dem Typ
der Standardform (<span class="var">TForm</span>) basiert. Wirklich im Detail verstehen, was
genau diese Typdefinition aussagt, werden wir sp&auml;ter. Es reicht
aber vorerst v&ouml;llig aus, wenn man sich grob vorstellt, dass dieser
neue Variablentyp <span class="var">TForm1</span> mehrere Untervariablen (<span class="var">Button1</span>, <span class="var">Label1</span> und
<span class="var">Timer1</span> bisher) zu Verf&uuml;gung stellt. Das <span class="algo">public</span> und <span class="algo">private</span>
sagt nur aus, ob von au&szlig;erhalb des Typs darauf zugegriffen werden
kann - ist also auch erstmal uninteressant, so lange das gesamte
Programm sowieso nur innerhalb der <span class="var">Form1</span> sein wird. Im <span class="algo">var</span>-Bereich
wurde nun gerade unsere <span class="var">Form1</span> als Variable deklariert, vom Typ <span class="var">TForm1</span>.
Alle weiteren Informationen wie z.B. die Position und sonstige
Eigenschaften der 3 bisher platzierten Steuerelemente werden im <span class="algo">initialization</span>-Teil gesetzt. Dort findet man den Compilerbefehl <span class="algo">{$I unit1.lrs}</span>. Alle Kommentare in geschweiften Klammern, die mit einem Dollar-Zeichen beginnen (<span class="algo">{$ ...}</span>),
sind spezielle Anweisungen f&uuml;r den Compiler, irgendetwas
bestimmtes an dieser Stelle beim Compilieren zu tun. Die Anweisung <span class="algo">$I</span> sagt dabei, hier soll die folgende Datei (tempor&auml;r) eingef&uuml;gt werden. In der Datei <span style="font-style: italic;">unit1.lrs</span>
befinden sich dabei die Zuweisungen der speziellen Eigenschaften
f&uuml;r die Objekte. (Andere, evtl. von Lazarus hinzugef&uuml;gten
Compileranweisungen k&ouml;nnen im Moment ignoriert werden.)</p><p>Wenn wir jetzt bereits einmal zum Test auf Start (<img style="width: 16px; height: 22px;" alt="Start-Symbol" src="lazarus_start.png">) dr&uuml;cken,
wird das Programm bereits erfolgreich compiliert und auch gestartet.
Man wird allerdings feststellen, dass man nicht wirklich etwas
sinnvolles tun kann, denn bisher haben wir auch noch keinen Code
geschrieben.</p><p>Dies holen wir jetzt nach. Nach einem Doppelklick
auf den Button erstellt Lazarus automatisch eine
Prozedur&nbsp;<span class="var">Button1Click</span>, welche mit dem <a name="ereignis"></a><span style="font-weight: bold;">Klickereignis</span> des Buttons
verkn&uuml;pft ist. Das bedeutet, wenn wir im eigentlichen Programm
hinterher auf den Button klicken, wird die Prozedur <span class="var">Button1Click</span>
aufgerufen. Lazarus geht au&szlig;erdem nach dem automatischen
Erstellen der Prozedur auch an die richtige Stelle im Code, so dass wir
direkt beginnen k&ouml;nnen, den eigentlichen Code einzugeben (ist das
nicht super einfach?).</p><p>Zum Test geben wir mal folgende 2 Zeilen ein:<br><span class="algo"><span class="var">Label1</span>.<span class="var">Top</span> := <span class="var">Label1</span>.<span class="var">Top</span> - 10;</span><br class="algo"><span class="algo"><span class="var">Label1</span>.<span class="var">Caption</span> := <span class="var">IntToStr</span>(<span class="var">Label1</span>.<span class="var">Top</span>);</span></p><p>Nun
testen (d.h. starten) wir erneut das Programm. Nach einem Klick auf den
Button k&ouml;nnen wir nun das erstaunliche Ergebnis bestaunen.</p><p>Ein
wenig was zum Code: Wer aufmerksam war, hat sicherlich bemerkt, dass
die Prozedur <span class="var">Button1Click</span> innerhalb des Typs <span class="var">TForm1</span> deklariert wurde
(im <span class="algo">interface</span>-Teil) und im <span class="algo">implementation</span>-Teil
den Namen <span class="var">TForm1.Button1Click</span> bekommen hat. Dies ist eine dem Typ
zugeordnete Funktion. Solche Funktionen/Prozeduren bekommen immer im <span class="algo">implementation</span>-Teil den vollen Namen, damit keine Namenskonflikte entstehen k&ouml;nnen. Der Parameter <span class="algo"><span class="var">Sender</span>: <span class="var">TObject</span></span>
informiert beim Aufruf &uuml;ber das sendende Objekt, welches in dem
Fall immer <span class="var">Form1</span> ist. Wir k&ouml;nnen den Parameter also vollkommen
ignorieren (erst viel sp&auml;ter wird er sinnvoll werden). Im
eigentlichen Code &auml;ndern wir gleich 2 Eigenschaften des Objektes
<span class="var">Label1</span>. Auf dessen Eigenschaften (allgemein auf die Untervariablen
eines selbstdefinierten Typs) greift man immer mit einem Punkt zu, also
<span class="algo"><span class="var">Objektname</span>.<span class="var">Eigenschaf</span>t</span>. In dem Fall
vermindern wir <span class="algo"><span class="var">Label1</span>.<span class="var">Top</span></span> um 10. Wie man sicherlich beim Testen des
Programms festgestellt hat, gibt die Eigenschaft <span class="var">Top </span>(vom Typ <span class="algo var">Integer</span>)
die Y-Position des Labels an. Etwas verwirrend ist, dass die
Y-Koordinate scheinbar umgedreht ist (also ganz oben ist 0 und nach
unten hin wird es positiv). Dies hat sich im PC-Bereich durchgesetzt -
wohl aus dem Grund, da man auch von oben nach unten liest und so der
Punkt (0,0) (links oben) dann auch der Startpunkt ist. Die
<span class="var">Caption</span>-Eigenschaft (vom Typ <span class="algo var">String</span>) entspricht der Beschriftung. <span class="var">IntToStr</span> ist eine Funktion, die einen Wert vom Typ <span class="algo var">Integer</span><span class="var"> </span>(also eine Zahl) in einen Wert vom Typ <span class="algo var">String</span><span class="var">
</span>(also einen Text) umwandelt. Man beachte (und halte sich immer im
Kopf), dass dies wirklich eine echte Umwandlung ist. Dies merkt man
schon daran, dass sich nicht jeder beliebige <span class="var">String</span><span class="var"> </span>in einen Integer
umwandeln l&auml;sst. F&uuml;r die <span class="var">String</span>s, f&uuml;r die dies aber doch
m&ouml;glich ist, gibt es die Funktion <span class="var">StrToInt</span>.</p><p>Wir wollen nun
das Label auf der anderen Seite aber auch wieder nach unten laufen
lassen. Hierzu benutzen wir am besten unseren Timer. Wir t&auml;tigen
mal einen Doppelklick auf diesen, so dass Lazarus automatisch die
Prozedur <span class="var">Timer1Timer</span> erstellt. Diese wird bei jedem Intervall des
Timers, falls er aktiviert ist, ausgef&uuml;hrt. Wir f&uuml;gen nun
folgenden Code hinzu:<br><span class="algo"><span class="var">Label1</span>.<span class="var">Top</span> := <span class="var">Label1</span>.<span class="var">Top</span> + 1;</span><br><span class="algo"><span class="var">Label1</span>.<span class="var">Caption</span> := <span class="var">IntToStr</span>(<span class="var">Label1</span>.<span class="var">Top</span>);</span></p><p>Das
aktuelle Ergebnis scheint schon ganz lustig zu sein. Etwas st&ouml;rend
ist noch, dass das Label nicht am unteren Rand der Form halt macht,
sondern ewig weiter wandert. Dies ist schnell korrigiert, <span class="var">Timer1Timer</span>
sieht nun folgenderma&szlig;en aus:<br><span class="algo">&nbsp; if <span class="var">Label1</span>.<span class="var">Top</span> + <span class="var">Label1</span>.<span class="var">Height</span> &lt; <span class="var">Form1</span>.<span class="var">Height</span> then</span><br class="algo"><span class="algo">&nbsp; begin</span><br class="algo"><span class="algo">&nbsp;&nbsp;&nbsp; <span class="var">Label1</span>.<span class="var">Top</span> := <span class="var">Label1</span>.<span class="var">Top</span> + 1;</span><br class="algo"><span class="algo">&nbsp;&nbsp;&nbsp; <span class="var">Label1</span>.<span class="var">Caption</span> := <span class="var">IntToStr</span>(<span class="var">Label1</span>.<span class="var">Top</span>);</span><br class="algo"><span class="algo">&nbsp; end;</span></p><p>Es
w&auml;re ja nun noch ganz lustig, wenn sich dieser Fall nach unten des
Labels noch beschleunigt, so wie ein richtiger Fall im realen Leben
auch sein w&uuml;rde. Hierf&uuml;r muss das Label eine aktuelle
Geschwindigkeit haben, die sich im Fall immer weiter
vergr&ouml;&szlig;ert und von der die Positions&auml;nderung
abh&auml;ngt. F&uuml;r die Geschwindigkeit des Labels f&uuml;gen wir
also eine neue Variable ein, die wir innerhalb der <span class="var">TForm1</span>-Deklaration
platzieren (innerhalb die <span class="algo">private</span>-Sektion, denn f&uuml;r solche Sachen ist diese da):<br><span class="algo"><span class="var">Label1Vel</span>: <span class="var">Integer</span>;</span></p><p>Nun
passen wir <span class="var">Timer1Timer</span> erneut an. Wir wollen, dass wenn das Label unten
angekommen ist, die Geschwindigkeit gerade negiert wird und auch etwas
Energie verloren geht, so dass die Geschwindigkeit auch halbiert werden
soll. Weil man mit einem Integer keine normale Division
durchf&uuml;hren kann (denn dies geht nur mit Kommazahlen problemlos),
m&uuml;ssen wir die Ganzzahldivision <span class="algo">div</span> benutzen. Dies resultiert im folgenden Code:<br><span class="algo">&nbsp; if <span class="var">Label1</span>.<span class="var">Top</span> + <span class="var">Label1Vel</span> + <span class="var">Label1</span>.<span class="var">Height</span> &gt; <span class="var">Form1</span>.<span class="var">Height</span> then</span><br class="algo"><span class="algo">&nbsp;&nbsp;&nbsp; <span class="var">Label1Vel</span> := -<span class="var">Label1Vel</span> div 2</span><br class="algo"><span class="algo">&nbsp; else</span><br class="algo"><span class="algo">&nbsp; begin</span><br class="algo"><span class="algo">&nbsp;&nbsp;&nbsp; <span class="var">Label1</span>.<span class="var">Top</span> := <span class="var">Label1</span>.<span class="var">Top</span> + <span class="var">Label1Vel</span>;</span><br class="algo"><span class="algo">&nbsp;&nbsp;&nbsp; <span class="var">Label1</span>.<span class="var">Caption</span> := <span class="var">IntToStr</span>(<span class="var">Label1</span>.<span class="var">Top</span>);</span><br class="algo"><span class="algo">&nbsp;&nbsp;&nbsp; <span class="var">Label1Vel</span> := <span class="var">Label1Vel</span> + 1;</span><br class="algo"><span class="algo">&nbsp; end;</span></p><p>Wirklich
lehrreich f&uuml;r dich wird das ganze, wenn du aber jetzt selbst mal
ein wenig rumspielst und eigene Varianten testest. Eine kleine
Erweiterung aber trotzdem vielleicht noch: W&auml;hle das Label aus und
setze die Eigenschaft <span class="var">DragMode</span> auf <span class="var">dmAutomatic</span>. W&auml;hle nun im
Objektinspektor die <span class="var">Form1</span> aus und statt den Eigenschaften klicke hier
auf den Tab Ereignisse. Es werden die Ereignisse der <span class="var">Form1</span> aufgelistet.
Man mache einen Doppelklick auf das Feld neben <span class="var">OnDragOver</span>. Eine
Funktion <span class="var">FormDragOver</span> wird erstellt, in welche man folgenden Code
hinzuf&uuml;gen mag:<br><span class="algo"><span class="var">Label1</span>.<span class="var">Left</span> := <span class="var">X</span>; <span class="var">Label1</span>.<span class="var">Top</span> := <span class="var">Y</span>;</span></p><p>Man bestaune erneut das Ergebnis...</p><p class="offtopic">Hier
fehlen noch weitere Beispiele und eine Einf&uuml;hrung in die am
h&auml;ufigsten verwendeten Steuerelemente, sowie eine Einf&uuml;hrung
in prinzipielle Programmiertechniken.</p><p>Nachdem du bereits nun
hoffentlich selbst etwas rumgespielt hast mit Lazarus, was notwendig
ist, um ein gewisses Verst&auml;ndnis davon zu bekommen, wollen wir auf
Basis eines kleines Spiels zu weiteren Erfahrungen gelangen. Hier
kannst du zwar hinterher nicht behaupten, alles selbst gemacht zu
haben, allerdings wirst du schnell den gesamten Code verstehen und ihn
selbst soweit du Lust hast erweitern k&ouml;nnen. Interessant und
praktisch ist, dass&nbsp;das Erweitern des Codes&nbsp;sogar bereits
m&ouml;glich sein wird, bevor du &uuml;berhaupt alles verstanden bzw.
&uuml;berhaupt angeguckt hast. Der Vorteil an dieser Art des
praktischen Lernens ist, dass du viel schneller und effektiver nette
Sachen machen kannst. Immer wenn ich eine neue Programmiersprache
wirklich f&uuml;r die praktische Anwendung lernen will, nehme ich mir
ein einfaches Open Source Programm in der entsprechenden Sprache vor,
lese mich ein, versuche nur erstmal so grob den Aufbau zu verstehen und
beginne dann damit an der ein und anderen Stelle mal dies und das
abzu&auml;ndern oder zu erweitern. Das Entscheidende ist dann immer,
das Ergebnis nach der &Auml;nderung zu betrachten und so einmal das
Verst&auml;ndnis zu erlangen und gleichzeitig praktische Erfahrungen zu
sammeln. Beides, das wirst du bald merken, sind ungemein sch&ouml;ne
Gef&uuml;hle.</p><p>An dieser Stelle eignet sich wohl am besten das kleine Spiel <span style="font-weight: bold;"><a name="Robot_link_screenshot"></a>Robot</span>,
geschrieben mit Lazarus. Dieses habe ich urspr&uuml;nglich
programmiert, um zu demonstrieren, was man bereits mit minimalen
Programmiertechniken bereits erschaffen kann. Ich habe daf&uuml;r ein
neues Projekt in Lazarus erstellt und in dieser einen Form das gesamte
Spiel untergebracht.</p><p>Lade dir ersteinmal am besten den
Programmcode (am besten der Version 1.7, damit wir eine einheitliche
Basis hier zum besprechen haben) herunter und &ouml;ffne ihn dann mit
Lazarus:<br><a href="http://www.az2000.de/projects/robot2/" target="_blank">Robot-Projektseite</a> mit Download</p><p>Screenshot von Robot nach dem Start:<br><img style="width: 572px; height: 694px;" alt="Robot 1.7 beim Start" src="robot1.7-shot1.png"></p><p>In Lazarus sieht das Projekt so aus:<br><img style="width: 799px; height: 687px;" alt="Robot in Lazarus" src="robot_in_lazarus.png"></p><p>Man
sieht bereits, dass zur Entwicklungszeit (also in Lazarus) die Form
noch sehr im Rohformat aussieht, also erst w&auml;hrend der Laufzeit
(nach dem Start) alles gezeichnet wird. Werfen wir nun mal einen Blick
auf den Code dieser Form:<br><?php PrintCode("robot_umainform_part.pas");?></p><p>Was ist nun wirklich neu zu unserem bisherigen Wissen? Gehen wir diese Code-&Uuml;bersicht einmal Schrittweise durch.&nbsp;</p><p>Im <span class="algo">uses</span>-Teil
befinden sich noch ein paar mehr Units als sonst. Diese wurden
automatisch dort im Code hinzugef&uuml;gt, als ich entsprechende
Steuerelemente auf der Form platziert hatte. Dann ist da noch dieses <span class="algo">{$IFDEF win32} ... {$ENDIF}</span>. Dies ist, wie wir bereits gesagt hatten, eine Compileranweisung. <span class="algo">IFDEF</span> ist dabei die Abfrage, ob ein spezieller Wert des Compilers definiert ist oder nicht. <span class="var">win32</span><span class="var">
</span>ist dabei genau dann definiert, wenn der Code f&uuml;r ein normales
aktuelles Windows kompiliert wird. In dem Fall wird also noch die Unit <span class="var">MMSystem</span><span class="var">
</span>hinzugef&uuml;gt. Diese stellt unter Windows spezielle Funktionen zum
Soundabspielen bereit (mehr dazu sp&auml;ter an entsprechender Stelle).</p><p>Im <span class="algo">const</span>-Teil
werden nun f&uuml;r den eigentlichen Code einige Konstanten definiert.
Die&nbsp;konkreten Konstanten zu erkl&auml;ren ist vermutlich aber erst
sinnvoller, wenn sie im entsprechenden Kontext (im sp&auml;teren <span class="algo">implementation</span>-Teil) auch wirklich verwendet werden, wobei dann die Bedeutung sofort klar wird.</p><p>Nun im <span class="algo">type</span>-Teil
ist die erste wirkliche Neuerung und im Prinzip auch die einzige
wirkliche Neuerung im gesamten Code (ausgenommen sind jetzt mal
konkrete Funktionen oder &auml;hnliches, denn das ist eigentlich nichts
wirklich Neues, sondern etwas, was man halt, wenn man es braucht, in
einem Buch oder im Internet sich raussucht). Es wurden in diesem Teil
f&uuml;r das Spiel einige neue Typen definiert, so z.B. <span class="var">TRoomNum</span>, <span class="var">TPlaceAbsNum</span>, <span class="var">TRoom </span>und weitere.</p><p>Was ist ein <span class="algo">record</span>?<br><?php PrintCode("record_sample.pas");?></p><p>Ein <span class="algo">record</span> ist im Prinzip nichts anderes als eine Zusammenfassung mehrerer einzelner anderer Variablen eines vorhandenen Variablentyps.</p><p>Die n&auml;chste Neuerung ist ein Variablentyp in der Form <span class="algo">a..b</span>. Dies ist nichts weiter als eine eingeschr&auml;nkte <span class="var">Integer</span>-Typ, der nur Zahlen von <span class="algo">a</span> bis <span class="algo">b</span>
zul&auml;sst (beide eingeschlossen). Manchmal ist es sinnvoll den
Zahlenbereich im Vorhinein einzuschr&auml;nken um sp&auml;tere Fehler
fr&uuml;hzeitig zu entdecken. Auch ist es sinnvoll, um dem Leser des
Codes einen Hinweis zu geben, was in dieser Variable gespeichert werden
soll. Man behalte sich immer im Hinterkopf, dass man den Code nicht nur
programmiert, damit er funktioniert, sondern auch, dass er sp&auml;ter
auch gut gelesen werden kann. Denn vielleicht wollen wir sp&auml;ter
unseren l&auml;ngst vergessenen alten Code noch einmal ansehen,
wiederverwenden und vielleicht erweitern. Dies ist aber nur
m&ouml;glich, wenn wir dann auch verstehen, wieso unser alter Code
eigentlich so ist wie er ist.</p><p>Ansonsten ist da noch der bisher unbekannte Typ <span class="var">TBitmap</span>. Hierbei handelt es sich wieder um einen Typ der bereits von Lazarus bereitgestellt wird, &auml;hnlich wie <span class="var">TForm</span>. <span class="var">TBitmap</span>
enth&auml;lt alle Daten f&uuml;r ein komplettes Bitmap (also ein Bild)
im Speicher. Wir werden in Variablen von diesem Typ letztendlich die
Bilder von den Spielobjekten speichern.</p><p>Als letzte Typdefinition haben wir die Definition von <span class="var">TMainForm</span> als <span class="algo">class(<span class="var">TForm</span>)</span>.
Diese Definition in der Form wurde komplett von Lazarus selbst
vorgenommen, d.h. im Prinzip m&uuml;ssen wir uns hierum nicht weiter
k&uuml;mmern. (Zum Vergleich: <a href="#new_empty_laz_project">das leere neue Lazarus-Projekt</a>.) Wie man aus dem Code erkennen kann, scheint diese Typdefinition wohl &auml;hnlich wie ein <span class="algo">record</span> zu sein, wobei es zus&auml;tzlich noch Funktionen und Methoden besitzt. Dies nennt man eine <span style="font-weight: bold;">Klasse</span>.
Im Endeffekt ist es der Typ unseres sp&auml;teren Fensters, welches
selbst auch einfach eine Variable ist (man nennt Variablen vom Typ
einer Klasse auch <span style="font-weight: bold;">Klasseninstanzen</span> oder auch <span style="font-weight: bold;">Objekte</span>). An dieser Stelle ist es unwichtig die genaueren Details zu verstehen (das wird sp&auml;ter nachgeholt). Es reicht aus sich <span class="var">TMainForm</span> als ein besonderes <span class="algo">record</span><span class="algo"> </span>vorzustellen. Ausserdem basiert es auf dem Typ <span class="var">TForm</span> (das wurde in der Klammer angegeben). Das hei&szlig;t, dass <span class="var">TMainForm</span> so wie <span class="var">TForm</span>
ist, nur durch ein paar Sachen erweitert wurde. Auch das ist an dieser
Stelle aber nicht weiter von Bedeutung f&uuml;r das eigentliche
Verst&auml;ndnis des Spiels. Fast der gesamte Code von der
Typdefinition von <span class="var">TMainForm</span> wurde automatisch
von Lazarus erstellt, w&auml;hrend ich die einzelnen Elemente wie
Labels, Picture-Boxen (Boxen f&uuml;r Bildern), Panels (einfach nur
Boxen f&uuml;r irgendwas) und Timer auf das Fenster gesetzt habe. Die
ganzen Prozeduren wie z.B. <span class="var">GamePanelClick</span> wurden auch alle von Lazarus automatisch angelegt, als ich die entsprechenden <a href="#ereignis">Ereignisse</a> bearbeitete.</p><p>Der Code in der Typdefinition von <span class="var">TMainForm</span> ab "<span style="font-style: italic;">gameplay</span>"
ist der, den ich selbst hinzugef&uuml;gt habe. Es sind weitere eigene
Prozeduren f&uuml;r das eigentliche Spiel. Nach den Prozeduren kommen
noch ein paar Variablen f&uuml;r das eigentliche Spiel. Z.B.
enth&auml;lt die Variable <span class="var">MyWorld</span> die komplette Spielwelt.</p><p>Ganz am Ende bei den Typdefinitionen, also wieder ausserhalb von <span class="var">TMainForm</span>, sind noch ein paar weitere Funktionen. Diese habe ich angelegt, um leichter bestimmte Variablen umzuwandeln und umzurechnen.</p><p>Im <span class="algo">var</span>-Teil befinden sich globale Variablen f&uuml;r das gesamte Programm. Hier ist nur die Variable f&uuml;r unser Fenster (vom Typ <span class="var">TMainForm</span>). Alle weiteren Daten hatten wir ja innerhalb von <span class="var">TMainForm</span> gespeichert, d.h. sie sind in der Variable <span class="var">MainForm</span> gespeichert.</p><p>Im <span class="algo">implementation</span>-Teil befindet sich dann die genauere Deklaration aller vorher definierten Funktionen und Prozeduren.</p><p>Der <span class="algo">initialisation</span>-Teil ist auch f&uuml;r uns ersteinmal uninteressant (er wurde von Lazarus automatisch angelegt).</p><h2><a name="Robot"></a>Das Spiel Robot</h2><p>Ein <a href="#Robot_link_screenshot">Screenshot</a> haben wir bereits gesehen. Den <a target="_blank" href="http://www.az2000.de/projects/robot2/">Programmcode</a> haben wir nun auch auf unserer Festplatte entpackt.</p><p></p><p></p><p><span class="offtopic">Vorzeitiges
Ende ...</span></p>
<hr style="width: 100%; height: 2px;"><p class="offtopic">Author: Albert Zeyer<br>
Mail: ich AT admin DOT de<br>
<a href="..">andere Projekte</a></p><p class="offtopic"><a href="http://www.nvu.com"><img alt="Document made with Nvu" src="http://www.nvu.com/images/madewithNvu80x15clear.png" border="0"></a></p>
</body></html>