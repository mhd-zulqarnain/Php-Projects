<?php
include "../control/includes.php";
$req_sen_id = $_POST["accept_friend"];
$req_rec_id = $_SESSION["auth"]["id"];
$db->query("UPDATE friends_control SET status=1 WHERE req_rec_id = $req_rec_id AND req_sen_id=$req_sen_id");
header("location: friends.php");
