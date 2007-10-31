<?php
include_once('hightlighter.php');
include_once('fileio.php');

function PrintCode($filename) {
	$DH = new Hightlighter();
	$DH->InitPascalRules();

	$text = read_from_file($filename);
	echo '<pan class="code"><pre>';
	echo $DH->Analyse($text);
	echo "</pre></span>";

	unset($DH);
}

?>
