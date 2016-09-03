<?php

session_start();
if(isset($_SESSION['name'])!="") {
    ?>
    <?php include('assets/Partial/header.php') ?>
    <?php include('assets/Partial/search-post.php') ?>
    <?php include 'assets/Partial/footer.php'?>

    <?php
}
else
    header("location:assets/Partial/login.php");
?>
