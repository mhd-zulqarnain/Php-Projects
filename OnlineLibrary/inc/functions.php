<?php
function get_item_html($id,$item){
	$output =  "<li> 
	<a href='#'><img src='"
		.$item["img"]."' alt='"
		.$item["title"]."' />" 
		. "<p>view details</p>"
		. "</a></li>";
		return $output;
	}

function array_category($catalog,$category){
	$output = array();
	foreach ($catalog as $id => $item) {
		if ($category == null Or strtolower($category) == strtolower($item["category"])) {
			$sort = $item["title"];
			$sort = ltrim($sort, "The ");
			$sort = ltrim($sort, "A ");
			$sort = ltrim($sort, "An ");
			$output[$id] = $sort;
		}
	}
	asort($output);
	return array_keys($output);

}