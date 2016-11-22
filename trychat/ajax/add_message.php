<?php
session_start();

if(isset($_POST['msg']))
{
    include '../FbChatMock.php';
    $id=$_SESSION['id'];
    $message=$_POST['msg'];
     $obj = new FbChatMockup();
     $result=$obj->addmessage($id,$message);
    
}

?>