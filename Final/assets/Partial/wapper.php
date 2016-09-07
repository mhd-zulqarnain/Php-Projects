
<!--Home page-->
<?php
include 'connection.php';
$conn=myConnection();
//$sql="Select * from post";
$sql = "Select post.*,post_view.count from post LEFT JOIN post_view ON post.Pid=post_view.Pid ORDER BY `publishDate` DESC";
$result=$conn->query($sql);
include 'post-show.php';
?>

