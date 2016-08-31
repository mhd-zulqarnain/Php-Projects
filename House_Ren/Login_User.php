<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href=" assets/lib/bootstrap.min.css">
    <link rel="stylesheet" href=" assets/lib/bootstrap-theme.css">
    <!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">-->
    <link rel="stylesheet" href="assets/lib/font-awesome.min.css">
    <link href=" assets/style/custom.css" rel="stylesheet">
</head>
<body>
<header class="site-header ">
    <div class="site-nav-wrap">
        <div class="container ">



        </div>
    </div>
    <div class="site-title-wrap">
        <div class="container">
            <h1> HOUSE&RENTEL AGENCY</h1>
            <h3><span class="site-wrap-span">AT YOUR DOORSET</span>
            </h3>
            <span class="line-break"> </span>
        </div>
    </div>

</header>
<div class="site-title-slider-convas">
    <div class="col-lg-6 col-lg-offset-3">
        <form role="form" action="Login_User.php" method="post">
            <div class="form-group">
                <label class="Name">USERNAME</label>
            </div>
            <input class="form-control" type="text" name="username" >
            <div class="form-group">
                <label class="password">PASSWORD</label>
                <input class="form-control" type="password" name="password">
            </div>

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default">Submit</button>
            </div>
        </form>
    </div>

</div>

<?php

if(isset($_POST['submit']))
{
    $conn=mysqli_connect("localhost","root","","project");
    $sql="SELECT* FROM user WHERE username='".$_POST['username']."'AND password='".$_POST['password']."'";
    $conn->query($sql);
    $result=mysqli_query($conn,$sql);

    if($row=mysqli_fetch_array($result))
    {

        session_start();
        $_SESSION[' ']=$_POST['username'];
        if($row['usertype']=="admin")
            header("location:admin.Partial");
        else
            header("location:index.Partial");


    }
    else {
        if ($row['usertype'] != "admin")
            ?>
            <div class="alert-danger col-lg-6 col-lg-offset-3">Invalid password or username</div>
            <?php
    }
}
?>


<div class="clearfix"></div>
<div class="site-footer navbar-fixed-bottom text-center modal-footer">
    <div class="container">
        <P STYLE="color: white">AKSDJFKS</P>
    </div>
</div>
</body>
</html>