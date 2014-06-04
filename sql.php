<?php
// sql.php - connect to db and set db helper functions
// need params: $link
//   $link : if set to false, i won't connect to the db
// I set params for you: $db_online, $main_id, $projects_id
//   $db_online : false, if connection failes, true otherwise
//   $main_id : id of the main-site
//   $projects_id : id of the projects-site

// MySQL-data:
//  DB: homepage
//  table: content

if(!isset($sql_is_included)) {

	$db_online = true;
	$main_id = 1;
	$projects_id = 2;
		
	include("/etc/mysql.php");
	$db_online = false;		
	if(!function_exists("mysql_connect")) {
		$db_off_reason = "MySQL support not available in PHP (mysql_connect not available).";
    } else if(!is_callable("mysql_connect")) {
		$db_off_reason = "MySQL support not available in PHP (mysql_connect not callable).";
	} else {
		$link = @mysql_connect("localhost", $mysql_user, $mysql_pass);
		if(!$link) {
			$db_off_reason = "Cannot connect to MySQL server: " . @mysql_error();
		} else {
			$db_online = true;
			mysql_select_db("homepage");
		}
	}

	function DB_GetName($id) {
		$res = mysql_query("SELECT name FROM content WHERE id = $id");
		$row = mysql_fetch_row($res);
		return $row[0];
	}

	function DB_GetDescription($id) {
		$res = mysql_query("SELECT description FROM content WHERE id = $id");
		$row = mysql_fetch_row($res);
		return $row[0];
	}
		
	function DB_GetID__URL($parent_id, $url) {
		$url = str_replace("/", "", $url);
		$url2 = $url."/";
		$res = mysql_query("SELECT id FROM content WHERE parent_id = $parent_id AND url = '$url' OR url = '$url2'");
		if($row = mysql_fetch_row($res)) {
			return $row[0];
		} else {
			return -1;
		}
	}

	function DB_GetID__FullURL($url) {
		if($url[0] == "/")
			$url = substr($url, 1);
		if(substr($url, strlen($url) - 1) != "/")
			$url = $url."/";
		$id = 1;
			
		while($p = strpos($url, "/")) {
			$id = DB_GetID__URL($id, substr($url, 0, $p));
			$url = substr($url, $p + 1);
		}

		return $id;
	}

	$sql_is_included = 1;
}

?>
