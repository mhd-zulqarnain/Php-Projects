<?php 
include('includes/conn.php');

?>
<br>
<br>
<br>
<br>
<br>
	<table align="center" border="1" >
		<tr>
			<td>Edit</td><td>Delete</td><td>Id</td><td>Name</td><td>Price</td><td>Image</td>
		</tr>
		<?php 
			$que = "select * from product";
			$run = mysqli_query($conn, $que);
			while($row = mysqli_fetch_array($run))
			{
				$id = $row['Id'];
				$name = htmlentities($row['Name']);
				$price = htmlentities($row['Price']);
				$img = htmlentities($row['image']);
				
				echo "<tr>
						<td><a href='edit.php?edit=$id'>Edit</a></td><td><a href='delete.php?delete=$id'>Delete</a></td><td>$id</td><td>$name</td><td>$price</td><td><img src='$img'  /></td>
					</tr>";
			}		
		?>
	</table>
