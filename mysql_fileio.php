<?php

// one-line-reader/-writer

function read_from_file($filename) {
if(file_exists($filename)) {
	$handle = fopen($filename, "r");
	$contents = fgets($handle);
//	$contents = fread($handle, filesize ($filename));
	$contents = str_replace("\n", "", $contents);
	fclose ($handle);

	return $contents;
} else {
	return "";
} }

function write_to_file($filename, $contents) {
	$handle = fopen($filename, "w");
	fwrite($handle, $contents . "\n");
	fclose($handle);
}

?>
