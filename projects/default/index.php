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
function flattrTitle() {
	global $titel, $titel2;
	if(strlen($titel) >= 5) return $titel;
	if(strlen($titel2) >= 5) return $titel2;
	if(strlen($titel) > 0) return $titel . " Albert Zeyer";
	return "Something by Albert Zeyer";
}

function flattrCategorie() {
	global $contenttype;
	switch($contenttype) {
	case "project": return "software";
	case "text": return "text";
	case "artwork": return "images";
	}
	return "rest";
}

function flattrLang() {
	global $lang;
	$ln = ($lang == "de") ? "de_DE" : "en_US";
	return $ln;
}

function flattrDescription() {
	global $description, $contenttype;
	if(strlen($description) >= 5) return $description;
	return flattrTitle() . ". " . ucfirst($contenttype) . " by Albert Zeyer.";
}

function putFlattrButton() {
	$url = (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != "on") ? "http://" : "https://";
	$url .= $_SERVER["HTTP_HOST"];
	$tmp = explode("?", $_SERVER["REQUEST_URI"]);
	$url .= $tmp[0];

	// TODO: as long as we don't have separate Flattr buttons:
	//$url = "http://www.az2000.de/";

	echo "<a class=\"FlattrButton\" style=\"display:none;\"\n";
	echo " href=\"" . $url . "\"\n"; 
	echo " title=\"" . flattrTitle() . "\"\n";
	echo " rev=\"flattr;category:" . flattrCategorie() . ";\"\n";
	echo " lang=\"" . flattrLang() . "\">\n";
	echo flattrDescription();
	echo "</a>\n";
}
?>

<div style="float: right; overflow: visible; text-align: right; z-index: 100;">
<?php putFlattrButton(); ?>
</div>

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

<p>
<?php
switch($lang) {
case "de": echo "Falls Sie meine Arbeit unterstützen wollen, bitte spenden Sie via Flattr hier: ";
default: echo "If you want to support my work, please donate via Flattr here: ";
}
?>

<span style="display: inline-block; vertical-align: middle; height: 60px;">
<?php putFlattrButton(); ?>
</span></p>

<?php
	include("../default/copyright.php");
	include("../default/other.php");
	include("../../foot.php");
?>

