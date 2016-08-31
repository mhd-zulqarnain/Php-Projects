<?php

$name= $_GET['name'];

$servername="localhost";
$username="root";
$password="";
$dbname="24";


$conn= new mysqli($servername,$username,$password,$dbname);

if(!$conn)
    echo("Error");
else
{
 $sql="DELETE FROM student WHERE NAME ='$name' ";
    if ($conn->query($sql) == TRUE)
        echo("<br> RECORD NAMED  $name DELETED");
    else
        echo ("Record not found");

}
?>