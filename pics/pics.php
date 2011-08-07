<?php
/*
	pics.php
	code under GPL
	by Albert Zeyer

	http://www.az2000.de/projects/pics/
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

	function show_error_custom($title, $msg) {
		show_head();
?>
<center>
<h2>Error: <?php echo $title; ?></h2>
<p><?php echo $msg; ?></p>
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
		header ("Dir: " . $_REQUEST["dir"]);

		$fp = fopen("../error404.gif","rb");
		fpassthru($fp);
		fclose($fp);
	}

//----------------------------------------------------------

	function make_url($fn, $size, $quali, $typ) {
		global $default_size, $default_quali;
		if($size == $default_size) $size = NULL;
		if($quali == $default_quali) $quali = NULL;
		$url = rawurlencode($fn);
		$args = array();
		if($size) $args["size"] = (string) $size;
		if($quali) $args["quali"] = (string) $quali;
		if($typ) $args["type"] = $typ;
		if($args) $url = $url . "?" . http_build_query($args);
		return $url;
	}

//----------------------------------------------------------

	function orientation_style($ifd0ori, $w, $h) {
		$hflip = $vflip = false;
		$rot = 0;
		switch($ifd0ori) {
		case 1: break;
		case 2: $hflip = true; break;
		case 3: $rot = 180; break;
		case 4: $vflip = true; break;
		case 5: $vflip = true; $rot = 90; break;
		case 6: $rot = 90; break;
		case 7: $hflip = true; $rot = 90; break;
		case 8: $rot = -90; break;
		}
		$transs = array();
		if($rot != 0)
			$transs[] = "rotate(" . (string)$rot . "deg)";
		if($rot == 90 || $rot == -90)
			list($w, $h) = array($h, $w);
		if($hflip)
			$transs[] = "scaleX(-1)";
		if($vflip)
			$transs[] = "scaleY(-1)";
		$s = "";
		foreach($transs as $trans)
			foreach(array("-webkit-", "-moz-", "-o-", "") as $prefix) {
				$prefix .= "transform: ";
				$s .= $prefix . $trans . "; ";
			}
		return array($s, $w, $h);
	}

//----------------------------------------------------------

	function show_image_html($fdir, $file, $size, $quali) {
		global $web_root;
		global $dir;

		if(!show_head($web_root.$dir)) return;

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
		$prevf = @$filelist[$file_i - 1];
		$nextf = @$filelist[$file_i + 1];
?>
<center>
<h2><?php echo $file ?></h2>
<p>
<?php if(isset($prevf)) { ?>
<a id="prevref" href="<?php echo make_url($prevf, $size, $quali, NULL); ?>">previous picture</a>
-
<?php } ?>
<a id="upref" href=".">other files</a>
<?php if(isset($nextf)) { ?>
-
<a id="nextref" href="<?php echo make_url($nextf, $size, $quali, NULL); ?>">next picture</a>
<?php } ?>
</p>
<p>
<?php
		list($w, $h, $imageformat,) = getimagesize($web_root."/".$fdir."/".$file);
		$w *= $size;
		$h *= $size;
		$exif = @exif_read_data($web_root."/".$fdir."/".$file, 0, true);
		if($exif && isset($exif['IFD0']['Orientation']))
			$ifd0ori = $exif['IFD0']['Orientation'];
		else
			$ifd0ori = 1;
		list($img_style, $new_w, $new_h) = orientation_style($ifd0ori, $w, $h);
?>
<div style="display:block; width:<?php echo $new_w; ?>px; height:<?php echo $new_h; ?>px;">
<div style="position:relative; <?php
		echo "left:" . ($new_w - $w)*(1.0/2.0) . "px; ";
		echo "top:" . ($new_h - $h)*(1.0/2.0) . "px; ";
?>; display:block;">
<a href="<?php
		if($size > 1 || $size <= 0.25)
			$nextsize = 0.5;
		else if($size <= 0.5)
			$nextsize = 0.75;
		else if($size != 1)
			$nextsize = 1;
		else
			$nextsize = 0.25;
		echo make_url($file, $nextsize, $quali, NULL);
?>">
<img id="img" src="<?php
		echo ".?file=".rawurlencode($file)."&type=pic&size=".$size."&quali=".$quali;
?>" border="0" alt="" id="image" style="<?php echo $img_style; ?>">
</a></div></div></p>
<p><a href="<?php echo rawurlencode($file); ?>?get">show original picture</a></p>
<div style="min-width:100px; font-size:smaller;">
<h3>Meta information</h3>
<?php
		$exif_lat = @$exif["GPS"]["GPSLatitude"];
		$exif_lon = @$exif["GPS"]["GPSLongitude"];
		if ( !empty($exif_lat) && !empty($exif_lon) ) {
			function sexagesimal_to_float($x) {
				list($h, $m, $s) = $x;
				list($h0,$h1) = explode("/", $h);
				list($m0,$m1) = explode("/", $m);
				list($s0,$s1) = explode("/", $s);
				return $h0/$h1 + $m0/$m1/60 + $s0/$s1/3600;
			}
			$lat = sexagesimal_to_float($exif_lat);
			if (@$exif["GPSLatitudeRef"][0] == "S")
				$lat = -$lat;
			$lon = sexagesimal_to_float($exif_lon);
			if (@$exif["GPSLongitudeRef"][0] == "W")
				$lon = -$lon;
?>
<script src="http<?php
		if(@$_SERVER['HTTPS'] == "on") echo "s";
?>://maps.googleapis.com/maps/api/js?sensor=false&key=<?php
		if(@$_SERVER['HTTPS'] == "on")
			echo "ABQIAAAAMIi4vvyQ9mohrSQ6SYMyhRRRVNx-TT1fV-IPI-2HnICjPKGJThRhBoE5IRssnqdMynUhAaPFHqJ2Dw";
		else
			echo "ABQIAAAAMIi4vvyQ9mohrSQ6SYMyhRTN_z_RLu-y0jj6F6s603o_BB5uHRTA912-U27sLYREIQPgVJl3ciNQNw";
?>" type="text/javascript"></script>
<div id="gmap_canvas" style="width: 75%; height: 300px;"></div>
<script type="text/javascript">
function gmaps_initialize() {
	var myOptions = {
		zoom: 8,
		center: new google.maps.LatLng(<?php echo $lat . ", " . $lon; ?>),
		mapTypeId: "hybrid"
	};
	var map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
	var marker = new google.maps.Marker({
		position: myOptions.center,
		map: map,
		title: "Position"
	});
}
</script>
<?php
		} /* GPS */

		if($exif)
		foreach ($exif as $key => $section) {
		    foreach ($section as $name => $val) {
				$keyname = $key.".".$name;
				switch($keyname) {
				case "EXIF.MakerNote":
				case "IFD0.UndefinedTag:0xC4A5":
					break;
				default:
					echo "$keyname: <code>";
					print_r($val);
					echo "</code><br />\n";
				}
		    }
		}
?>
</div>
</center>
<?php
		show_foot();
	}

//----------------------------------------------------------

	function show_image($file, $size, $quali) {
		global $web_root;	

		$cachefile = $file;
		$cachefile = $cachefile . ".size=" . $size;
		$cachefile = $cachefile . ".quali=" . $quali;
		$cachefile = str_replace("/", "$$", $cachefile);
		$cachefile = str_replace("\\", "$$", $cachefile);
		$cachefile = "/var/tmp/pics/" . $cachefile . ".jpg";
		header("X-Pics-File: " . $file, false);
		$file = $web_root.$file;
		if(!is_file($file)) {
			header("X-Pics: Error 404", false);
			show_error_404();
			return;
		}

		if(!lastModifiedHeader($file)) {
			header("X-Pics: !lastModifiedHeader", false);
			return;
		}

		list($w, $h, $imageformat,) = getimagesize($file);

		if(file_exists($cachefile) && (filemtime($cachefile) >= filemtime($file))) {
			//header("Accept-Ranges: bytes", true);
			header("Content-Type: " . $imageformat, true);
			header("X-Pics: From cache", false);

	        $fp = fopen($cachefile, "rb");
		    fpassthru($fp);
			fclose($fp);
			return;
		}

		//header("Accept-Ranges: bytes", true);
		header("Content-Type: " . $imageformat, true);

		set_time_limit(0);
		while(! @mkdir("/var/tmp/pics/.lock") ) {
			header("X-Pics: sleeping ..., waiting for lock", false);
			usleep(100000);
		}

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
		if(!$old_img) {
			header("X-Pics: failed to load " . $file, false);
			show_error_404();
			return;
		}

		if($size == 1) {
			// only change quali (later)
			$new_img = $old_img;
		} else {
			header("X-Pics: converting ...", false);

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

		if(!show_head($web_root.$dir)) return;
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
						echo "border='0' align='middle' alt=''></a>&nbsp;\n";
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

	function lastModifiedHeader($file) {
		$contentDate = filemtime($file);
		$contentDate = max($contentDate, filemtime($_SERVER["SCRIPT_FILENAME"]));
		$ifModifiedSince = isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) ? stripslashes($_SERVER['HTTP_IF_MODIFIED_SINCE']) : false;
		if ($ifModifiedSince && strtotime($ifModifiedSince) >= $contentDate) {
			header('HTTP/1.0 304 Not Modified');
			die; // stop processing
			return false;
		}
		$lastModified = gmdate('D, d M Y H:i:s', $contentDate) . ' GMT';
		header('Last-Modified: ' . $lastModified);
		return true;
	}

	function show_head($file = NULL) {
		if($file) if(!lastModifiedHeader($file)) return false;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html><head>
<title>www.az2000.de picture browser</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="/style.css.php"> 
<script type="text/javascript">
function body_onkeydown(e) {
	var keyunicode = e.charCode || e.keyCode;
	var obj = null;
	if(keyunicode == 37) { // left
		obj = document.getElementById("prevref");
	} else if(keyunicode == 39) { // right
		obj = document.getElementById("nextref");
	}
	if(obj) {
		self.location.href = obj.href;
	}
}

function prefetch(url, depth) {
	var iframe = document.createElement("iframe");
	iframe.src = url + "#_prefetched_" + depth;
	iframe.width = iframe.height = 0;
	iframe.style.display = 'none';
	iframe.frameborder = 0;
	document.body.appendChild(iframe);
}

var prefetch_depth = 0;
if(self.document.location.hash.search("_prefetched_") >= 0)
	prefetch_depth = parseInt(self.document.location.hash.substring(self.document.location.hash.search("_prefetched_") + "_prefetched_".length));

function body_onload() {
	if(prefetch_depth < 5) {
		var obj = document.getElementById("nextref");
		if(obj)
			prefetch(obj.href, prefetch_depth + 1);
	}

	if(prefetch_depth == 0 && typeof gmaps_initialize !== 'undefined') {
		gmaps_initialize();
	}
}
</script>
</head><body onkeydown="body_onkeydown(window.event);" onload="body_onload();">
<?php
		return true;
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

	$default_quali = 80;
	$default_size = 0.25;

	function handle_file($dir, $file, $size, $quali, $type) {
		global $default_quali, $default_size;
		if(!$quali || !is_numeric($quali) || $quali <= 5) $quali = $default_quali;
		if(!$size || !is_numeric($size) || $size <= 0) $size = $default_size;
		
		$quali = round($quali);
		if($size > 1) $size = round($size);
		
		switch($size) {
		case 0.25:
		case 0.5:
		case 0.75:
		case 1:
		case 100:
			break; // all ok
		default:
			show_error_custom("Bad size", "Size " . (string) $size . " is not allowed.");
			return;
		}

		if($type == "pic")
			show_image($dir."/".$file, $size, $quali);
		else
			show_image_html($dir, $file, $size, $quali);	
	}

//----------------------------------------------------------

	$web_root = "../pics/"; // Ort: pics/
	$query = $_REQUEST;

	$dir = rawurldecode($query["dir"]);
	if(isset($query["file"])) $file = $query["file"]; else $file = NULL;
	if($file) $file = rawurldecode($file);

	if(isset($query["quali"])) $quali = $query["quali"]; else $quali = NULL;
	if(isset($query["size"])) $size = $query["size"]; else $size = NULL;
	if(isset($query["type"]))
		$type = strtolower($query["type"]);
	else
		$type = NULL;

	if(strpos($dir."/".$file, "..") !== false) {
		show_error_hack();
	}
	else
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

	//phpinfo();
	//print_r($query);

?>

