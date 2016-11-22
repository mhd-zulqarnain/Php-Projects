<?php

include 'inc/Connection.php'; // Connecting With Database

	$tbl="books";		//your table name
	$new_url = "";
	$cat_dfnd = isset($_GET{'category'} );

	if($cat_dfnd)								
		$cat = $_GET['category'];
	else 
		$cat = 'all' ;	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	   if($_SERVER['QUERY_STRING'] && $cat_dfnd)
	   	$query = "SELECT COUNT(*) FROM $tbl where `cat_id` = $cat";
	   else
	   	$query = "SELECT COUNT(*) FROM $tbl";

	   $total_pages = mysqli_fetch_array(mysqli_query($db,$query));
	   $total_pages = $total_pages[0];

	   /* Setup vars for query. */
	$url = "index.php"; 			//your file name  (the name of this file)
	$limit = 12; 						//how many items to show per page

	if( isset($_GET{'page'} ) )								
		$page = $_GET['page'];
	else 
		$page = 0 ;	


	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	if($_SERVER['QUERY_STRING'] && $cat_dfnd)
		$sql = "SELECT * FROM $tbl where `cat_id` = $cat LIMIT $start, $limit";
	else 
		$sql = "SELECT * FROM $tbl LIMIT $start, $limit";
	
	$result = mysqli_query($db,$sql);
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1


	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/

	$pagination = "";
	if($lastpage > 1 && $total_pages > $limit)
	{	
		$pagination .= "<ul class=\"pagination\">";
		//previous button
		$page > 1 ? $prev = $prev :  $prev = 1;

		if(isset($_GET{'category'} )) $new_url = "$url?page=$prev&category=$cat";
		else $new_url = "$url?page=$prev";

		$pagination.= "
		<li>
			<a href=\"$new_url\" aria-label=\"Previous\">
				<span aria-hidden=\"true\">&laquo;</span>
			</a>
		</li>";

		//Page buttons
		for ($counter = 1; $counter <= $lastpage; $counter++)
		{
			if ($counter == $page)
				$pagination.= "<li class=\"active\"><span>$counter</span></li>";
			else
			{
				if( isset($_GET{'category'} ) )
					$pagination.= "<li><a href=\"$url?page=$counter&category=$cat\">$counter</a></li>";
				else 
					$pagination.= "<li><a href=\"$url?page=$counter\">$counter</a></li>";
			}
		}
		//Next button
		$page < $lastpage ? $next = $next : $next = $lastpage;

		if(isset($_GET{'category'} )) $new_url = "$url?page=$next&category=$cat";
		else $new_url = "$url?page=$next";
		$pagination.= "
		<li>
			<a href=\"$new_url\" aria-label=\"Next\">
				<span aria-hidden=\"true\">&raquo;</span>
			</a>
		</li>";
	}

	

	$pagination.= "</ul>";		
	?>