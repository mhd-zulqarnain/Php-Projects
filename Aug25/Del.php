<?php
$id=$_REQUEST['id'];
include 'Connection.php';
$conn=connect();
$sql="Delete FROM student WHERE id='$id'";
if($conn->query($sql))
{
    header("location:index.php");
}
else
{
    echo "no run";
}
?>