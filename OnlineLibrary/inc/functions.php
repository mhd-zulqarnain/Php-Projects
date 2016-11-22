<?php
include 'Connection.php';
// function get_item_html($item){
// 	$output =  "<li> 
// 	<a href='#'><img src='"
// 		.$item["book_img"]."' alt='"
// 		.$item["book_title"]."' />" 
// 		. "<p>view details</p>"
// 		. "</a></li>";
// 		return $output;
// 	}

// function array_category($catalog,$category){
// 	$output = array();
// 	foreach ($catalog as $id => $item) {
// 		if ($category == null Or strtolower($category) == strtolower($item["category"])) {
// 			$sort = $item["title"];
// 			$sort = ltrim($sort, "The ");
// 			$sort = ltrim($sort, "A ");
// 			$sort = ltrim($sort, "An ");
// 			$output[$id] = $sort;
// 		}
// 	}
// 	asort($output);
// 	return array_keys($output);

// }

function gen_query($cat, $db){
	
	return $result;
}

function gen_ran($cat , $db){

	$imgs = array();
	while ($row = $result->fetch_assoc()) {
		$imgs[] = $row["book_img"];
	}
	$RanImg = array_rand($imgs, 4);
	echo $imgs[$RanImg[0]];
	return $RanImg;
}


class Display {
	$query = "SELECT b.`book_img` FROM books AS b ,categories AS c WHERE c.`cat_id` = b.`cat_ID` AND c.`cat_name` = $cat";
	$result = $db->query($query);

	function gen_ran($cat , $db){

		$imgs = array();
		while ($row = $result->fetch_assoc()) {
			$imgs[] = $row["book_img"];
		}
		$RanImg = array_rand($imgs, 4);
		echo $imgs[$RanImg[0]];
		return $RanImg;
	}
}
