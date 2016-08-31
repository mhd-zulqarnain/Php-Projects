<?php
echo("Hello! ");
echo($_GET['firstname']);
echo($_GET['lastname']);
//echo(" your N.I.C NO ");
//echo($_GET['nic']);
//echo(" & your Father Name is ");
//echo($_GET['fathername']);
//echo(" & email ");
//echo($_GET['email']);
//echo(" & address ");
//echo($_GET['address']);
//echo(" & contact Number ");
//echo($_GET['contactnumber']);



//insert queries
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chaseup";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else
{
	$sql = "INSERT INTO tryagain(f_name,l_name) 
	VALUES ('".$_GET['firstname']."', '".$_GET['lastname']."')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
	
}
	 


?>
