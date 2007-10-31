<?php
// werbung.php - select random werbung/*.php
// nothing else needed

// TODO: it doesn't work on the client because of the hardcoded path...
if($db_online) {

srand();

function endsWith( $str, $sub ) {
   return ( substr( $str, strlen( $str ) - strlen( $sub ) ) === $sub );
}

$list = array();
$d = dir("/var/www/localhost/htdocs/werbung");
while(false !== ($entry = $d->read())) {
switch($entry) {
	case "":
	case ".":
	case "..":
		break;
	default:
		if(endsWith($entry, ".php")) {
			$list[count($list)] = $entry;
		}
} }

?>

<p>
<h2>Empfehlung</h2>
<?php
include("werbung/".$list[rand(0, count($list) - 1)]);
?>
</p>

<?php } ?>
