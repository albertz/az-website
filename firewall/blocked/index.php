<html>
<head><title>Verbindung gesperrt / Access Blocked</title></head>
<?php
	$ip = $_SERVER["REMOTE_ADDR"];
?>
<body bgcolor="#FFFFFF">

<p><b>Verbindung gesperrt / Access Blocked</b></p>
<p>Die Internetverbindung f&uuml;r Ihren Rechner wurde von der AZ&amp;TR 
Firewall gesperrt. Der IP ihres Rechners ist <code><?php echo $ip ?></code>.</p>
<p>Klicken Sie auf Aktualisieren um den Browser die M&ouml;glichkeit zu geben die Internetseite neu zu laden...</p>
<hr>
<p>Internet access for your computer has been blocked by the AZ&TR 
firewall. Your computer's IP is <code><?php echo $ip ?></code>.</p>
<p>Feel free to click your browser's Reload button once in a while
 to check for connectivity...</p>
<hr>

<table width="100%"><tr>
<td align="left"><a href="http://www.az2000.de/" target="_top">Homepage</a></td>
<td align="right"><i>AZ&TR Firewall</i></td>
</tr></table>

<hr>
<p>
Quote of the day:<br>
<i><?php system("/usr/games/bin/sex"); ?></i>
</p>

</body>
</html>
