<?php
	$dbonly = 1;
	include("head.php");
	$dbonly = 0;

	$apply = $_REQUEST['apply'];
	$name = $_REQUEST['name'];
	$room = $_REQUEST['room'];
	$del = $_REQUEST['del'];
	$ips = $_REQUEST['ips'];

	if(strlen($room))
	{
		if($apply)
		{
			if(strlen($name) < 2)
				$error = "room name too short";
			else
			{
				if($name != $room)
				{
					$res = mysql_query("SELECT * FROM roomips WHERE room = '".$name."'");
					if(mysql_num_rows($res))
						$error = "room already exists";					
				}
			}

			if(!$error)
			{
				mysql_query("UPDATE roomips SET room='$name', ip='$ips' WHERE room='$room'");
				header("Location: ./");
			}
		}
		if($del)
		{
			mysql_query("DELETE FROM roomips WHERE room='$room'");
			header("Location: ./");
		}

		$res = mysql_query("SELECT room, ip FROM roomips WHERE room = '".$room."'");
		list($name, $ips) = mysql_fetch_row($res);
	}
	else if($apply)
	{
		if(strlen($name) < 2)
			$error = "room name too short!";
		else
		{
			$res = mysql_query("SELECT * FROM roomips WHERE room = '".$name."'");
			if(mysql_num_rows($res))
				$error = "room already exists!";
			else
			{
				mysql_query("INSERT roomips (room, ip, enabled) VALUES ('$name', '$ips', 0)");
				header("Location: ./");
			}
		}
	}
?>
<?php $title = "Modify/Add Room"; include("head.php") ?>
<br><br>
<form method="post" action="modify_room.php">
<input type="hidden" name="apply" value="1">
<input type="hidden" name="room" value="<?php echo $room ?>">
<table width="400" align="center" border="0">
<tr><td>Room Name:</td><td><input type="text" name="name" value="<?php echo $name ?>"></td></tr>
<tr><td>IPs:</td><td><textarea name="ips"><?php echo $ips ?></textarea></td></tr>
<tr><td>
<?php if(strlen($room)) { ?>
<a href="modify_room.php?room=<?php echo $room ?>&del=1">Delete Room</a>
<?php } ?>
</td>
<td align="right"><input type="submit" value="Apply"></td></tr>
</table>
</form>
<?php if($error) echo "<font color=\"#FF0000\">$error</font>"; include("foot.php") ?>
