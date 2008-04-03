<?php
/*
	collection of functions
*/

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
			case "main.php":
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

?>
