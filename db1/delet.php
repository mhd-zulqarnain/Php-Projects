<?php
echo "Working"." <br>";


$class=$_GET['class'];


$servername="localhost";
$username="root";
$pass="";
$db="test";

$conn=new mysqli ($servername,$username,$pass,$db);

$sq1="DELETE FROM info WHERE Class='$class'";

$conn->query($sq1);


?> 