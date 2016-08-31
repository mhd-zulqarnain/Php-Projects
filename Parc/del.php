<?php

$name= $_GET['name'];
$ser="localhost";
$user="root";
$pass="";
$db="24";

$conn= new mysqli($ser,$user,$pass,$db);

if($conn)
echo "Connected";

$sql="DELETE FROM `info` WHERE Name='$name'";

if ($conn->query($sql) == TRUE)
echo "Sql working";


?>