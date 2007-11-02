<?php
	include("../../sql.php");
	include("../default/text.php");
	
	// TODO: does this handling of request-variables in a special file
	$url = $_SERVER["REQUEST_URI"];
	$paramof = strrpos($url, "?");
	if(! $paramof === false)
		$url = substr($url, 0, $paramof);
	$lastdirof = strrpos($url, "/");
	if(! $lastdirof === false)
		$url = substr($url, 0, $lastdirof+1);

	switch(strtolower($_REQUEST["lang"])) {
	case "en":
		$lang = strtolower($_REQUEST["lang"]);
		break;
	case "de":
	default:
		$lang = "";
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
	$titel2 = $titel2 . $titel;
	include("../../head.php");

	if($lang == "en") {
		$file = "main." . $lang . ".php";
		if(!file_exists($file)) {
			$file = "main.en.php"; 
			if(!file_exists($file))
				$file = "main.php";
		}
	} else
		$file = "main.php";
	
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
	function FileExt($fname) {
		$pos = strrpos($fname, ".");
		if($pos === false) return "";
		return strtolower(substr($fname, $pos + 1));
	}

	function ListFiles($dir) {
		$d = dir($dir);
		$files_count = 0;
		while(false !== ($entry = $d->read())) {
			if($entry != "" && substr($entry, 0, 1) != ".")
			switch($entry) {
			case "index.php":
			case "desc.txt":
			case "mysql.name":
			case "mysql.description":
			case "mysql.date":
			case "mysql.marking":
				break;
			default:
				switch(FileExt($entry)) {
				case "jpg":
				case "jpeg":
				case "png":
				case "gif":
				case "svg":
					echo '<img src="'.$dir.'/'.$entry.'"><br>';
					break;
				default:
					echo '<a href="'.$dir.'/'.$entry.'">'.$entry.'</a><br>';
				}
				echo "\n";
				$files_count++;
			}
		}
		if($files_count == 0)
			echo "No files.";
		return;
	}

	ListFiles("."); //current web-dir, _not_ from linked-file (other to includes)
?>
</p>

<?php
	}

	include("../default/copyright.php");
	include("../default/other.php");
	include("../../foot.php");
?>

