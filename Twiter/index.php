<?php
include "function/function.php";
if(isset($_SESSION['vid'])) {

    header("location:main.php");

}else {

    if (isset($_GET['a'])) {

        echo "<script>alert('succcessfully Registered')</script>";
    }

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

        <script src="js/jquery-3.1.1.min.js"></script>
        <link rel="stylesheet" href="css/bootstrap-theme.css" type="text/css">
        <link rel="stylesheet" href="css/custom.css" type="text/css">
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.js"></script>
    </head>
    <body>

    <nav class="navbar navbar-inverse site-header">
        <div class="container-fluid site-header">
            <div class="navbar-header">
                <a class="navbar-brand fa fa-twitter fa-5x" href="#"></a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#" data-toggle="modal" data-target="#myModal">Sign up</a>

                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">

                            <!-- Sign up-------------------->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Welcome</h4>
                                </div>
                                <form class=" col-lg-12  site-login " action="function/function.php" method="post">
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="email"><h4><b>Sign up</b></h4>
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="email">Name:</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="name" class="form-control" id="email"
                                                   placeholder="Enter your name" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="email">Username:</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="uname" class="form-control" 
                                                   placeholder="Enter username" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="pwd">Password:</label>
                                        <div class="col-sm-12">
                                            <input type="password" name="pass" class="form-control" id="pwd"
                                                   placeholder="Enter password" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" name="S_submit"
                                                    class="btn btn-block btn-primary btn-login"><b>Registor</b></button>
                                        </div>
                                    </div>
                                </form>


                                <div class="modal-footer">
                                </div>
                            </div>
                            <!-- Sign up-------------------->
                        </div>
                    </div>
                </li>
                <li><a href="#">Login</a></li>
            </ul>
        </div>
    </nav>

    <wrapper class="col-lg-12">
        <form class=" col-lg-4 col-lg-offset-4 site-login " action="function/function.php" method="post">
            <div class="form-group">
                <label class="control-label col-sm-12" for="email"><h4><b>Login</b></h4></label>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-12" for="email">Username:</label>
                <div class="col-sm-12">
                    <input type="text" name="user_name" class="form-control" id="email" placeholder="Enter email">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-12" for="pwd">Password:</label>
                <div class="col-sm-12">
                    <input type="password" name="pass" class="form-control" id="pwd" placeholder="Enter password">
                </div>
            </div>
            <br>
            <div class="form-group">
                <div class="col-sm-12">
                    <button type="submit" name="submit" class="btn btn-block btn-primary btn-login"><b>Log in</b>
                    </button>
                </div>
            </div>
        </form>
    </wrapper>


    </body>
    </html>


    <?php

}

    ?>

<script>


</script>
