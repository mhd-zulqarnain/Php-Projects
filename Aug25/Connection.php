<?php
function connect(){
    
    $sever="localhost";
    $user="root";
    $pass="";
    $db="home";
    return mysqli_connect($sever,$user,$pass,$db);
}

?>