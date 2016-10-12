<?php
session_start(); // Session Start Karna Zaroori hota hai :P
if (strtolower($_GET['captcha']) == strtolower($_SESSION["custom_captcha"])){
	echo "OK";
}
?>