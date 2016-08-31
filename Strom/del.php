<?php
$name= $_REQUEST['id'];
$servername = "localhost";
$password = "";
$username = "root";
$dbname = "24";
$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn)
    echo("Error occur " . mysqli_error());
else{
    if(isset($_REQUEST['id'])){
        {
            $sql = " DELETE FROM info WHERE id='$name'";

            if ($conn->query($sql) == TRUE)
                echo("<br> RECORD NAMED  $name DELETED");
        }
    }
    else
    {
    echo ' id not found';    
        
    }
}
?>        