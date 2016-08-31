<?php
$name=$_GET['name'];
$class=$_GET['class'];

$conn=mysqli_connect("localhost","root","","test");

if($conn)
    $sql= "INSERT into info(Name,Class) VALUES ('$name','$class')";
if($conn->query($sql)==true)
    echo ("record stored")
?>