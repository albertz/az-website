<?php
	include("../../sql.php");
	
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
	$titel2 = "Project: $titel";
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
	
	if(file_exists($file))
		include($file);
	else {
?>

<p>
<b>Description</b><br>
<?php
	$file = "desc.txt";
	if(file_exists($file))
		include($file);
	else
		echo "I am working on it...\n";
?>
</p>

<p>
<b>Files</b><br>
<?php
	function ListFiles($dir) {
		$d = dir($dir);
		$files_count = 0;
		while(false !== ($entry = $d->read())) {
			switch($entry) {
			case "":
			case ".":
			case "..":
			case "index.php":
			case "desc.txt":
			case "mysql.name":
			case "mysql.description":
			case "mysql.date":
			case "mysql.marking":
				break;
			default:
				echo '<a href="'.$dir.'/'.$entry.'">'.$entry.'</a><br>';
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

<hr>
<p>
<b>Other files</b><br>
<?php ListFiles("../downloads"); ?>
</p>

<?php
	}

	include("../default/copyright.php");

	include("../default/other.php");

	$leader_titel = "Coder:";
	$leaders = array('Albert Zeyer (<a href="mailto:admin@az2000.de">Mail</a>)');
	include("../../foot.php");
?>
