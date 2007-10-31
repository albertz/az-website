<?php
	if(!$nodb)
	{
		mysql_connect("localhost", $mysql_user, $mysql_pass);
		mysql_select_db("firewall");
	}
	else if(!$dbonly)
	{
?>

<html>
<head><title>AZ&amp;TR Firewall - <?php echo $title ?></title></head>
<body>

<br>Version 0.2 - &copy; 2005 AZ&amp;TR
<hr>

<?php } ?>
