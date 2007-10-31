<?php
// foot.php - the foot
// wanted: $leader_titel, $leaders
//   $leader_titel : title for the leaders
//   $leaders : array of the leaders of the page
?>

<hr>
<h2><?php echo $leader_titel; ?></h2>
<p>
<?php
	foreach($leaders as $leader) {
		echo $leader."<br>";
	}
?>
</p>

<?php
// until I don't know for sure, that I get something from this
if(0) {
	echo "<hr>";
	include("werbung.php");
}
?>

<hr>
<?php include("counter.php"); ?>

<p>
<h2>Quote of the day</h2>
<i><?php system("cat /etc/qotd"); ?></i>
</p>

<p>
<h2>Uptime</h2>
<?php system("uptime"); ?>
</p>

</body>
</html>

