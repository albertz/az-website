<?php
// libs.php - not realy a library, but some helper functions
// needs nothing

// gets a raw query string an returns an array-set
function parse_query_string($query) {
	$return_val = array();

	foreach (explode('&', $query) as $key => $value) {
		list($attribute, $attribute_value) = explode('=', $value);
		$return_val[$attribute] = $attribute_value;
	}

	return($return_val);
}

// gets an array-set of query-params and returns a raw query string
function create_query_string($query_ar) {
	$return_val = "";

	foreach ($query_ar as $key => $value) {
		if($return_val != "")
			$return_val = $return_val . "&";
		if($key != "")
			$return_val = $return_val . $key . "=" . $value;
	}

	return $return_val;
}

// get some color "#rrggbb" and multiplies it with $scal
function color_mulinvers($col, $scal) {
	// read them
	$r = hexdec( substr($col, 1, 2) );
	$g = hexdec( substr($col, 3, 2) );
	$b = hexdec( substr($col, 5, 2) );

	// 'mul-invers' them
	$r = 255 - $r; $g = 255 - $g; $b = 255 - $b;
	$r *= $scal; $g *= $scal; $b *= $scal;
	if($r > 255) $r = 255;
	if($g > 255) $g = 255;
	if($b > 255) $b = 255;
	$r = 255 - $r; $g = 255 - $g; $b = 255 - $b;

	// make them websafe-colors
	$r = ( round($r/51) * 51 );
	$g = ( round($g/51) * 51 );
	$b = ( round($b/51) * 51 );
	
	return "#" .
		str_pad(dechex($r), 2, '0', STR_PAD_LEFT) .
		str_pad(dechex($g), 2, '0', STR_PAD_LEFT) .
		str_pad(dechex($b), 2, '0', STR_PAD_LEFT);
}

?>
