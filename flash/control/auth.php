<?php
session_start();
if (isset($_SESSION["auth"])) {
	$id= $_SESSION["auth"]["id"];
	$user = $db->query("SELECT * FROM users WHERE id=$id")->fetch();
}
if (!isset($auth)) {
	if((!isset($_SESSION['auth']['username']) && !isset($_SESSION['auth']['password']))
		|| ($_SESSION["auth"]["password"] != $user["password"])
	){
	header("location: ".SCRIPTROOT."index.php");
		die();
	}
}
