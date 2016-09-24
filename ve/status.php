<?php
  require("database.php");
  
  // require POST request
  if ($_SERVER['REQUEST_METHOD'] != "POST") die;

  $number = mysql_real_escape_string($_POST["phone_number"]);
  $result = db(sprintf("select * from numbers where phone_number='%s'", $number));

  $json = array();
  $json["status"] = "unverified";
  if($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    if ($line["verified"] == "1") {
      $json["status"] = "verified";
    }
  }

  mysql_close();

  header('Content-type: application/json');
  echo(json_encode($json));
?>