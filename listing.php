<?php
// listing.php - lists content from mysql-db bei parent-id
// needed parameter:
//   $id : the id of the folder in the db
//   $listing_type_titel : title of the elements in my list
//   $listing_showdate : shows the date column
//   $listing_sorting : give user-control to sort
//   $listing_sortby : one of {name, url, desc, date}
//   $listing_order : one of {asc, desc}
//   $query : array of http params

// check sorting
switch($listing_sortby) {
	case "date":
	case "name":
	case "url":
		$sortby = $listing_sortby;
		break;
	case "desc":
		$sortby = "description";
		break;
	default:
		$sortby = "date";
}
switch($listing_order) {
	case "asc":
	case "desc":
		$sortorder = strtoupper($listing_order);
		break;
	default:
		$sortorder = "DESC";
}

// order it, in every case (also with $listing_sorting == false)
$sortstring = "ORDER BY $sortby $sortorder";

// set table header strings
$tmp_query = $query;
unset($tmp_query["sort"]);
$tmp_raw_query = create_query_string($tmp_query);
$myurl = $url_only . "?" . $tmp_raw_query;

$th_name = $listing_type_titel;
$th_url = "URL";
$th_desc = "Description";
$th_date = "Date";

if( $listing_sorting ) {
$tmp_query = $query;

unset($tmp_query["order"]);
$tmp_raw_query = create_query_string($tmp_query);
$myurl = $url_only . "?" . $tmp_raw_query;

} // $listing_sorting ?>

<?php
function make_entry($name, $url, $desc, $date = "0000.00.00") {
	global $listing_showdate;
	global $d;
	if(!$d) {
		class Data {
			public $data = array();
			public $index = 0;
		    function read() {
		        if($index < count($data)) {
					$entry = $data[$index];
					$index++;
					return $entry;
				}
				return False;
		    }
		}
		$d = new Data();
	}
	$d->data[] = $url;
}

	$loop = true;
	if($db_online) {
		// get the shit
        	$res = mysql_query(
			"SELECT name, url, description, date, marking " .
			"FROM content " .
			"WHERE parent_id = $id " .
			"$sortstring" );
	} else { // no db online, has to hack a little bit
		include("mysql_fileio.php");
		/* if($id == $projects_id) {
			$d = dir(".");
		} else if($id == $main_id) {
			//make_entry("Projekte", "projects", "my projects");
			//make_entry("Artwork", "artwork", "my artwork");
			//$loop = false;
			$d = dir(".");
		} else { ?>
			<div class="error-no-content">no content in offline version</div>
			<?php
			$loop = false;
		} */
		$d = dir(".");
	}

	while($loop) {
	if($db_online) {
		if($row = mysql_fetch_row($res)) {
			$e_name = $row[0];
			$e_link = $row[1];
			$e_desc = $row[2];
			$e_date = $row[3];
			$e_mark = $row[4];
		} else // no more rows
			break;
	} else { // not $db_online
		if($f = $d->read()) { // we get one more entry in the dir
			$e_link = ""; // will set it in the following
		if($f == "..") {
			if($id != $main_id) {
				$e_link = "../";
				$e_name = "..";
				$e_desc = "back to main-site";
				$e_date = "0000-00-00";
				$e_mark = 100;
			}
		} else
		if(is_dir($f))
		if(substr($f,0,1) != ".")
		if(file_exists($f . "/mysql.name"))
		if($f != "default") {
			$f = $f . "/";
			$e_link = $f;
			$e_name = read_from_file($f . "mysql.name");
			$e_desc = read_from_file($f . "mysql.description");
			$e_date = read_from_file($f . "mysql.date");
			$e_mark = read_from_file($f . "mysql.marking");
		} } else // no more directory content
			break;
	}
	
	if($e_link != "") {
?>
<div class="listing-entry"
	style="color: <?php echo color_mulinvers($tcolor, $e_mark/100); ?>;">
<a class="lentry-title"
	style="color: <?php echo color_mulinvers($acolor, $e_mark/100); ?>;"
	href="<?php echo $e_link; ?>">
<?php echo $e_name; ?></a>

<span class="lentry-description"
	style="color: <?php echo color_mulinvers($tcolor, $e_mark/100); ?>;">
<?php echo $e_desc; ?></span>

<?php if( $listing_showdate ) { ?>
<span class="lentry-date">
<?php echo $e_date; ?></span>
<?php } // $listing_showdate ?>

</div>

<?php
	} }
?>

