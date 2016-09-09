<?php 
include('includes/conn.php');
 if(isset($_GET['edit']))
 {
	 if(isset($_POST['update']))
	 {
		$editId= $_GET['edit'];
		$name= $_POST['name'];
		$price= $_POST['price'];
		$que = "update product set Name='$name',Price='$price' where Id=$editId";
		$run = mysqli_query($conn,$que);
		if($run)
		{
			header('location:view.php');
		}
		else
		{
			echo "Error in query";
		}			
	 } 
 }	 
?>
<html>
	<body>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<form method="Post" action="#">
			<table align="center">
				<tr>
					<td>Enter name</td><td><input type="text" name="name"/></td>
				</tr>
				<tr>
					<td>Enter Price</td><td><input type="text" name="price"/></td>
				</tr>
				<tr>
					<td><input type="submit" name="update"/></td><td><p><?php echo @$msg;?></p></td>
				</tr>
			</table>
		</form>
	</body>
</html>