<?php
include "../control/includes.php";
$req_rec_id = $_POST["remove_request"];
$req_sen_id = $_SESSION["auth"]["id"];
$frship = $db->query("SELECT * FROM friends_control WHERE
  ((req_rec_id=$req_sen_id AND req_sen_id=$req_rec_id)
  OR
  (req_rec_id=$req_rec_id AND req_sen_id=$req_sen_id))
  AND status = 1
  ");
if ($frship->rowCount() === 0 ) {
$select = $db->query("SELECT * FROM friends_control WHERE (req_rec_id=$req_sen_id AND req_sen_id=$req_rec_id) OR (req_rec_id=$req_rec_id AND req_sen_id=$req_sen_id)");
  if($select->rowCount() >= 1 ){
    $db->query("DELETE FROM friends_control WHERE (req_rec_id=$req_sen_id AND req_sen_id=$req_rec_id) OR (req_rec_id=$req_rec_id AND req_sen_id=$req_sen_id)");
    header("location: friends.php");
}else {
  header("location: friends.php");
}
}else {
  header("location: friends.php");
}
