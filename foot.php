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
		echo $leader;
	}
?>

<span style="display: inline; overflow: visible;">
<a class="FlattrButton" style="display:none;"
 href="http://www.az2000.de/"
 title="Homepage of Albert Zeyer"
 rev="flattr;category:rest;button:compact;">
Homepage with many open source projects including source code, artworks, both images and music, pictures and some writings about technical stuff, tutorials and some stories.
</a>
</span>
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

<script type="text/javascript">
function loadFlattr() {
	if(typeof(FlattrLoader) == "undefined")
		setTimeout(loadFlattr, 100);
	else
		FlattrLoader.setup();
}
loadFlattr();
</script>

</body>
</html>
