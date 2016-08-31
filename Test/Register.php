<?php
session_start();
if(isset($_SESSION['userSession'])!="")
{
    header("Location: home.Partial");
}
include_once 'dbconnect.php';

if(isset($_POST['btn-signup']))
{
    $uname = mysqli_real_escape_string($conn, trim($_POST['user_name']));
    $email = mysqli_real_escape_string($conn, trim($_POST['user_email']));
    $upass = mysqli_real_escape_string($conn, trim($_POST['password']));

    $new_password = password_hash($upass, PASSWORD_DEFAULT);

    $check_email_query = "SELECT email FROM users WHERE email='$email'";

    $check_email = mysqli_query($conn, $check_email_query);

    if(mysqli_fetch_row($check_email) == 0){


        $query = "INSERT INTO users(username,email,password) VALUES('$uname','$email','$new_password')";

        if(mysqli_query($conn, $query)){
            $msg = "<div class='alert alert-success'>
                   <span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
                   </div>";
        }
        else
        {
            $msg = "<div class='alert alert-danger'>
                    <span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
                    </div>";
        }
    }
    else{
        $msg = "<div class='alert alert-danger'>
               <span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry email already taken !
               </div>";
    }

    mysqli_close($conn);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login & Registration System</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="style.css" type="text/css" />

</head>
<body>

<div class="signin-form">

    <div class="container">


        <form class="form-signin" method="post" id="register-form">

            <h2 class="form-signin-heading">Sign Up</h2><hr />

            <?php
            if(isset($msg)){
                echo $msg;
            }
            else{
                ?>
                <div class='alert alert-info'>
                    <span class='glyphicon glyphicon-asterisk'></span> &nbsp; all the fields are mandatory !
                </div>
                <?php
            }
            ?>

            <div class="form-group">
                <input type="text" class="form-control" placeholder="Username" name="user_name" required  />
            </div>

            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email address" name="user_email" required  />
                <span id="check-e"></span>
            </div>

            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" name="password" required  />
            </div>

            <hr />

            <div class="form-group">
                <button type="submit" class="btn btn-default" name="btn-signup">
                    <span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account
                </button>

                <a href="Index.php" class="btn btn-default" style="float:right;">Log In Here</a>

            </div>

        </form>
    </div>
</div>
</body>
</html>