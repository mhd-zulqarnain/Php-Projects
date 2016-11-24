<?php
session_start();

require "../chat_class.php";
if(isset($_POST['msg'])) {
//    $vid=$_SESSION['vid'];
    if($_POST['data']=='mesg') {
        $vid = isset($_SESSION['vid']) ? $_SESSION['vid'] : 1;
        $msg = $_POST['msg'];
        $pid = $_POST['pid'];

        $obj = new chat();
        $obj->addMessage($pid, $vid, $msg);
    }

}
?>