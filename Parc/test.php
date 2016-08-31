<?php

echo($name=$_GET['name']);
echo("<br>");
echo($class=$_GET['class']);


$servver="localhost";
$username="root";
$password="";
$dbname="tesst";
$conn= new mysqli($servver,$username,$password,$dbname);
/*if(!$conn)
echo("Error");
else
echo("working");
*/

$sql="INSERT INTO info(Name,Class)
  VALUE('$name','$class' ) ";

if(!$conn->query($sql))
 echo("Error occured");
?>