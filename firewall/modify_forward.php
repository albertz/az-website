<?php
	$dbonly = 1;
	include("head.php");
	$dbonly = 0;

	$apply = $_REQUEST['apply'];
	$name = $_REQUEST['name'];
	$service = $_REQUEST['service'];
	$del = $_REQUEST['del'];
	$sport = $_REQUEST['sport'];
	$cip = $_REQUEST['cip'];
	$cport = $_REQUEST['cport'];
	$prot = $_REQUEST['prot'];
	if($prot == "") $prot = "tcp";

	if(strlen($service)) //existierender Eintrag
	{
		if($apply)
		{
			if(strlen($name) < 2)
				$error = "service name too short";
			else
			{
				if($name != $service)
				{
					$res = mysql_query("SELECT * FROM forwards WHERE service = '".$name."'");
					if(mysql_num_rows($res))
						$error = "service already exists";					
				}
			}

			if(!$error)
			{
				mysql_query("UPDATE forwards SET service='$name', sport='$sport', cip='$cip', cport='$cport', prot='$prot' WHERE service='$service'");
				header("Location: ./");
			}
		}
		if($del)
		{
			mysql_query("DELETE FROM forwards WHERE service='$service'");
			header("Location: ./");
		}

		$res = mysql_query("SELECT service, sport, cip, cport, prot FROM forwards WHERE service = '".$service."'");
		list($name, $sport, $cip, $cport, $prot) = mysql_fetch_row($res);
	}
	else if($apply) //neuer Eintrag - Apply
	{
		if(strlen($name) < 2)
			$error = "service name too short!";
		else
		{
			$res = mysql_query("SELECT * FROM forwards WHERE service = '".$name."'");
			if(mysql_num_rows($res))
				$error = "service already exists!";
			else
			{
				mysql_query("INSERT forwards (service, sport, cip, cport, prot, enabled) VALUES ('$name', '$sport', '$cip', '$cport', '$prot', 0)");
				header("Location: ./");
			}
		}
	}
?>
<?php $title = "Modify/Add Room"; include("head.php") ?>
<br><br>
<form method="post" action="modify_forward.php">
<input type="hidden" name="apply" value="1">
<input type="hidden" name="service" value="<?php echo $service ?>">
<table width="400" align="center" border="0">
<tr><td>Service:</td><td><input type="text" name="name" value="<?php echo $name ?>"></td></tr>
<tr><td>Protokoll:</td><td>
<input type="radio" name="prot" value="tcp" <?php if($prot == "tcp") echo "checked"; ?> >TCP 
<input type="radio" name="prot" value="udp" <?php if($prot == "udp") echo "checked"; ?> >UDP 
</td></tr>
<tr><td>Server-Port:</td><td><input type="text" name="sport" value="<?php echo $sport ?>"></td></tr>
<tr><td>Client-IP:</td><td><input type="text" name="cip" value="<?php echo $cip ?>"></td></tr>
<tr><td>Client-Port:</td><td><input type="text" name="cport" value="<?php echo $cport ?>"></td></tr>
<tr><td>
<?php if(strlen($service)) { ?>
<a href="modify_forward.php?service=<?php echo $service ?>&del=1">Delete Service</a>
<?php } ?>
</td>
<td align="right"><input type="submit" value="Apply"></td></tr>
</table>
</form>
<?php if($error) echo "<font color=\"#FF0000\">$error</font>"; include("foot.php") ?>

