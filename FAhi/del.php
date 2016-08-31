<?php
$name=$_GET['test'];
$class=$_GET['class'];


$servername="localhost";
$password="";
$username="root";
$dbname="home";
$conn= new mysqli($servername,$username,$password,$dbname);

$sql="INSERT INTO student(Name,Class) VALUES ('$name','$class')";
if($conn->query($sql))
{
echo "Working";
}
?>