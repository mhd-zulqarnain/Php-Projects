<?php
$con=mysqli_connect("localhost","root","","24");

if(isset($_POST['data']) == "access")
{
 echo($_POST['value']);
    exit;
//    header("location:../function.php");
   $value=$_POST['value'];
    $sql="insert into pic(ext) VALUES(1) ";
    if($con->query($sql)){
        header("location:function.php");
    }
}

?>