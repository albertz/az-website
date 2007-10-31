<?php
// counter.php - it's an counter
// needs nothing

// entry in content-table: Parent-ID=0; Name="COUNTER"; Description=Count

if($db_online) {

srand();

$res = mysql_query(
	"SELECT description " .
	"FROM content " .
	"WHERE parent_id = 0 and name='COUNTER'");
if($row = mysql_fetch_row($res)) {
	//$row[0] : description (counter)
	$count = $row[0];
	$count = $count + 1;
	mysql_query(
		"UPDATE content ".
		"SET description = '$count' ".
		"WHERE parent_id = 0 and name='COUNTER'");

	echo "<p>";

	if($lang == "en") {
		echo "You are the ";
	} else {
		switch(rand(1,3)) {
		case 1: echo "Du bist "; break;
		case 2: echo "Sie sind "; break;
		case 3: echo "Ihr seid "; break;
		}
		echo "der ";
	}

	echo "<b>".$count."</b>";

	if($lang == "en") {
		echo "th ";

		switch(rand(1,8)) {
		case 1: echo "visitor, who "; break;
		case 2: echo "webrobot, which "; break;
		case 3: echo "human, who "; break;
		case 4: echo "thing, which "; break;
		case 5: echo "object, which "; break;
		case 6: echo "girl, who "; break;
		case 7: echo "boy, who "; break;
		case 8: echo "guy, who "; break;
		}

		switch(rand(1,4)) {
		case 1: echo "was able to find this site."; break;
		case 2: echo "was not scared by this site."; break;
		case 3: echo "loves this site."; break;
		case 4: echo "looks closely at this site."; break;
		}

	} else { // $lang=="de"
		echo ". ";

		switch(rand(1,6)) {
		case 1: echo "Besucher, "; break;
		case 2: echo "Besichter, "; break;
		case 3: echo "Betrachter, "; break;
		case 4: echo "Mensch, "; break;
		case 5: echo "Webroboter, "; break;
		case 6: echo "Typ, "; break;
		}	
	
		switch(rand(1,4)) {
		case 1: echo "der so intelligent war, "; break;
		case 2: echo "der so schlau war, "; break;
		case 3: echo "der so geschickt war, "; break;
		case 4: echo "der so trickreich war, "; break;
		}
	
		switch(rand(1,5)) {
		case 1: echo "diese Seite zu besuchen."; break;
		case 2: echo "diese Seite aufzusuchen."; break;
		case 3: echo "diese Seite zu betrachten."; break;
		case 4: echo "wertvolle Informationen hier zu sammeln."; break;
		case 5: echo "diese Seite im WWW zu finden."; break;
		}
	}

	echo "</p>\n";

} //get result on db-query

} //$db_online
?>
