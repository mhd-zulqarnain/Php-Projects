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
include 'assets/php/connection.php';
$conn=mysqli_connect("localhost","root","","rental");;
$sql="SELECT *FROM house";
$result=mysqli_query($conn,$sql);

?>
<header class="site-header ">
    <div class="site-nav-wrap">
        <div class="container">

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

    <section class="container  site-motive">

        <div class="col-lg-4">
            <h2>PROPERTIES<br> FOR RENT</h2>

        </div>
        <div class="col-lg-7">
            <p>I'm a paragraph. Click here to add your own text and edit me. It’s easy.
                Just click “Edit Text” or double click me to add your own content and make changes to the font.
                I’m a great place for you to tell a story and let your users know a little more about you.</p>
        </div>

    </section>
<?php
while($row=mysqli_fetch_array($result)) {
$id=$row['Pro_id'];
$p_id = $row['Prop_num'];
$p_des = $row['Prop_Des'];
$p_img = $row['Prop_img_path'];
?>
<section class="Post">
    <div class="container post1">
        <div class="row">
            <div class=" col-lg-6 pull-left site-post-img"><img  src="<?php echo $p_img?>"></div>
            <hr>
            <div class="col-lg-6 pull-right site-post-content">
                <h2>Property no. <?php echo $p_id?></h2>
               <span class="r-button">
                   <a href="Form.php?id=<?php echo $p_id?>">GET ON RENT</a>
               </span>
                <h5>Number of Room 5<br>Location Gulshan<br> Price $3453<br>Desinged by VERD</h5>
                <p> <?php echo $p_des?></p>  </div>

        </div>
</section>

<?php
}
?>



<div class="site-footer">
    <div class="container" style="align-items: left">
        <ul class="nav navbar-nav pull-left">

            <li ><?php include 'logout.php';?></li>
            <li class="fa fa-calculator fa-3x"><a href="#"></a></li>

        </ul>
    </div>
</div>
</body>
</html>