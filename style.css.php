<?php
// style.css.php - stylesheet
// set values: $tcolor, $hcolor, $bgcolor, $acolor, $aacolor, $avcolor, $ahcolor
//   $tcolor : base-color for body
//   $hcolor : color for h1,...,h6 (titles)
//   $bgcolor : background-color
//   $acolor : link-color
//   $aacolor : link-color when activated
//   $avcolor : link-color when visited
//   $ahcolor : link-color when mouse is over
?>
<?php
header('Content-type: text/css');

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
	margin-top: 5px;
	margin-bottom: 2px;
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
