<?php
include("function/function.php");
session_start();
if($_SESSION['vid']!="")
{
    $vid=$_SESSION['vid'];
  
headder();

    echo'</div>
        <div class="col-lg-10" style="height:98px;border-bottom: 1px solid red"></div>
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