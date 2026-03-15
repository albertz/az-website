<?php
	include("../../sql.php");
	include("../../functions.php");
	include("../default/text.php");
	
	// TODO: do this handling of request-variables in a special file
	$url = $_SERVER["REQUEST_URI"];
	$paramof = strrpos($url, "?");
	if(! $paramof === false)
		$url = substr($url, 0, $paramof);
	$lastdirof = strrpos($url, "/");
	if(! $lastdirof === false)
		$url = substr($url, 0, $lastdirof+1);

	if(!isset($_REQUEST['lang']))
		$lang = "en";
	else
	switch(strtolower($_REQUEST["lang"])) {
	case "en": case "de":
		$lang = strtolower($_REQUEST["lang"]);
		break;
	}

	if($db_online) {
		$id = DB_GetID__FullURL($url);
		$titel = DB_GetName($id);
		$description = DB_GetDescription($id);
	} else {
		include("../../mysql_fileio.php");
		$id = 0;
		$titel = read_from_file("mysql.name");
		$description = read_from_file("mysql.description");
	}
	$titel2 = ucfirst($contenttype) . ": " . $titel;
	include("../../head.php");
?>

<?php
	$file = "main." . $lang . ".php";
	if(!file_exists($file)) {
		$file = "main.en.php";
		if(!file_exists($file))
			$file = "main.php";
	}

	
	if(file_exists($file)) {
		$showing_main_file = true;
		include($file);
	} else {
		$showing_main_file = false;
?>

<?php
	$file = "desc." . $lang . ".txt";
	if(!file_exists($file))
		$file = "desc.en.txt";
	if(!file_exists($file))
		$file = "desc.txt";
	if(!file_exists($file))
		$file = "mysql.description";
	if(file_exists($file)) {
?>
<p>
<b>Description</b><br>
<?php include($file); ?>
</p>
<?php } ?>

<p>
<b>Files</b><br>
<?php
	ListFiles("."); //current web-dir, _not_ from linked-file (other to includes)
?>
</p>

<?php
	} // end of else-part of if(file_exists($file))
?>

<?php
	include("../default/copyright.php");
	include("../default/other.php");
	include("../../foot.php");
?>

