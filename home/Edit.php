<?php
$name = $_GET['name'];
$id = $_GET['id'];

$servername = "localhost";
$password = "";
$username = "root";
$dbname = "home";
$conn = new mysqli($servername, $username, $password, $dbname);
if(!$conn)
    echo ("Connection error");

$sql="UPDATE student SET Name ='$name' WHERE id=$id";
//UPDATE MyGuests SET lastname='Doe' WHERE id=2
//$sql="INSERT into student (id, Name) VALUES ($id,$name) ON DUPLICATE KEY UPDATE id=21,Name='Mohammad' ";

if(!$conn->query($sql))
    echo ("not working");
else
    echo ("Record updated");
?>