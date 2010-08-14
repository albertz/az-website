<?php
// foot.php - the foot
// wanted: $leader_titel, $leaders
//   $leader_titel : title for the leaders
//   $leaders : array of the leaders of the page
?>

<p>
<?php
switch($lang) {
case "de": echo "Falls Sie meine Arbeit unterstützen wollen, bitte spenden Sie via Flattr hier: ";
default: echo "If you want to support my work, please donate via Flattr here: ";
}

$url = ($_SERVER['HTTPS'] != "on") ? "http://" : "https://";
$url .= $_SERVER["HTTP_HOST"];
$tmp = explode("?", $_SERVER["REQUEST_URI"]);
$url .= $tmp[0];

// TODO: as long as we don't have separate Flattr buttons:
$url = "http://www.az2000.de/";
?>
<span style="display: inline-block; vertical-align: middle; height: 60px;">
<a class="FlattrButton" style="display:none;"
 href="<?php echo $url; ?>"
 title="<?php echo $titel; ?>"
 lang="<?php echo ($lang == "de") ? "de_DE" : "en_US"; ?>">
 revv="flattr;category:rest"
  <?php echo $description; ?>
</a>
</span></p>
<script type="text/javascript">
function loadFlattr() {
	if(typeof(FlattrLoader) == "undefined")
		setTimeout(loadFlattr, 100);
	else
		FlattrLoader.setup();
}
loadFlattr();
</script>

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

<h2>Quote of the day</h2>
<p><i><?php system("cat /etc/qotd"); ?></i></p>

<h2>Uptime</h2>
<p><?php system("uptime");?></p>

</body>
</html>
