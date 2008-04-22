<?php
/*
	pics.php
	code under GPL
	by Albert Zeyer

	special caching version
*/
//----------------------------------------------------------

	function show_error_forbidden() {
		show_head();
?>
<center>
<h2>Error 403 - Forbidden</h2>
<p>The access to the requested file is forbidden. But you can
take a look here:</p>
<hr>
<p><a href="http://www.az2000.de/">Home</a></p>
</center>
<?php
		show_foot();
	}

//----------------------------------------------------------

	function show_error_hack() {
		show_head();
?>
<center>
<h2>Error 403 - Forbidden</h2>
<p>Nice try, but no chance! Go back to my main site:</p>
<hr>
<p><a href="http://www.az2000.de/">Home</a></p>
</center>
<?php
		show_foot();
	}

//----------------------------------------------------------

	function show_error_404() {
		header ("Accept-Ranges: bytes", true);
		header ("Content-Type: image/gif", true);

		$fp = fopen("../error404.gif","rb");
		fpassthru($fp);
		fclose($fp);
	}

//----------------------------------------------------------

	function show_image_html($file, $size, $quali) {
		global $web_root;
		global $dir;

		show_head();

		$handle = opendir($web_root.$dir);
		$filelist = array();
		while($f = readdir($handle)) {
			if(substr($f, 0, 1) == "."
			|| $f == "pic.cml"
			|| $f == "pics.php") {
				//ignore
			} else {
			if(is_dir($web_root.$dir."/".$f)) {
				// ignore
			} else {
				$info = pathinfo($f);
				switch( strtolower($info["extension"]) ) {
					case "jpg":
					case "jpeg":
					case "png":
					case "gif":
						array_push($filelist, $f);
						break;
					default:
						// ignore
				}
			}
			}
		}
		closedir($handle);
		sort($filelist);

		$file_i = array_search($file, $filelist);
		$prevf = $filelist[$file_i - 1];
		$nextf = $filelist[$file_i + 1];
?>
<center>
<h2><?php echo $file ?></h2>
<p>
<?php if(isset($prevf)) { ?>
<a href="<?php echo rawurlencode($prevf)."?size=".$size."&quali=".$quali;
?>">previous picture</a>
-
<?php } ?>
<a href=".">other files</a>
<?php if(isset($nextf)) { ?>
-
<a href="<?php echo rawurlencode($nextf)."?type=html&size=".$size."&quali=".$quali;
?>">next picture</a>
<?php } ?>
</p>
<p><a href="<?php
		echo rawurlencode($file)."?type=html&size=";
		if($size > 1 || $size <= 0.25)
			echo "0.5";
		else if($size <= 0.5)
			echo "0.75";
		else if($size != 1)
			echo "1";
		else
			echo "0.25";
		echo "&quali=".$quali;
?>"><img src="<?php
		echo ".?file=".rawurlencode($file)."&type=pic&size=".$size."&quali=".$quali;
?>" border="0"></a></p>
<p><a href="<?php echo rawurlencode($file); ?>?get">show original picture</a></p>
</center>
<?php
		show_foot();
	}

//----------------------------------------------------------

	function show_image($file, $size, $quali) {
		global $web_root;	
		$imageformat = "image/jpeg";

		$cachefile = $file;
		$cachefile = $cachefile . ".size=" . $size;
		$cachefile = $cachefile . ".quali=" . $quali;
		$cachefile = str_replace("/", "$$", $cachefile);
		$cachefile = str_replace("\\", "$$", $cachefile);
		$cachefile = "/var/tmp/pics/" . $cachefile . ".jpg";
		$file = $web_root.$file;
		if(!is_file($file)) {
			show_error_404();
			return;
		}

		if(file_exists($cachefile) && (filemtime($cachefile) >= filemtime($file))) {
			header("Accept-Ranges: bytes", true);
			header("Content-Type: " . $imageformat, true);

	        $fp = fopen($cachefile, "rb");
		    fpassthru($fp);
			fclose($fp);
			return;
		}

		set_time_limit(0);
		while(! @mkdir("/var/tmp/pics/.lock") ) usleep(100000);

		header("Accept-Ranges: bytes", true);
		header("Content-Type: " . $imageformat, true);
		
		$info = pathinfo($file);
		switch( strtolower($info["extension"]) ) {
			case "jpg":
			case "jpeg":
				$old_img = imagecreatefromjpeg($file);
				break;
			case "gif":
				$old_img = imagecreatefromgif($file);
				break;
			case "png":
				$old_img = imagecreatefrompng($file);
				break;
			default:
				$old_img = imagecreatefromjpeg($file);
		};

		if($size == 1) {
			// only change quali (later)
			$new_img = $old_img;
		} else {

			$old_width = imagesx($old_img);
			$old_height = imagesy($old_img);

			if($size < 1) { //Prozentangabe
				$new_width = $old_width * $size;
				$new_height = $old_height * $size;
			} else { //Pixelangabe
				if($old_width >= $old_height) {
					if($size >= $old_width) {
						$new_width = $old_width;
						$new_height = $old_height;
					} else {
						$new_width = $size;
						$new_height = round(($old_height / $old_width) * $size);
					}
				} else {
					if($size >= $old_height) {
						$new_width = $old_width;
						$new_height = $old_height;
					} else {
						$new_height = $size;
						$new_width = round(($old_width / $old_height) * $size);
					}
				}
			}
			$new_img = imagecreatetruecolor($new_width, $new_height);
			imagecopyresized($new_img, $old_img, 0, 0, 0, 0, 
				$new_width, $new_height, $old_width, $old_height);

			imagedestroy($old_img);
		}

		//imagepng($new_img);
		imagejpeg($new_img, $cachefile, $quali);		
		imagedestroy($new_img);

		rmdir("/var/tmp/pics/.lock");

		$fp = fopen($cachefile,"rb");
		fpassthru($fp);
	}

//----------------------------------------------------------

	function show_dir($dir) {
		global $web_root;

		show_head();
?>
<center><h2><?php echo $dir; ?></h2></center><hr>
<center><a href="../">Up a directory</a></center><br>
<?php
		$handle = opendir($web_root.$dir);
		$filelist = array();
		while($file = readdir($handle))
			array_push($filelist, $file);
		closedir($handle);
		sort($filelist);

		foreach($filelist as $file) {
			$enc = rawurlencode($file);
			if($dir != "") $end = $dir . "/" . $end;
			if(substr($file, 0, 1) == "."
			|| $file == "pic.cml"
			|| $file == "pics.php") {
				//ignore
			} else {
			if(is_dir($web_root.$dir."/".$file)) {
				echo "<center><a href='$enc/'>$file</a></center>\n";
			} else {
				$info = pathinfo($file);
				switch( strtolower($info["extension"]) ) {
					case "jpg":
					case "jpeg":
					case "png":
					case "gif":
						echo "<a href='$enc'>";
						echo "<img src='$enc?type=pic&size=100' ";
						echo "border='0' align='middle'></a>&nbsp;\n";
//						echo "<a href='?file=$enc&size=0.25&type=html'>";
//						echo "$file</a>\n";
						break;
					default:
						echo "<center><a href='$enc?get'>$file</a></center>\n";
				}
			}
			}
		}

		show_foot();
	}

	function show_head() {
?>
<html><head>
<title>www.az2000.de picture browser</title>
</head><body>
<?php
	}

	function show_foot() {
?>
<hr>
<center><p>
information and the source-code can be found here:<br>
<a href="http://www.az2000.de/projects/pics">www.az2000.de/projects/pics</a>
</p></center>
</body></html>
<?php
	}

//----------------------------------------------------------

	function handle_file($dir, $file, $size, $quali, $type) {
		if(!$quali || !is_numeric($quali) || $quali <= 5) $quali = 80;
		if(!$size || !is_numeric($size) || $size <= 0) $size = 0.25;
		
		$quali = round($quali);
		if($size > 1) $size = round($size);
		
		if($type == "pic")
			show_image($dir."/".$file, $size, $quali);
		else
			show_image_html($file, $size, $quali);	
	}

//----------------------------------------------------------

	$web_root = "../pics/"; // Ort: pics/
	$query = $_REQUEST;

	$dir = rawurldecode($query["dir"]);
	$file = $query["file"];
	if($file) $file = rawurldecode($file);

	$quali = $query["quali"];
	$size = $query["size"];
	$type = strtolower($query["type"]);

	//phpinfo();
	//print_r($query);

	if(strpos($dir."/".$file, "..") !== false) {
		show_error_hack();
		return;
	}

	if(is_dir($web_root.$dir)) {		
		if($file) {
			handle_file($dir, $file, $size, $quali, $type);
		} else {
			while(substr( $dir, strlen( $dir ) - 1) == "/")
				$dir = substr( $dir, 0, strlen( $dir ) - 1 );
			show_dir($dir);
		}
	} else if(is_file($web_root.$dir)) {
		$file = basename($dir);
		$dir = dirname($dir);
		handle_file($dir, $file, $size, $quali, $type);
	} else {
		show_error_404();
	}
?>

