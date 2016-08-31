<?php
$name=$_GET['name'];
$class=$_GET['class'];



$servver="localhost";
$username="root";
$password="";
$dbname="home";

$conn=new mysqli($servver,$username,$password,$dbname);
if(!$conn)
    echo("Error");
else
 {
    $sql = "INSERT INTO student (Name ,Class)
      VALUES  ('$name','$class')";
    if($conn->query($sql))
        echo ("Values \" $name $class \" Stored");
    else
        echo ("Error");
 }
    ?>