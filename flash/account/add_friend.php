<?php
include "../control/includes.php";
$sender_id = $db->quote($_SESSION["auth"]["id"]);
$reciever_id = $_POST["add_request"];
$select = $db->query("SELECT * FROM friends_control WHERE
  req_rec_id=$sender_id AND req_sen_id=$reciever_id
  OR
  req_rec_id=$reciever_id AND req_sen_id=$sender_id
  ");
if($select->rowCount() <= 0){
  $db->query("INSERT INTO friends_control SET req_sen_id = $sender_id, req_rec_id = $reciever_id");
  header("location: friends.php");
}else {
  header("location: friends.php");
}
