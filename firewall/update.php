<?php
	$title = "Update Iptable Rules";
	$nodb = 1;
	include("head.php");
?>

<center>
<code>update-firewall script is running ...

<?php
	system("sudo /usr/sbin/update-firewall");
?>

ready</code>

<br><br>
<a href="show.php">Show Iptable Rules</a>
</center>

<hr>

<center><a href="./">Return</a></center>

<?php
	include("foot.php");
?>
