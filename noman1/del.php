<?php

echo( $name=$_GET['roll']);

$servver="localhost";
$username="root";
$password="";
$dbname="tesst";
$conn= new mysqli($servver,$username,$password,$dbname);

$sql="DELETE FROM  info WHERE Roll= '$name'";
if(!$conn->query($sql))
    echo ("Error");
?>