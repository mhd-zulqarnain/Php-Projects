<div class="page-header">
	<h1 align="center"><span class="label label-info">Categories</span></h1>
</div>
<div class="nav-sidebar">
	<ul class="nav nav-pills nav-stacked list-group">
		<?php
		$table = 'categories';

		$query = "Select * from $table ";
		$result = $db->query($query);
		$url = "index.php?category=";
		while ($row = $result->fetch_assoc())
		{
			$cat = $row["cat_id"];
			if( isset($_GET{'category'} ) )
			{
				if($cat == $_GET['category'])
				{
					$active = "<li class = \"active\"><a href=\"$url$cat\"> %s </a></li>";
					printf($active,htmlentities($row["cat_name"]));
					continue;
				}			
			}
			printf("<li><a href=\"$url$cat\"> %s </a></li>",htmlentities($row["cat_name"]));
		}?>
	</ul>
</div>