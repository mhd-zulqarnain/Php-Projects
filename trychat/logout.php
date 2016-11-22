<?php
session_start();
if($_SESSION['id']!=""){
    session_destroy();
    header("location:login.php");
}

session_destroy();

?>