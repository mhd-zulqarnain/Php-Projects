<?php
include "../control/includes.php";
$user_id = $_SESSION["auth"]["id"];
if (isset($_GET["stri"]) && !empty($_GET["stri"])) {
  $post_id = $db->quote($_GET["stri"]);
  $select = $db->query("SELECT * FROM posts WHERE id=$post_id AND owner_id=$user_id");
  if ($select->rowCount() >= 1) {
      $db->query("DELETE FROM posts WHERE id=$post_id");
    $_SESSION["delete_success"] = "success";
    header("location: index.php");
  }else {
    $_SESSION["delete_error"] = "wrong";
    header("location: index.php");
  }
}else {
  $_SESSION["delete_wrong"] = "wrong";
  header("location: index.php");
}
if (isset($_GET["stli"]) && !empty($_GET["stli"])) {
  $post_id = $db->quote($_GET["stli"]);
  if (!is_liked($db, $user_id, $post_id)) {
    $db->query("INSERT INTO likes_control SET like_owner_id='$user_id', like_post_id=$post_id");
    header("location: index.php");
  }
}else {
  header("location: index.php");
}
