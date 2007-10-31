<?php
	$title = "Main Page";
	include("head.php");

	include("roomips.php");
	include("forwards.php");
?>

<center><table width="80%"><tr>
<td width="30%"><a href="./">Refresh</a></td>
<td width="40%"><center>
<a href="update.php">Update Iptable Rules</a><br>
(Don't forget but first apply!)
</center></td>
<td align="right"><a href="modifypass.php">Change Password</a></td>
</tr></table></center>

<?php
	include("foot.php");
?>
