<?php
$id=$_REQUEST['id'];
include 'Connection.php';
$conn=connect_db();

$sql="DELETE FROM student WHERE id='$id'";
if($conn->query($sql))
    header("Location:show.php");
else
    echo "error";
?>