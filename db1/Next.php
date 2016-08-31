<?php
echo "Working"." <br>";


$name=$_GET['yourname'];
$class=$_GET['class'];
$roll=$_GET['roll'];

$servername="localhost";
$username="root";
$pass="";
$db="test";

$conn=new mysqli ($servername,$username,$pass,$db);

$sq1="INSERT INTO info (Name,Class,Roll) VALUES ('$name','$class','$roll')";

$conn->query($sq1);


?>