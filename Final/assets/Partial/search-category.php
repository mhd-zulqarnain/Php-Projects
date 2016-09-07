<?php
include 'connection.php';
$category=$_REQUEST['category'];
//echo "<script>alert('$category')</script>";
$conn=myConnection();
//$sql="Select * from post WHERE category='$category'";
$sql = "Select * from post LEFT JOIN post_view ON post.Pid=post_view.Pid WHERE category='$category'";
$result=$conn->query($sql);
include 'post-show.php';

?>

