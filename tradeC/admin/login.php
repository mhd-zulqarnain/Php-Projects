<?php
session_start();
if(!isset($_SESSION['uid'])) {

	?>
	<!DOCTYPE HTML>
	<html>
	<head>
		<title>Untitled Document</title>
		<link rel="stylesheet" href="login.css" media="all"/>

	</head>

	<body>


	<div class="login">
		<h1>Admin Login</h1>
		<form action="login.php" method="post">
			<input type="text" name="user_name" placeholder="Email" required="required"/>
			<input type="password" name="pass" placeholder="Password" required="required"/>
			<button type="submit" class="btn btn-primary btn-block btn-large" name="submit">Admin Login</button>
		</form>
	</div>
	</body>
	</html>
	<?php
}
else
{
	header("location:index.php");
}
?>
<?php
include "function/function.php";
if(isset($_POST['submit']))
{
	$conn=myConnection();
	$name=$_POST['user_name'];
	$pass=$_POST['pass'];
	$sql="SELECT * from admins WHERE user_name='$name' AND password='$pass'";
	if($row=mysqli_fetch_array($conn->query($sql)))
	{
		$vid=$row['uid'];
		$_SESSION['uid']=$vid;
		header("location:index.php");
	}
	else
		echo "<script>alert('invlid password')</script>";

}

?>




