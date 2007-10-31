<br>

<center><b>define forwards</b></center><br>

<form method="post" action="./">
<input type="hidden" name="apply_forward" value="1">
<table width="400" align="center" border="0">
<tr>
<td></td>
<td></td>
<td align="right"><a href="modify_forward.php"><nobr>Add Entry</nobr></a></td>
</tr>
<tr><td colspan="3"><hr></td></tr>
<?php
	$apply = $_REQUEST['apply_forward'];

	// Liste ausgeben

	$res = mysql_query("SELECT service, sport, cip, cport, prot, enabled FROM forwards");

	while(list($service, $sport, $cip, $cport, $prot, $enabled) = mysql_fetch_row($res))
	{
		// evtl. Aenderungen an (De)Aktivierungen uebernehmen
		
		if($apply)
		{
			$forward_enabled = $_REQUEST[$service];
			if(!$forward_enabled)
				$forward_enabled = 0;

			mysql_query("UPDATE forwards SET enabled=".$forward_enabled." WHERE service='$service'");
			$enabled = $forward_enabled;
		}


		echo '
<tr><td rowspan="2" width="0%" valign="top"><input type="checkbox" 
name="'.$service.'" value="1" ';
		if($enabled)
			echo 'checked';
		echo '></td>
 <td width="100%"><b>'.$service.'</b></td>
<td align="right">
<a href="modify_forward.php?service='.$service.'">Modify</a></td></tr>
<tr><td><font size="-1">'.strtoupper($prot).' *:'.$sport.' to '.$cip.':'.$cport.'</font></td></tr>';
	}

?>
<tr><td colspan="3" align="right"><input type="submit" value="Apply"></td></tr>
</table>
</form>

<br>
<hr>


