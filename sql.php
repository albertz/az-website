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
	if(!function_exists("mysqli_connect")) {
		$db_off_reason = "MySQL support not available in PHP (mysqli_connect not available).";
    } else if(!is_callable("mysqli_connect")) {
		$db_off_reason = "MySQL support not available in PHP (mysqli_connect not callable).";
	} else {
		$db_con = @mysqli_connect("localhost", $mysql_user, $mysql_pass);
		if(!$db_con) {
			$db_off_reason = "Cannot connect to MySQL server: " . @mysql_error();
		} else {
			$db_online = true;
			mysqli_select_db($db_con, "homepage");
		}
	}

	function DB_GetName($id) {
		$res = mysqli_query($db_con, "SELECT name FROM content WHERE id = $id");
		$row = mysqli_fetch_row($res);
		return $row[0];
	}

	function DB_GetDescription($id) {
		$res = mysqli_query($db_con, "SELECT description FROM content WHERE id = $id");
		$row = mysqli_fetch_row($res);
		return $row[0];
	}
		
	function DB_GetID__URL($parent_id, $url) {
		$url = str_replace("/", "", $url);
		$url2 = $url."/";
		$res = mysqli_query($db_con, "SELECT id FROM content WHERE parent_id = $parent_id AND url = '$url' OR url = '$url2'");
		if($row = mysqli_fetch_row($res)) {
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
