<br>

<center><b>define rooms</b></center><br>

<form method="post" action="./">
<input type="hidden" name="apply_room" value="1">
<table width="400" align="center" border="0">
<tr>
<td></td>
<td></td>
<td align="right"><a href="modify_room.php"><nobr>Add Room</nobr></a></td>
</tr>
<tr><td colspan="3"><hr></td></tr>
<?php
	$apply = $_REQUEST['apply_room'];

	// Liste ausgeben

	$res = mysql_query("SELECT room, ip, enabled FROM roomips WHERE room != 'any'");

	while(list($room, $ips, $enabled) = mysql_fetch_row($res))
	{
		// evtl. Änderungen an (De)Aktivierungen übernehmen
		
		if($apply)
		{
			$room_enabled = $_REQUEST[$room];
			if(!$room_enabled)
				$room_enabled = 0;

			mysql_query("UPDATE roomips SET enabled=".$room_enabled." WHERE room='$room'");
			$enabled = $room_enabled;
		}


		echo '
<tr><td rowspan="2" width="0%" valign="top"><input type="checkbox" name="'.$room.'" value="1" ';
		if($enabled)
			echo 'checked';
		echo '></td>
 <td width="100%"><b>'.$room.'</b></td>
<td align="right"><a href="modify_room.php?room='.$room.'">Modify</a></td></tr>
<tr><td><font size="-1">'.$ips.'</font></td></tr>
		';
	}

	// "Any" muss speziel behandelt werden

	$res = mysql_query("SELECT room, ip, enabled FROM roomips WHERE room = 'any'");

	while(list($room, $ips, $enabled) = mysql_fetch_row($res))
	{
		// Aenderung
		if($apply)
		{
			$room_enabled = $_REQUEST[$room];
			if(!$room_enabled)
				$room_enabled = 0;

			mysql_query("UPDATE roomips SET enabled=".$room_enabled." WHERE room='$room'");
			$enabled = $room_enabled;
		}

		echo '
<tr><td width="0%" valign="top"><input type="checkbox" name="'.$room.'" value="1" ';
		if($enabled)
			echo 'checked';
		echo '></td><td colspan="2" width="100%"><b>IPs not specified in rooms</b></td></tr>';
	}
?>
<tr><td colspan="3" align="right"><input type="submit" value="Apply"></td></tr>
</table>
</form>

<br>
<hr>

