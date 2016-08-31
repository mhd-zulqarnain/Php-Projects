<?php
$id=$_GET['id'];

$servver="localhost";
$username="root";
$password="";
$dbname="home";
$conn= new mysqli($servver,$username,$password,$dbname);
if(!$conn)
    echo ("Connection Error ".mysqli_connect_errno());
else{
$sql="DELETE FROM  student WHERE id= '$id'";
if(!$conn->query($sql))
    echo ("Error");
}

    ?>