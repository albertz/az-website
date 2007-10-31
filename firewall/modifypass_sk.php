<?php
	$password = "31337hck";
	echo $password."\n";
	echo crypt($password)."\n";
	$f = fopen(".htpasswd", "w");
	fwrite($f, ":" . crypt($password));
	fclose($f);
	echo "done";
?>
