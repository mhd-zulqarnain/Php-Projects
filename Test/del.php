<?php
$name=$_GET['name'];

$servername="localhost";
$password="";
$username="root";
$dbname="24";
strtoupper('$name');
$conn= new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error)
    echo("Error occur ".$name);
else
    $sql= " DELETE FROM student WHERE name='$name'";

if($conn->query($sql)==TRUE)
    echo ("<br> RECORD NAMED  $name DELETED");
else
    echo ("<br>Error!!")
?>