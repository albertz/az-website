<?php
// head.php - the head of my displayed stuff
// params wanted: $titel, $titel2, $description
//   $titel : <title> of the page
//   $titel2 : title shown on top
//   $description : used for meta-tagging
// set values: $tcolor, $hcolor, $bgcolor, $acolor, $aacolor, $avcolor, $ahcolor
//   $tcolor : base-color for body
//   $hcolor : color for h1,...,h6 (titles)
//   $bgcolor : background-color
//   $acolor : link-color
//   $aacolor : link-color when activated
//   $avcolor : link-color when visited
//   $ahcolor : link-color when mouse is over
//   $usegooglegadgets : if they should be included or not
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
<head>
<title><?php echo $titel; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="author" content="Albert Zeyer">
<meta name="keywords" content="<?php echo $titel; ?>,Albert Zeyer">
<?php if($description != "") { ?>
<meta name="description" content="<?php echo $description; ?>">
<?php } ?>
<link rel="home" title="Webserver of Albert Zeyer" href="http://www.az2000.de/">
<link rel="start" title="Webserver of Albert Zeyer" href="http://www.az2000.de/">
<?php

srand();

// calculate the colors

/* //tcolor for dark bg
switch(rand(1,3)) {
case 1: $tcolor = '#FFFFFF'; break; //white
case 2: $tcolor = '#66FFFF'; break; //hell blue
case 3: $tcolor = '#00FF00'; break; //green
} */

switch(rand(1,5)) {
case 1: $tcolor = '#000000'; break; //black
case 2: $tcolor = '#006600'; break; //dark green
case 3: $tcolor = '#333333'; break; //dark grey
case 4: $tcolor = '#0000DD'; break; //dark blue
case 5: $tcolor = '#777700'; break; //braun
}

// $bgcolor = '#333333'; //dark grey
$bgcolor = '#FFFFFF'; //white
$acolor = '#0000FF'; //blue
$avcolor = $acolor;
$ahcolor = $acolor;
$avcolor = $acolor;
$aacolor = $acolor;
$hcolor = '#111111'; //dark something

?>
<style type="text/css">
<!--
body,td,th,p {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: medium;
	color: <?php echo $tcolor; ?>;
}
body {
	background-color: <?php echo $bgcolor; ?>;
}
a:link {
	color: <?php echo $acolor; ?>;
	text-decoration: underline;
}
a:visited {
	color: <?php echo $avcolor; ?>;
	text-decoration: underline;
}
a:hover {
	color: <?php echo $ahcolor; ?>;
	text-decoration: none;
}
a:active {
	color: <?php echo $aacolor; ?>;
	text-decoration: underline;
}
h1,h2,h3,h4,h5,h6 {
	font-weight: bold;
	color: <?php echo $hcolor; ?>;
}
h1 {
	font-size: large;
}
h2 {
	font-size: medium;
}
-->
</style>
</head>
<body>

<table cellspacing="0" cellpadding="0" width="100%">
<tr><td><h1><?php echo $titel2; ?></h1></td>
<td align="right">
<?php
$usegooglegadgets = true;
if ( isset($_SERVER['HTTPS']) || strtolower($_SERVER['HTTPS']) == 'on' )
{
	echo '<b><i>https</i></b>';
	$usegooglegadgets = false;
}
else
{
	// Doesn't work well together with Google gadgets.
/*	echo '<a href="https://';
	echo $_SERVER["HTTP_HOST"];
	echo $_SERVER["REQUEST_URI"];
	echo '">activate <b>https</b></a>'; */
}
?>
</td></tr>
</table>

<hr>

<?php if($usegooglegadgets) { ?>

<!-- Include the Google Friend Connect javascript library. -->
<script type="text/javascript" src="http://www.google.com/friendconnect/script/friendconnect.js"></script>
<!-- Define the div tag where the gadget will be inserted. -->
<div id="div-2672630853770555690"></div>
<!-- Render the gadget into a div. -->
<script type="text/javascript">
var skin = {};
skin['BORDER_COLOR'] = '#cccccc';
skin['ENDCAP_BG_COLOR'] = '#e0ecff';
skin['ENDCAP_TEXT_COLOR'] = '#333333';
skin['ENDCAP_LINK_COLOR'] = '#0000cc';
skin['ALTERNATE_BG_COLOR'] = '#ffffff';
skin['CONTENT_BG_COLOR'] = '#ffffff';
skin['CONTENT_LINK_COLOR'] = '#0000cc';
skin['CONTENT_TEXT_COLOR'] = '#333333';
skin['CONTENT_SECONDARY_LINK_COLOR'] = '#7777cc';
skin['CONTENT_SECONDARY_TEXT_COLOR'] = '#666666';
skin['CONTENT_HEADLINE_COLOR'] = '#333333';
skin['POSITION'] = 'bottom';
skin['DEFAULT_COMMENT_TEXT'] = '- add your comment here -';
skin['HEADER_TEXT'] = 'Comments';
google.friendconnect.container.setParentUrl('/' /* location of rpc_relay.html and canvas.html */);
google.friendconnect.container.renderSocialBar(
 { id: 'div-2672630853770555690',
   site: '08163282174927477210',
   'view-params':{"scope":"PAGE","allowAnonymousPost":"true","features":"video,comment","showWall":"true"}
 },
  skin);
</script>

<?php } ?>
