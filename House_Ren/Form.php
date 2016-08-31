
<?php
session_start();
if(isset ($_SESSION['username'])) {


    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <link rel="stylesheet" href=" assets/lib/bootstrap.min.css">
        <link rel="stylesheet" href=" assets/lib/bootstrap-theme.css">
        <!--    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">-->
        <link rel="stylesheet" href="assets/lib/font-awesome.min.css">
        <link href=" assets/style/custom.css" rel="stylesheet">
    </head>
    <body>

    <?php

    if (isset($_REQUEST['id']))
    $id=$_REQUEST['id'];
    else
        $id="No value set";
    if (isset($_POST['submit'])) {

        $conn = mysqli_connect("localhost", "root", "", "project");
       $h_num = $_REQUEST['H_num'];
        $name = $_SESSION['username'];
        $status = 1;

        $date = date("Y.m.d");
        $sql = "INSERT INTO customer(username,house_num,Date) VALUES ('$name','$h_num','$date')";
        if ($conn->query($sql))
            echo "value stored";
    }
    ?>
    <header class="site-header ">
        <div class="site-nav-wrap">
            <div class="container ">

                <nav class="navbar-collapse collapse site-nav">
                    <!--<div class="row">-->
                    <ul class="nav navbar-nav pull-left">
                        <li><a href="index.php"> Home</a></li>
                        <li><a href="">For sell </a></li>
                        <li><a href="Rent.php">For Rent </a></li>
                        <li class=""><a href=""> About</a></li>
                    </ul>
                    <!--</div>-->
                </nav>

            </div>
        </div>
    </header>
    <div class="site-title-wrap">
        <div class="container">
            <h1> HOUSE&RENTEL AGENCY</h1>
            <h3><span class="site-wrap-span">AT YOUR DOORSET</span>
            </h3>
            <span class="line-break"> </span>
        </div>
    </div>


    <section class="container">
        <form role="form" action="Form.php" method="post">
            <div class="form-group">
                <label for="name">Username:</label>
                <input type="TEXT" disabled class="form-control" name="name" value="<?php echo $_SESSION['username'] ?>">
            </div>
            <div class="form-group">
                <label for="NIC">Date</label>
                <input type="datetime" disabled class="form-control" placeholder="NIC" name="date" value="<?php echo date("Y.m.d"); ?> ">
            </div>
            <div class="form-group">
                <label for="house num">House Number:</label>
                <DIV><?php echo $id; ?></DIV>
                <input type="HIDDEN" class="form-control" name="H_num" value="<?php echo $id; ?>">
            </div>
            <input type="submit" class="btn btn-default" name="submit">
        </form>
        </div>
    </section>

    <div class="site-footer">
        <div class="container" style="align-items: left">
            <ul class="nav navbar-nav pull-left">
                <li class="fa fa-camera-retro" style="font-size: 15px;color: greenyellow"><a href="#"></a></li>
                <li class="fa fa-calculator"><a href="#"></a></li>
            </ul>
        </div>
    </div>
    </body>
    </html>
    <?php
}
else
{
    header("location:Login_User.Partial");

}
    ?>