<?php
include 'assets/Partial/connection.php';
$conn = myConnection();
/**
 * Created by PhpStorm.
 * User: zulup
 * Date: 9/3/2016
 * Time: 6:59 PM
 */

if(isset($_POST['data']) == 'comment_data'){
    $comt = $_POST['content'];
    $mail = $_POST['email'];
    $name = $_POST['name'];
    $id = $_POST['id'];
    $date = date("Y-m-d");

    if($comt != '' && $mail != '' && $name != '' && $id != '' && $date != ''){
        $sql="INSERT INTO comment (Pid,description,Pdate,name,email) VALUES ('$id','$comt','$date','$name','$mail')";

        if($conn->query($sql))
        {
            echo  "form subbmit successfully";
        }
        else {
            echo  "please try again later,";
        }
    }
}