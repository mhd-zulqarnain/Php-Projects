<?php


$servername="localhost";
$username="root";
$password="";
$dbname="24";

$conn=new mysqli($servername,$username,$password,$dbname);
if(!$conn){
    echo ("Error");
}
else
    echo ("Working");

?>