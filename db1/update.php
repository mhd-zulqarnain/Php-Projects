<?php
echo "Working"." <br>";


$name=$_GET['yourname'];
$uname=$_GET['upyourname'];


$servername="localhost";
$username="root";
$pass="";
$db="test";

$conn=new mysqli ($servername,$username,$pass,$db);

$sq1="UPDATE info SET Name='$uname' WHERE Name='$name'";

$conn->query($sq1);


?> 