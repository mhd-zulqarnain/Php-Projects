<?php
include 'function/function.php';
if(isset($_Request['vid'])){
    
    $vid=$_REQUEST['vid'];
    $sql="update visotor set verifyed='1' WHERE vid='$vid'";
    Run($sql);
    headder("location:login.php");
}

?>