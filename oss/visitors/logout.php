<?php
session_start();
if($_SESSION['vid']!=""){
    session_destroy();
    header("location:login.php");
}

?>