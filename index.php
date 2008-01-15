<?php
// index.php - it's the index!
// get's nothing
	
	$id = $_REQUEST['id'];
	if($id == "" || !is_numeric($id))
		$id = 1;
	if($id == 1) {
		$start_titel = "";
		$listing_showdate = false;
		$listing_sorting = false;
		$lang = "en";
	}

	include("main.php"); // load the shit
?>
