<?php 
$conn=mysqli_connect("localhost","root","","24");

if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	$price = $_POST['price'];
    $name=$_POST['name'];
	
	$file_name = $_FILES["file"]["name"];
	$file_tmp_name = $_FILES['file']['tmp_name'];   
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$download_path = "downloads/".$file_name;
	$new="downloads/".$file_tmp_name;

	$ext = strtolower(substr(strrchr($file_name, "."), 1));
	if($ext=="jpg"||$ext=='jpeg'||$ext=='png')
	{
		$name=$name.".".$ext;
	}
	else
	{
		echo"<script>alert('invlaid image')</script>";
		exit;
	}
	move_uploaded_file($file_tmp_name, $download_path);

	rename( "downloads/".$file_name,"downloads/".$name);
		$que = "insert into pic(Name,Price,image) Values('$name','$price','$name')";
		$run = mysqli_query($conn,$que);
		if($run)
		{	
			$msg=  " data is Inserted";
		}	
		else
		{
			$msg= " data is not Inserted";
		
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
		<form method="Post" action="index.php" enctype="multipart/form-data">
			<table align="center">
				<tr>
					<td>Enter name</td><td><input type="text" name="name"/></td>
				</tr>
				<tr>	
					<td>Enter Price</td><td><input type="text" name="price"/></td>
				</tr>
				<tr>
					<td>Choose File</td><td><input type="file" name="file"/></td>
				</tr>
				<tr>
					<td><input type="submit" name="submit"/></td><td><p><?php echo @$msg;?></p></td>
				</tr>
			</table>
			<img src="<?php echo "downloads/".$name;?>" />
		
			
		</form>
	</body>
</html>