<?php
	$title = "Show Iptable Rules";
	$nodb = 1;
	include("head.php");
?>

<pre>
<?php
	system("sudo /sbin/iptables -L");
	system("sudo /sbin/iptables -t nat -L");
?>
</pre>

<hr>

<center><a href="./">Return</a></center>

<?php
	include("foot.php");
?>
