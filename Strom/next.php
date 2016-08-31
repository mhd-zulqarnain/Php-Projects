<?php

echo (" <br> Data <br><br>");
echo $name=$_GET['name'];
echo ("<br> ");
echo $age=$_GET['Age'];
echo ("<br>");
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
    $sql = "INSERT INTO info (Name, Age, Gender,Country)
VALUES ('$name',$age,'$gender','Pakistan')";

if($conn->query($sql)==TRUE)
{
    echo("New record created ");
}
else
    echo("Error Occurs Enter valid age:");

?>