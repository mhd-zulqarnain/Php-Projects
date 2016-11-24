<?php
include 'function/function.php';
session_start();
if($_SESSION['vid']!=""){

    $vid=$_SESSION['vid'];
    setOffline($vid);
    session_destroy();
     echo $pp=$_REQUEST['pp'];
    if (is_numeric($pp)) {
       header("location:index.php");
    } else {
        header("location:login.php");
    }

    ;
}


?>