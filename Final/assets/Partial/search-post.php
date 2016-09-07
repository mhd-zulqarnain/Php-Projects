<?php
//if(isset($_POST['name'])){
include 'connection.php';
$conn=myConnection();
$name=$_POST['postname'];
//$sql="Select * from post WHERE title LIKE '%$name%'";
$sql="Select post.*,post_view.count from post LEFT JOIN post_view ON post.Pid=post_view.Pid  WHERE title LIKE '%$name%'";
$result=$conn->query($sql);
include 'post-show.php';
?>
