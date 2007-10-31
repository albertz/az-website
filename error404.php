<?php
// error404.php - replacement for 404 error
// nothing wanted

	// it's not an error anymore
	header ("HTTP/1.1 200 OK", true);
?>

<html>
<head>
<title>Error 404 - Seite nicht gefunden</title>
</head>

<body><center>
<p>
Die aufgerufene Seite wurde leider nicht gefunden. Vermutlich wurde sie 
verschoben oder du bist einfach völlig falsch hier.
</p>
<hr>
<p>
<a href="http://www.az2000.de/">Home</a>
</p>
</center></body>
</html>
