<?php
include "../control/includes.php";
$connected_id = $_SESSION["auth"]["id"];
$delete_id = $_POST["delete_friend"];
$db->query("DELETE FROM friends_control WHERE (req_rec_id = $connected_id AND req_sen_id = $delete_id) OR (req_rec_id = $delete_id AND req_sen_id = $connected_id)");
header("location: friends.php");
