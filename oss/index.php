<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="style/bootstrap.min.css" rel="stylesheet">
    <link href="style/main.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <?php include("function/function.php");?>
</head>
<body>
<?php
session_start();
if(isset($_SESSION['vid'])!=""){
$vid=$_SESSION['vid'];            
UpdateStatus($vid);
}
//not expired
?>

<?php

//echo $_SERVER['DOCUMENT_ROOT'].__DIR__;
?>

<div class="container main">
    <div class="col-lg-12">
        <div class="col-lg-4 logo">
            <a href="index.php"> <img src="images/logo.png" style="width: 150px" ></a>
        </div>
        <div class="col-lg-12 header">
            <div class="col-lg-4 country"></div>
            <div class="col-lg-4 pull-right status">
                <form action="" type="POST" class="navbar-form navbar-left site-search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search" name="postname">
                    </div>
                    <button type="submit" class="btn btn-default fa fa fa-search fa-2x " style="font-size: 1.5em;">Search</button>
                </form>

            </div>
        </div>
    </div>

    <div class="col-lg-12 wrapper">
        <div class="col-lg-2 cat">
            <ul>
                <?php getCat()?>
            </ul>
        </div>
        <div class="col-lg-8 product">
            <?php getPro()?>
            <?php getCatPro()?>
        </div>
        <div class="col-lg-2 bet"></div>
    </div>

</div>
</body>
</html>