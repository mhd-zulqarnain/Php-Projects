<?php 
include('includes/conn.php');
 if(isset($_GET['delete']))
 {
	 
		$delId= $_GET['delete'];
		$que = "delete from product where Id=$delId";
		$run = mysqli_query($conn,$que);
		header('location:view.php');
 }	
?>