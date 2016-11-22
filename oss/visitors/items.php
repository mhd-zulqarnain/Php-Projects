<?php
include("function/function.php");
session_start();
if($_SESSION['vid']!="")
{
    $vid=$_SESSION['vid'];
  
headder();?>
        <?php cusPro($vid)?>
    <?php  buy($vid);?>
 <?php  
    footer();
}else{
    header("location:../login.php");
}

?>