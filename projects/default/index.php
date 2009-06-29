<?php
	include("../../sql.php");
	include("../../functions.php");
	include("../default/text.php");
	
	// TODO: does this handling of request-variables in a special file
	$url = $_SERVER["REQUEST_URI"];
	$paramof = strrpos($url, "?");
	if(! $paramof === false)
		$url = substr($url, 0, $paramof);
	$lastdirof = strrpos($url, "/");
	if(! $lastdirof === false)
		$url = substr($url, 0, $lastdirof+1);

	switch(strtolower($_REQUEST["lang"])) {
	case "en": case "de":
		$lang = strtolower($_REQUEST["lang"]);
		break;
	default:
		$lang = "en";
	}

	if($db_online) {
		$id = DB_GetID__FullURL($url);
		$titel = DB_GetName($id);
		$description = DB_GetDescription($id);
	} else {
		include("../../mysql_fileio.php");
		$id = 0;
		$titel = read_from_file("mysql.name");		
		$description = read_from_file("mysql.description");
	}	
	$titel2 = $titel2 . $titel;
	include("../../head.php");

	$file = "main." . $lang . ".php";
	if(!file_exists($file)) {
		$file = "main.en.php"; 
		if(!file_exists($file))
			$file = "main.php";
	}

	
	if(file_exists($file)) {
		$showing_main_file = true;
		include($file);
	} else {
		$showing_main_file = false;
?>

<?php
	$file = "desc.txt";
	if(!file_exists($file))
		$file = "mysql.description";
	if(file_exists($file)) {
?>
<p>
<b>Description</b><br>
<?php include($file); ?>
</p>
<?php } ?>

<p>
<b>Files</b><br>
<?php
	ListFiles("."); //current web-dir, _not_ from linked-file (other to includes)
?>
</p>

<?php
	} // end of else-part of if(file_exists($file))

if($usegooglegadgets) {
?>
<hr>
<!-- Include the Google Friend Connect javascript library. -->
<script type="text/javascript" src="http://www.google.com/friendconnect/script/friendconnect.js"></script>
<!-- Define the div tag where the gadget will be inserted. -->
<div id="div-6390427437317162913" style="width:600px;border:1px solid #cccccc;"></div>
<!-- Render the gadget into a div. -->
<script type="text/javascript">
var skin = {};
skin['FONT_FAMILY'] = 'verdana,sans-serif';
skin['BORDER_COLOR'] = '#cccccc';
skin['ENDCAP_BG_COLOR'] = '#e0ecff';
skin['ENDCAP_TEXT_COLOR'] = '#333333';
skin['ENDCAP_LINK_COLOR'] = '#0000cc';
skin['ALTERNATE_BG_COLOR'] = '#ffffff';
skin['CONTENT_BG_COLOR'] = '#ffffff';
skin['CONTENT_LINK_COLOR'] = '#0000cc';
skin['CONTENT_TEXT_COLOR'] = '#333333';
skin['CONTENT_SECONDARY_LINK_COLOR'] = '#7777cc';
skin['CONTENT_SECONDARY_TEXT_COLOR'] = '#666666';
skin['CONTENT_HEADLINE_COLOR'] = '#333333';
skin['DEFAULT_COMMENT_TEXT'] = '- add your review/comments here -';
skin['HEADER_TEXT'] = 'Ratings or comments';
skin['POSTS_PER_PAGE'] = '10';
google.friendconnect.container.setParentUrl('/' /* location of rpc_relay.html and canvas.html */);
google.friendconnect.container.renderReviewGadget(
 { id: 'div-6390427437317162913',
   site: '08163282174927477210',
   'view-params':{"disableMinMax":"false","scope":"SITE","allowAnonymousPost":"true","startMaximized":"true"}
 },
  skin);
</script>
<?php
} // $usegooglegadgets

	include("../default/copyright.php");
	include("../default/other.php");
	include("../../foot.php");
?>

