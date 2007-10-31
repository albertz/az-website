<?php
	header ("HTTP/1.1 200 OK", true);
	header ("Accept-Ranges: bytes", true);
	header ("Content-Type: image/gif", true);

	$fp = fopen("error404.gif","rb");
	fpassthru($fp);
?>
