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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="author" content="Albert Zeyer">
<meta name="keywords" content="<?php echo $titel; ?>,Albert Zeyer">
<?php if($description != "") { ?>
<meta name="description" content="<?php echo $description; ?>">
<?php } ?>
<meta name="viewport" content="width=320;">
<link rel="home" title="Webserver of Albert Zeyer" href="http://www.az2000.de/">
<link rel="start" title="Webserver of Albert Zeyer" href="http://www.az2000.de/">
<link rel="stylesheet" type="text/css" href="/style.css.php">
<style type="text/css"></style>

<script type="text/javascript">
<!--//--><![CDATA[//><!--
    
    (function() {
        var s = document.createElement('script'), t = document.getElementsByTagName('script')[0];
        
        s.type = 'text/javascript';
        s.async = true;
		s.src = 
		<?php echo (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != "on") ? "'http://'" : "'https://'"; ?>
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
	if(!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != "on") {
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
