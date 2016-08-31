<?php

echo ("DATA <br>");
echo $name=$_GET['name'];
echo $age=$_GET['Age'];
echo $gender=$_GET['gender'];
echo ("<br> <br>");
$servername="localhost";
$password="";
$username="root";
$dbbname="24";
$conn= new mysqli($servername,$username,$password,$dbbname);

if($conn->connect_error)
    die("Connection Error");
else
    $sql = "INSERT INTO student (Name, Age, Gender,Country)
VALUES ('$name',$age,'$gender','Pakistan')";

if($conn->query($sql)==TRUE)
{
    echo("New record created ");
}
else
    echo("Error Occurs");

?>