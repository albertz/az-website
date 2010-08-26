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
<meta name="viewport" content="width=320;">
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
case 4: $tcolor = '#888800'; break; //dark blue
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
	font-family: Arial, 'Liberation Sans', 'DejaVu Sans', sans-serif;
	font-size: medium;
	color: <?php echo $tcolor; ?>;
}
body {
	background-color: <?php echo $bgcolor; ?>;
}
a:link {
	color: <?php echo $acolor; ?>;
	text-decoration: none;
}
a:visited {
	color: <?php echo $avcolor; ?>;
	text-decoration: none;
}
a:hover {
	color: <?php echo $ahcolor; ?>;
	text-decoration: underline;
}
a:active {
	color: <?php echo $aacolor; ?>;
	text-decoration: none;
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

.listing-entry {
	margin-top: 7px;
	border-bottom: 1px dotted #999;
	overflow: hidden;
}

.lentry-title {
	display: block;
	font-weight: bold;
	margin-bottom: 2px;
}

.lentry-date {
	height: 0px;
	float: right;
	font-size: small;
	color: #999;
}
-->
</style>

<script type="text/javascript">
<!--//--><![CDATA[//><!--
    
    (function() {
        var s = document.createElement('script'), t = document.getElementsByTagName('script')[0];
        
        s.type = 'text/javascript';
        s.async = true;
		s.src = 
		<?php echo ($_SERVER['HTTPS'] != "on") ? "'http://'" : "'https://'"; ?>
        + 'api.flattr.com/js/0.5.0/load.js?uid=albert';
        
        t.parentNode.insertBefore(s, t);
    })();
    
//--><!]]>
</script>

</head>
<body>

<table cellspacing="0" cellpadding="0" width="100%">
<tr><td><h1><?php echo $titel2; ?></h1></td>
<td align="right">
<?php
	if($_SERVER['HTTPS'] != "on") {
		echo '<a href="https://';
		echo $_SERVER["HTTP_HOST"];
		echo $_SERVER["REQUEST_URI"];
		echo '">activate <b>https</b></a>';
	} else {
		echo "<i>https</i>";
	}
?>
</td></tr>
</table>

<hr>
