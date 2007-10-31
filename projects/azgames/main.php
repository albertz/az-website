<p>
<b>Beschreibung</b><br>
Es handelt sich hierbei um eine Multiplayer-Spiele-Plattform. AZGames 
setzt sich aus den 3 Programmen RelayServer, GameServer und GameClient 
zusammen.
</p>

<p>
<b>GameServer</b><br>
Auf dem GameServer laueft das eigentliche Spiel ab, welches durch die 
Skriptsprache <a href="../azskript">AZSkript</a> komplett gesteuert 
wird. Es ist hier eine grosse Bandbreite von Spielen moeglich, die alle 
ueber den GameServer laufen koennen, da die Spieleplattform, d. h. 
sozusagen das Spielfeld sehr abstrakt gehalten wurde, d. h. es sind 
Spiele wie z. B. <a href="../robot">Robot</a>, <a 
href="../wurm">Wurm</a>, 2D-Strategiespiele, Kartenspiele, Brettspiele, 
etc. moeglich.
</p>

<p>
<b>GameClient</b><br>
Der GameClient ist der Client fuer diese Spiele-Plattform, auf ihm 
laueft hinterher das eigentliche Spiel, d. h. es laueft eigentlich 
komplett auf dem GameServer ab, der GameClient ist lediglich fuer das 
Anzeigen (also die Ausgabe) und fuer die Steuerung der Figuren oder was 
auch immer (also die Eingabe) zustaendig. Der GameClient muss nicht 
weiter angepasst werden, es kann mit ihm jedes beliebige Spiel gespielt 
werden, welches auf einem GameServer laeuft.
</p>

<p>
<b>RelayServer</b><br>
Jegliche Kommunikation bei AZGames laeuft ueber den RelayServer, so dass 
nur dieser auf einem Server mit hoher Bandbreite zum Internet laufen 
muss und nicht der GameServer. Der GameServer verbindet sich mit dem 
RelayServer, d. h. der RelayServer dient praktisch als Proxy bzw. 
Zwischenstelle zwischen GameClient und GameServer, wobei er aber auch 
die ganzen Informationen von allen GameClients komprimiert und in 
komprimierter Form an den GameServer weiterleitet. Es koennen sich auch 
mehrere GameServer mit diesem RelayServer verbinden, so dass der 
RelayServer praktisch dann mehrere Spiele im Angebot fuer den GameClient 
hat. Jegliche Kommunikation, also das Transfer-Protokoll setzt wieder 
auf HTTP auf (wieder, weil ich dies auch in anderen Projekten, z. B. <a 
href="../azchat3">AZChat</a> oder <a 
href="../delphi_winrobot">Delphi_winRobot</a> so umgesetzt habe), d. h. 
es ist auch wieder moeglich, einen HTTP-Proxy-Server noch dazwischen zu 
schalten.
</p>

<p>
<b>aktueller Status des Projekts</b><br>
Dieses Projekt steht im Moment still, da viele andere Sachen im Moment 
leider hoehere Prioritaet haben (aktuell wichtigstes Projekt ist <a 
href="../azskript2">AZSkript2</a>), was eigentlich Schade ist, da mir 
die allgemeine Idee recht gut gefiel. Es ist ueberhaupt fraglich, ob das 
Projekt in dieser Form noch weiter fertig gestellt wird, da ich 
inzwischen praktisch nur noch unter Linux programmiere und arbeite und 
Visual Basic eher Linux feindlich ist. Wenn ich dieses Projekt noch 
weiter fuehren sollte, wird es vermutlich nach C++ portiert und damit 
dann auch plattformunabhaengig umgesetzt.<br>
Der GameServer und der RelayServer sind bereits beide lauffaehig, 
jediglich der GameClient fehlt im Prinzip noch.
</b>

<p>
<b>(Linux) Wine</b><br>
Das Programm lies sich bei mir problemlos unter Wine testen, jediglich 
der RelayServer zeigte ein wenig Instabilitaet. Es zeigt im 
Moment eine kleine Demonstration von <a href="../azskript">AZSkript</a>.
</p>

<p>
<b>Delphi_winRobot</b><br>
Hier wurde die Idee von AZGames stark vereinfacht und unter Delphi neu 
umgesetzt. Dieses Programm ist dafuer in seinem Funktionsumfang 
allerdings auch fertiggestellt.<br>
<a href="../delphi_winrobot">Hier weitere Informationen</a>
</p>

<p>
<b>Download</b><br>
<a href="AZGames.Source.rar">komplettes Archiv</a>
</p>

<?php
	include("../vb_files.php");
?>
