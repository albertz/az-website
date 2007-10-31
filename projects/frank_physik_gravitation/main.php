<p>
<b>Beschreibung</b><br>
Dieses Programm entstand im Rahmen einer Facharbeit (Frank Saterdag) 
und simuliert die Gravitationskraft.
</p>

<p>
<b>Bemerkungen</b><br>
Das Programm weist leider einen kleinen Mangel auf, welcher dazu fuehrt, 
dass bei einem kurzen Stocken des PCs der Planet praktisch in den 
unendlichen Weiten des Weltraums verschwindet. Dies kommt daher, dass 
die Bewegungen immer zeitabhaengig ausgefuehrt werden und die 
Positionsaenderungen also mit der Zeit multipliziert werden. Wenn die 
Zeit zwischen 2 Berechnungen verhaeltnismaessig lang ist (durch ein 
kurzzeitiges Stocken) kommt es zu einer sehr grossen 
Positionsaenderung. Der Bewegungs-Algorithmus muss hierfuer noch einmal 
ueberarbeitet werden.<br>
Erfreulicher ist, dass das Programm problemlos mit Wine unter Linux 
lauffaehig ist.
</p>

<p>
<b>Download</b><br>
<a href="physik.rar">EXE-File</a><br>
<a href="physik.src.rar">Source-Code</a> (Visual Basic)
</p>

<?php
	include("../vb_files.php");
?>
