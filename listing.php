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

// TODO: sorting in offline-version

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

if( $listing_sorting ) { // the user-control-links for sorting followes
if($sortby != "name")
	$th_name = '<a href="'.$myurl.'&sort=name">'.$th_name.'</a>';

if($sortby != "url")
	$th_url = '<a href="'.$myurl.'&sort=url">'.$th_url.'</a>';

if($sortby != "description")
	$th_desc = '<a href="'.$myurl.'&sort=desc">'.$th_desc.'</a>';

if($sortby != "date")
	$th_date = '<a href="'.$myurl.'&sort=date">'.$th_date.'</a>';
}

?>

<table cellspacing="0" cellpadding="10">
<tr>
        <th align="left"><?php echo $th_name; ?></th>
        <th align="left"><?php echo $th_url; ?></th>
        <th align="left"><?php echo $th_desc; ?></th>
<?php if( $listing_showdate ) { ?>
        <th align="left"><?php echo $th_date; ?></th>
<?php } // $listing_showdate

if( $listing_sorting ) {
$tmp_query = $query;

unset($tmp_query["order"]);
$tmp_raw_query = create_query_string($tmp_query);
$myurl = $url_only . "?" . $tmp_raw_query;

if($sortorder == "ASC")
	$th_sort = '<a href="'.$myurl.'&order=desc">desc</a>';
else
	$th_sort = '<a href="'.$myurl.'&order=asc">asc</a>';
?>
        <th align="left"><?php echo $th_sort; ?></th>
<?php } // $listing_sorting ?>
</tr>

<?php
	$loop = true;
	if($db_online) {
		// get the shit
        	$res = mysql_query(
			"SELECT name, url, description, date, marking " .
			"FROM content " .
			"WHERE parent_id = $id " .
			"$sortstring" );
	} else { // no db online, has to hack a little bit
		if($id == $projects_id) {
			include("mysql_fileio.php");
			$d = dir(".");
		} else if($id == $main_id) {
			echo '<tr><td valign="top">';
			echo "Projekte";
			echo '</td>';
			echo '<td valign="top">';
			echo '<a href="projects/">projects/</a>';
			echo '</td>';
			echo '<td valign="top">';
			echo 'meine Projekte';
			echo '</td></tr>';
			$loop = false;			
		} else {
			echo "<tr><td valign='top' colspan='2'>\n";
			echo "no content in offline version\n";
			echo "</td></tr>";	
			$loop = false;
		}
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
			$e_link = "../";
			$e_name = "..";
			$e_desc = "back to main-site";
			$e_date = "0000-00-00";
			$e_mark = 100;
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
		<tr><td valign="top">
	<font color="<?php echo color_mulinvers($tcolor, $e_mark/100); ?>">
	<?php echo $e_name; ?></font></td>
		<td valign="top">
	<?php echo '<a style="color:' .
	color_mulinvers($acolor, $e_mark/100) .
	'" href="' . $e_link . '">' . $e_link . '</a>'; ?></td>
		<td valign="top">
	<font color="<?php echo color_mulinvers($tcolor, $e_mark/100); ?>">
	<?php echo $e_desc; ?></font></td>
<?php if( $listing_showdate ) { ?>
		<td valign="top">
	<font color="<?php echo color_mulinvers($tcolor, $e_mark/100); ?>">
	<?php echo $e_date; ?></font></td>
<?php
	} // $listing_showdate ?>
</tr>
<?php
	} }
?>

</table>

