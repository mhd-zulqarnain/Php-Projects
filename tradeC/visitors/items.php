<?php
include("function/function.php");
session_start();
if($_SESSION['vid']!="")
{
    $vid=$_SESSION['vid'];

    headder();

    echo'

 '.sideBar().'

        <div class="col-lg-10" style="border-bottom: 1px solid red">
        <h2>ALL ADS</h2>
        </div>
        <div class="col-lg-10 wrapper">
        ';

    echo' <div class="col-lg-12 cus-action">';

    cusPro($vid);
    buy($vid);
    footer();
}else{
    header("location:../login.php");
}

?>