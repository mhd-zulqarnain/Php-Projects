<?php

function connect_db(){
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="full";
    return mysqli_connect($servername,$username,$password,$dbname);
}
?>