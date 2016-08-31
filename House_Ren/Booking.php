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
<?php
session_start();
$_SESSION['username']="arif";
if(isset($_GET['id']))
{
    $sql="INSERT INTO customer ";
    echo "<script>alert('value foun')</script>";



}

?>
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
<div class="col-lg-6 col-lg-offset-3 ">
    <div class="col-lg-4 modal-header">House number</div>
    <div class="col-lg-4 modal-header">Date of issue</div>
    <div class="col-lg-4 modal-header">Action</div>



<?php

$conn=mysqli_connect("localhost","root","","project");
$sql="SELECT* FROM customer";
$conn->query($sql);
$result=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_array($result))
{
    ?>
    <div class="col-lg-4"><?php echo $row['house_num']?></div>
    <div class="col-lg-4"><?php echo $row['Date']?></div>


    <?php
}
?>
</div>

<div class="clearfix"></div>
<div class="site-footer navbar-fixed-bottom text-center modal-footer">
    <div class="container">
        <P STYLE="color: white">AKSDJFKS</P>
    </div>
</div>
</body>
</html>