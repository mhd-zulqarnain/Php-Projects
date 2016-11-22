<?php
include 'function/function.php';
session_start();
if($_SESSION['vid']!=""){

    $vid=$_SESSION['vid'];
    setOffline($vid);
    session_destroy();
     $pid=$_REQUEST['pid'];
    if (is_numeric($pid)) {
        header("location:details.php?&id=$pid");
    } else {
        header("location:login.php");
    }

    ;
}


?>