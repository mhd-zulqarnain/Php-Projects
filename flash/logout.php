<?php
session_start();
include "control/includes.php";
unset($_SESSION["auth"]);
$_SESSION["logedout"] = true;
header("location: index.php");
