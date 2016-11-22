<?php
$dbName 	= "booklib"	 ;
$dbServer   = "localhost";
$dbUserName = "root"	 ;
$dbPassword = ""		 ;

$db = new mysqli($dbServer, $dbUserName, $dbPassword, $dbName);

if ($db->connect_errno) 
{
	exit("Data Base Connection Failed. Reason: " .$db->connect_error);	
}

?>
