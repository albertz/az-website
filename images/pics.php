<?php
//----------------------------------------------------------

	function show_error_forbidden() {
		show_head();
?>
<center>
<h2>Error 403 - Forbidden</h2>
<p>Der Zugang zu dieser Datei ist Ihnen nicht gestatten. Folgender 
Zugang sollte aber erlaubt sein:</p>
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
<p>Netter Versuch, war aber nix. Guck lieber hier:</p>
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

        	$fp = fopen("error404.gif","rb");
	        fpassthru($fp);
	}

//----------------------------------------------------------

	function show_image_html($file, $size, $quali) {
		show_head();
?>
<center>
<h2><?php echo $file ?></h2>
<p><a href=".">Show other files</a></p>
<p><a href="<?php
		echo "?file=".rawurlencode($file)."&type=html&size=";
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
		echo "?file=".rawurlencode($file)."&size=".$size."&quali=".$quali;
?>" border="0"></a></p>
<p><a href="<?php echo rawurlencode($file); ?>">Show original picture</a></p>
</center>
<?php
		show_foot();
	}

//----------------------------------------------------------

	function parse_query_string($query) {
		$return_val = array();

		foreach (explode('&', $query) as $key => $value) {
			list($attribute, $attribute_value) = explode('=', $value);
			$return_val[$attribute] = $attribute_value;
		}
		return($return_val);
	}

//----------------------------------------------------------

	function show_image($file, $size, $quali) {
		global $web_root;	

		if(strpos($file, "..") !== false) {
			show_error_hack();
			return;
		}
 		if(strpos($file, "/") === 0) {
			show_error_hack();
			return;
		}

		$file = $web_root.$file;
		if(!is_file($file)) {
			show_error_404();
			return;
		}

		header("Accept-Ranges: bytes", true);
		header("Content-Type: image/jpeg", true);
		//header("Content-Type: image/png", true);
		
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

		if($size == 1) { //nur Quali aendern
			imagejpeg($old_img, "", $quali);
			imagedestroy($old_img); 
			return;
		}

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

		//imagepng($new_img);
		imagejpeg($new_img, "", $quali);		

		imagedestroy($old_img); 
		imagedestroy($new_img); 
	}

//----------------------------------------------------------

	function show_dir($dir) {
		global $web_root;

		show_head();
?>
<center><h2><?php echo $_SERVER["REDIRECT_URL"]; ?></h2></center><br>
<table border="1" cellpadding="2" cellspacing="2" width="100%">
<tr><td align="center">
<a href="../">Up a directory</a>
</tr></td>
<?php
		$handle = opendir($web_root.$dir);
		while($file = readdir($handle)) {
			$enc = rawurlencode($file);
			if(substr($file, 0, 1) == ".") {
				//ignore
			} else {
			echo "<tr><td align='center'>\n";
			if(is_dir($web_root.$dir.$file)) {
				echo "<a href='$enc/'>$file</a>\n";
			} else {
				$info = pathinfo($file);
				switch( strtolower($info["extension"]) ) {
					case "jpg":
					case "jpeg":
					case "png":
					case "gif":
						echo "<a href='?file=$enc&size=0.25&type=html'>";
						echo "<img src='?file=$enc' ";
						echo "border='0' align='middle'></a>\n";
						echo "<a href='?file=$enc&size=0.25&type=html'>";
						echo "$file</a>\n";
						break;
					default:
						echo "<a href='$enc'>$file</a>\n";
				}
			}
			echo "</td></tr>\n";
			}
		}
		closedir($handle);

?>
</table>
<?php
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
<center><p>
infos and the source-code can be found here:<br>
<a href="http://www.az2000.de/projects/pics">www.az2000.de/projects/pics</a>
</p></center>
</body></html>
<?php
	}


//----------------------------------------------------------

	if($_SERVER["REDIRECT_STATUS"] != 403) {
		header("HTTP/1.1 302 Found", true);
		header("Location: /images/");
		exit();
	}

	header("HTTP/1.1 200 OK", true);

	$web_root = "../"; //Ort: /images/pics.php

	$dir = substr($_SERVER["REDIRECT_URL"], 1);
	$raw_query = $_SERVER["REDIRECT_QUERY_STRING"];

	$query = parse_query_string($raw_query);
	if(is_dir($web_root.$dir)) {
		$file = $query["file"];
		$type = strtolower($query["type"]);
		if($file) {
			$file = rawurldecode($file);
			$quali = $query["quali"];
			$size = $query["size"];
			if(!$quali) $quali = 50;
			if(!$size) $size = 100;
			if($type == "html")
				show_image_html($file, $size, $quali);
			else
				show_image($dir.$file, $size, $quali);
		} else {
			show_dir($dir);
		}
	} else {
		show_error_forbidden();
	}	
?>
