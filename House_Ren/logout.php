<!--<!DOCTYPE html>-->
<!--<head>-->
<!--    -->
<!--</head>-->
<!--<html>-->
<!--<body>-->
<!---->



<?php
if(isset($_SESSION['username'])) {
    $name = $_SESSION['username'];


    ?>

    <div>
        <a><?php echo $name?></a>
    </div>

    <?php
}
else{

   ?>

    <div>
        <a  href="Login_User.php">Login</a>
    </div>

    <?php
}
?>
<!--</body>-->
<!--</html>-->


