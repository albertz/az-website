<?php
// main.php - displays the hole site
// needed params: $id, $start_titel
//   $id : id of folder in database; collects everything with parent_id = $id
//   $start_titel : text before real title shown on top of the page
// optional params: $listing_*
//   $listing_type_titel : the titel of items (default = "Name")
//   $listing_showdate : if I should show the date (defalt = true)
//   $listing_sorting : if I should sort the stuff (default = true)
//   $listing_sortby : sort by what (default = $query["sort"])
//   $listing_order : sort order (default = $query["order"])
// set values: $query, $raw_query, $url_only
//   $query : array of url params
//   $raw_query : string of the query
//   $url_only : url without query ($url_only."?".$raw_query == URL)


	include("sql.php"); // sql-shit (connect to, functions to get)
	include("libs.php"); // some helper-functions

    if(!isset($_REQUEST['lang']))
        $lang = "en";
    else
    switch(strtolower($_REQUEST["lang"])) {
    case "en": case "de":
        $lang = strtolower($_REQUEST["lang"]);
        break;
    }

//	$raw_query = $_SERVER["REDIRECT_QUERY_STRING"]; // if it is a hacked 403 or something
	$raw_query = $_SERVER["QUERY_STRING"]; // real url param-string
	$query = parse_query_string($raw_query); // makes an array of url params

	// get $myurl without url params
	$url_only = $_SERVER['SCRIPT_NAME'];
	$url_only = preg_replace("/\/index\.php$/", "/", $url_only);

	// load title
	if($db_online) {
        	$res = mysql_query(
			"SELECT name,description FROM content WHERE id = $id" );
        	list($titel, $description) = mysql_fetch_row($res);
	} else {
		if($id == $main_id) {
			$titel = $_SERVER["HTTP_HOST"];
		} else if($id == $projects_id) {
			$titel = "Projects";
		} else {
			$titel = "X";
		}
	}

	$titel = str_replace("%HOST%", $_SERVER["HTTP_HOST"], $titel);
	$titel2 = "$start_titel" . $titel;
	include("head.php");

	if(!isset($listing_type_titel))		
		$listing_type_titel = "Name";
	if(!isset($listing_showdate))
		$listing_showdate = true;
	if(!isset($listing_sorting))
		$listing_sorting = true;
	if(!isset($listing_sortby))
		$listing_sortby = isset($query["sort"]) ? $query["sort"] : "";
	if(!isset($listing_order))
		$listing_order = isset($query["order"]) ? $query["order"] : "";
	include("listing.php");

	// while there aren't any ...
	// include("op_nodes.php");

	
	$leader_titel = "Administrator:";
	$leaders = array(
		'Albert Zeyer
		(<a href="mailto:albzey@gmail.com">Mail</a>)');
	include("foot.php");
?>

