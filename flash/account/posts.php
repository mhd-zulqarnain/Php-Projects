<?php
include "../control/includes.php";
if (!isset($_POST["post_content"]) || empty($_POST["post_content"])){
  $_SESSION["post_error"] = "error";
  header("location: index.php?error");
  die();
}else {
  $post_owner = $_SESSION["auth"]["id"];
  $post_content = $db->quote(trim($_POST["post_content"]));
  $db->query("INSERT INTO posts SET content=$post_content, owner_id='$post_owner'");
  $_SESSION["post_success"] = "success";
  header("location: index.php?error");
  die();
}
