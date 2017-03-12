<?php
function get_by_username ($db, $username){
  $username = $db->quote($username);
  $select_users = $db->query("SELECT * FROM users WHERE username=$username");
  if($select_users->rowCount() >= 1){
    return $select_users->fetch();
  }else {
    return array();
  }
}
function get_by_id ($db, $id){
  $id = $db->quote($id);
  $select_users = $db->query("SELECT * FROM users WHERE id=$id");
  if($select_users->rowCount() >= 1){
    return $select_users->fetch();
  }else {
    return array();
  }
}

function valid_username($db, $username){
  $username = $db->quote($username);
  $select = $db->query("SELECT username FROM users WHERE username=$username");
  if ($select->rowCount() >= 1 ) {
    return true;
  }else{
    return false;
  }
}

function is_friends($db,$req_rec_id, $req_sen_id){
  $select = $db->query("SELECT * FROM friends_control WHERE
    req_rec_id=$req_rec_id AND req_sen_id=$req_sen_id
    OR
    req_rec_id=$req_sen_id AND req_sen_id=$req_rec_id
    ");
   if($select->rowCount() >= 1 ) {
      $select = $select->fetch();
      if($select["status"]){
        return 1;
      }else {
        return $select;
      }
   }else {
       return 0;
   }
}

function get_friends($db, $id){
  $friends = $db->query("SELECT * FROM friends_control WHERE (req_rec_id = '$id' OR req_sen_id = '$id') AND status = 1");
  if ($friends->rowCount() >= 1 ) {
    return $friends->fetchAll();
  }else {
    return null;
  }
}

function is_liked($db, $like_owner_id, $like_post_id){
  $select = $db->query("SELECT * FROM likes_control WHERE like_owner_id=$like_owner_id AND like_post_id=$like_post_id");
  if ($select->rowCount() >= 1 ) {
    return true;
  }else {
    return false;
  }
}

function debug($arr){
  echo "<pre>",print_r($arr, true),"</pre>";
}
