<?php
// libs.php - not realy a library, but some helper functions
// needs nothing

// gets a raw query string an returns an array-set
function parse_query_string($query) {
	$return_val = array();

	foreach (explode('&', $query) as $key => $value) {
		if(strpos($value, '=') === false) continue;
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

?>
