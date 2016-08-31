<?php
$name=$_GET['name'];
$age=$_GET['Age'];
$country=$_GET['Country'];

$male=$_GET['gender'];
$severname="localhost";
$username="root";
$password="";
$dbname="24";

$conn=new mysqli($severname,$username,$password,$dbname);
if($name=="")
  {
	echo("<script>alert('Fill all spaces')</script>");
      echo(" Failed Empty spaces!!!! ");
      exit();
  }
else
 {
	$sql = "INSERT INTO student (Name, Age, Gender,Country)
VALUES ('$name',$age,'$male','$country')";
	
if($conn->query($sql)==TRUE&&$name!="")
   {
 	echo("New record created ");
   }
else
  	echo("Error Occurs\Empty spaces");

 }

?>