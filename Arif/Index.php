<?php
session_start();
include_once 'dbconnect.php';

if(isset($_SESSION['userSession'])!="")
{
    header("Location: home.Partial");
    exit;
}

if(isset($_POST['btn-login']))
{
    $email = mysqli_real_escape_string($conn, trim($_POST['user_email']));
    $upass = mysqli_real_escape_string($conn, trim($_POST['password']));

    $sql = "SELECT * FROM users WHERE email='$email'";

    $query = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($query);

    if(password_verify($upass, $row['password']))
    {
        $_SESSION['userSession'] = $row['user_id'];
        header("Location: home.Partial");
    }
    else
    {
        $msg = "email or password does not exists !";
    }

    mysqli_close($conn);

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Coding Cage - Login & Registration System</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet" media="screen">

    <link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<div class="signin-form">

    <div class="container">


        <form class="form-signin" method="post" id="login-form">

            <h2 class="form-signin-heading">Sign In.</h2><hr />

            <?php
            if(isset($msg)){
                echo $msg;
            }
            ?>

            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email address" name="user_email" required />
                <span id="check-e"></span>
            </div>

            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" name="password" required />
            </div>

            <hr />

            <div class="form-group">
                <button type="submit" class="btn btn-default" name="btn-login" id="btn-login">
                    <span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
                </button>

                <a href="register.php" class="btn btn-default" style="float:right;">Sign UP Here</a>

            </div>
        </form>
    </div>
</div>
</body>
</html>