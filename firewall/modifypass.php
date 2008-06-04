<?php
	$dbonly = 1;
	include("head.php");
	$dbonly = 0;

	$apply = $_REQUEST['apply'];
	$password = $_REQUEST['password'];
	$password2 = $_REQUEST['password2'];

	if($apply)
	{
		if($password != $password2)
			$error = "passwords do not match";
		else if(strlen($password) < 4)
			$error = "password has to be at least 4 characters long";
		else
		{
			$f = fopen(".htpasswd", "w");
			fwrite($f, ":" . crypt($password));
			fclose($f);

			header("Location: ./");
		}
	}
?>
<?php $title = "Change Password"; include("head.php") ?>
<br><br>
<form method="post" action="modifypass.php">
<input type="hidden" name="apply" value="1">
<table width="400" align="center" border="0">
<tr><td>New Password:</td><td><input type="password" name="password"></td></tr>
<tr><td>Repeat Password:</td><td><input type="password" name="password2"></td></tr>
<tr>
<td></td>
<td align="right"><input type="submit" value="Apply"></td></tr>
</table>
</form>
<?php if($error) echo "<font color=\"#FF0000\">$error</font>"; include("foot.php") ?>
