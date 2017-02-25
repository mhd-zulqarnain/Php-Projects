<?php

$con =mysqli_connect("localhost","root","","user");

$sql="SELECT * FROM login ";

$run=$con->query($sql);

if($row=mysqli_fetch_array($run))
    {
     echo $row['username'];   
 echo $row['password']; 
    }
    else
	{
        echo "error";
   
}


?>
