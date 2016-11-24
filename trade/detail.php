<?php
include "function/function.php";
headder();

if(isset($_SESSION['vid'])!=""){
    $vid=$_SESSION['vid'];

    UpdateStatus($vid);
}

$pid=isset($_REQUEST['pid'])?$_REQUEST['pid']:53;

$sql="Select V.*,P.* from visitor AS V JOIN productdetails AS P ON P.vid=V.vid AND P.pid='$pid'";

$res=Run($sql);
while ($row=mysqli_fetch_array($res)){
    $name=ucfirst($row['p_name']);
    $Owname=ucfirst($row['name']);
    $OwID=ucfirst($row['vid']);
    $price=$row['price'];
    $brand=$row['brand'];
    $phone=$row['ph_number'];
    $email=$row['email'];
    $date=$row['date'];
    $type=$row['type'];
    $location=$row['location'];
    $description=$row['description'];

}

?>
<!-- main -->
<section id="main" class="clearfix details-page">
    <div class="container">
        <div class="breadcrumb-section">
            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php?cat=<?php echo $type?>"> <?php echo $type?></a></li>
                <li><?php echo $name?></li>
            </ol><!-- breadcrumb -->
            <h2 class="title">Mobile Phones</h2>
        </div>

        <div class="section banner">
            <!-- banner-form -->
            <div class="banner-form banner-form-full">
                <form action="index.php">
                    <input type="text" class="form-control" placeholder="Type Your key word" name="keyword">
                    <button type="submit" class="form-control" value="Search">Search</button>
                </form>
            </div><!-- banner-form -->
        </div><!-- banner -->


        <div class="section slider">
            <div class="row">
                <!-- carousel -->
                <div class="col-md-7">
                    <div id="product-carousel" class="carousel slide" data-ride="carousel">
                        <?php
                        proPic($pid);
                        ?>
                        <!--<ol class="carousel-indicators">
                            <li data-target="#product-carousel" data-slide-to="0" class="active">
                                <img src="images/slider/list-1.jpg" alt="Carousel Thumb" class="img-responsive">
                            </li>
                            <li data-target="#product-carousel" data-slide-to="1">
                                <img src="images/slider/list-2.jpg" alt="Carousel Thumb" class="img-responsive">
                            </li>
                            <li data-target="#product-carousel" data-slide-to="2">
                                <img src="images/slider/list-3.jpg" alt="Carousel Thumb" class="img-responsive">
                            </li>
                            <li data-target="#product-carousel" data-slide-to="3">
                                <img src="images/slider/list-4.jpg" alt="Carousel Thumb" class="img-responsive">
                            </li>
                            <li data-target="#product-carousel" data-slide-to="4">
                                <img src="images/slider/list-5.jpg" alt="Carousel Thumb" class="img-responsive">
                            </li>
                        </ol>-->

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <!-- item -->
                            <?php
                            proSPic($pid);
                            ?>
                        </div><!-- carousel-inner -->

                        <!-- Controls -->
                        <a class="left carousel-control" href="#product-carousel" role="button" data-slide="prev">
                            <i class="fa fa-chevron-left"></i>
                        </a>
                        <a class="right carousel-control" href="#product-carousel" role="button" data-slide="next">
                            <i class="fa fa-chevron-right"></i>
                        </a><!-- Controls -->
                    </div>
                </div><!-- Controls -->

                <!-- slider-text -->
                <div class="col-md-5">
                    <div class="slider-text">
                        <h2>RS <?php echo $price?></h2>
                        <h3 class="title"><?php echo $name?></h3>
                        <p><span>Offered by: <a href="index.php?&own=<?php echo $OwID?>"><?php echo $Owname?></a></span>
                        <span class="icon"><i class="fa fa-clock-o"></i><a href="#"><?php echo $date?></a></span>
                        <span class="icon"><i class="fa fa-map-marker"></i><a href=""><?php echo $location?></a></span>
                        <span class="icon"><i class="fa fa-suitcase online"></i><a href="">Dealer <strong>(online)</strong></a></span>

                        <!-- short-info -->
                        <div class="short-info">
                            <h4>Short Info</h4>
                            <p><strong>Brand: </strong><a href="#"><?php echo  $brand?></a> </p>
                            <p><strong>Model: </strong><a href="#">n/a</a></p>
                        </div><!-- short-info -->

                        <!-- contact-with -->
                        <div class="contact-with">
                            <h4>Contact with </h4>
								<span class="btn btn-red show-number">
									<i class="fa fa-phone-square"></i>
									<span class="hide-text"><?php echo $phone?> </span>
									<span class="hide-number">012-1234567890</span>
								</span>
                            <a href="#" class="btn"><i class="fa fa-envelope-square"></i><?php echo $email?></a>
                        </div><!-- contact-with -->

                        <!-- social-links -->
                        <div class="social-links">
                            <h4>Share this ad</h4>
                            <ul class="list-inline">
                                <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-tumblr-square"></i></a></li>
                            </ul>
                        </div><!-- social-links -->
                    </div>
                </div><!-- slider-text -->
            </div>
        </div><!-- slider -->

        <div class="description-info">
            <div class="row">
                <!-- description -->
                <div class="col-md-8">
                    <div class="description">
                        <h4>Description</h4>
                        <p><?php echo $description ?></p>
                    </div>
                </div><!-- description -->

                <!-- description-short-info -->
                <div class="col-md-4">
                    <div class="short-info">
                        <h4>Short Info</h4>
                        <!-- social-icon -->
                        <ul>
                            <li><i class="fa fa-shopping-cart"></i><a href="#">Delivery: Meet in person</a></li>
                            <li><i class="fa fa-user-plus"></i><a href="index.php?&own=<?php echo $OwID?>">More ads by <span><?php echo $Owname?></span></a></li>
                            <li><i class="fa fa-exclamation-triangle"></i><a href="#">Report this ad</a></li>
                        </ul><!-- social-icon -->
                    </div>
                </div>
            </div><!-- row -->
        </div><!-- description-info -->

        <!-- recommended-info -->
    </div><!-- container -->
</section><!-- main -->

<!-- download -->
<?php footer();?>