<?php
include 'inc/pagination.php';
?>
<table class="table">
	<thead>
		<tr>
			<th></th>
			<th>Title</th>
			<th>Author</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php
		while($row = $result->fetch_assoc())
		{
			$id = $row["book_ID"];
			printf("
				<tr> 
					<td>  </td>
					<td> %s </td>
					<td> %s </td>
					<td> 
						<a href ='detail.php?id=$id'><input type='button' name='details' value='View Details' class='btn'></a>
					</td>
				</tr>",
				//htmlentities($row["book_ID"]),
				htmlentities($row["book_title"]),
				htmlentities($row["book_author"])
				);
		}
		?>
		<tfoot>
			<tr>
				<td></td>
				<td></td>
				<td><?=$pagination; $db->close();?></td>
				<td></td>
			</tr>
		</tfoot>
	</tbody>
</table>

