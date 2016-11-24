<?php
date_default_timezone_set("Asia/Karachi");
$con=mysqli_connect("localhost","root","","oss1");
function Run($query){
    global $con;
    return $con->query($query);
}
//------------inlcudes//-----------//
function headder(){
    session_start();


    echo'
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Theme Region">
    <meta name="description" content="">

    <title>Trade | World\'s Largest Classifieds Portal</title>

    <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/icofont.css">
    <link rel="stylesheet" href="css/slidr.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700,300" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Signika+Negative:400,300,600,700" rel="stylesheet" type="text/css">
    <link rel="icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="images/ico/apple-touch-icon-57-precomposed.png">
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.min.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/scrollup.min.js"></script>
<script src="js/jquery.countdown.js"></script>
<script src="js/custom.js"></script>
<script src="js/switcher.js"></script>
</head>
<body>
<!-- header -->
<header id="header" class="clearfix">
    <!-- navbar -->
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="detail.php"><img class="img-responsive" src="images/logo.png" alt="Logo"></a>
            </div>
            <!-- /navbar-header -->

            <div class="navbar-left">
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li ><a href="index.php">Home </a>
                        </li>
                        <li><a href="javascript:void(0);">Category</a></li>
                        <li><a href="faq.html">Help/Support</a></li>
                        <li class="active dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Pages <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="about-us.html">ABout Us</a></li>
                                <li><a href="contact-us.html">Contact Us</a></li>
                                <li><a href="ad-post.html">Ad post</a></li>
                                <li><a href="ad-post-details.html">Ad post Details</a></li>
                                <li class="active"><a href="categories-main.html">Category Ads</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- nav-right -->
            <div class="nav-right">';

if(isset($_SESSION['vid'])=='') {
    echo '      <!-- sign-in -->
                <ul class="sign-in">
                    <li><i class="fa fa-user"></i></li>
                    <li><a href="login.php?&pp=1"> Sign In </a></li>
                    <li><a href="signup.php">Register</a></li>
                </ul><!-- sign-in -->
                <a href="login.php" class="btn">Post Your Ad</a>';
}

    else
        echo '<ul class="sign-in">
                    <li><i class="fa fa-user"></i></li>
                    <li><a href="visitors/items.php"> '.getUname().' </a></li>
                    <li><a href="logout.php?&pp=1">Logout</a></li>
                </ul>
                <a href="visitors/index.php" class="btn">Post Your Ad</a>';
            echo '   
            </div>
            <!-- nav-right -->
        </div><!-- container -->
    </nav><!-- navbar -->
</header><!-- header -->
    
    ';
}
function getUname(){
    if($_SESSION['vid']!=''){
        $vid=$_SESSION['vid'];
        $query="Select name from visitor where vid='$vid'";
        $name=mysqli_fetch_assoc(Run($query));
        return ucfirst($name['name']);
    }

}
function morePro(){
    global $con;
    $lable = "select * from productdetails WHERE approved=1 limit 7";
    $res = mysqli_query($con, $lable);

    while ($row = mysqli_fetch_array($res)) {
        $name = $row['p_name'];
        $price = $row['price'];
        $id = $row['pid'];
        $img = $row['image'];
        $date = $row['date'];
        $image = array();
        $image = json_decode($img);
        echo '
              <div class="more_prdct2">
							<img src=visitors/images/'.$image[0].'>
								<h5>Rs '.$price.'</h5>
								<h6>'.$name.' </h6>
								<p>Book and Magzine/Mobile Phone</p>
								<div class="more_prdct2_btm">
									<p>'.$date.'</p>
				
				<h6><span style="margin-left:100px;"class="glyphicon glyphicon-tag"></span>Used</h6>
										<span style="margin-left:90%;line-height:25px;"class="glyphicon glyphicon-briefcase">&nbsp;<span class="glyphicon glyphicon-map-marker"></span></span>
				
								</div>
						</div>
              
              
              ';
    }

}
function moreProxm(){
    global $con;
    $page=isset($_REQUEST['page'])?$_REQUEST['page']:1;
    $pagecount=($page*4)-4;

    if(isset($_REQUEST['cat'])&&isset($_REQUEST['keyword'])){
        $key=$_REQUEST['keyword'];
        $cat=$_REQUEST['cat'];
        $lable="Select * from  productdetails where p_name LIKE '%$key%' AND  type='$cat' AND approved=1 ORDER BY pid DESC  limit $pagecount,4";
    }
    else if(isset($_REQUEST['keyword'])){
        $key=$_REQUEST['keyword'];
        $lable="Select * from  productdetails where p_name LIKE '%$key%' AND approved=1 ORDER BY pid DESC  limit $pagecount,4";
    }
    else if(isset($_REQUEST['cat'])){
     $cat=$_REQUEST['cat'];
    $lable = "select * from productdetails WHERE type='$cat' AND approved=1 ORDER BY pid DESC limit $pagecount,4";
    }
    else if(isset($_REQUEST['own'])){
        $own=$_REQUEST['own'];
        $lable = "select * from productdetails WHERE vid='$own' AND approved=1 ORDER BY pid DESC limit $pagecount,4";
    }
    else {
        $lable = "select * from productdetails WHERE approved=1  ORDER BY pid DESC limit $pagecount,4";
    }
    $res = mysqli_query($con, $lable);
    $no=mysqli_num_rows($res);
    if($no>0){
    while ($row = mysqli_fetch_array($res)) {
        $name = ucfirst($row['p_name']);
        $pid = $row['pid'];
        $price = $row['price'];
        $id = $row['pid'];
        $img = $row['image'];
        $date = $row['date'];
        $type = $row['type'];
        $loc= $row['location'];
        $image = array();
        $image = json_decode($img);
        echo '
              
              
             <div class="ad-item row">
                            <div class="item-image-box col-sm-4">
                                <!-- item-image -->
                                <div class="item-image">
                                    <a href="details.html"><img src="visitors/images/'.$image[0].'" alt="Image" class="img-responsive"></a>
                                    <a href="#" class="verified" data-toggle="tooltip" data-placement="left" title="Verified"><i class="fa fa-check-square-o"></i></a>
                                </div><!-- item-image -->
                            </div><!-- item-image-box -->

                            <!-- rending-text -->
                            <div class="item-info col-sm-8">
                                <!-- ad-info -->
                                <div class="ad-info">
                                    <h3 class="item-price">Rs '.$price.'</h3>
                                    <h4 class="item-title"><a href="detail.php?&pid='.$pid.'">'.$name.'</a></h4>
                                    <div class="item-cat">
                                        <span><a href="#">'.$type.'</a></span> 
                                       
                                    </div>
                                </div><!-- ad-info -->

                                <!-- ad-meta -->
                                <div class="ad-meta">
                                    <div class="meta-content">
                                        <span class="dated"><a href="#">'.$date.' </a></span>
                                        <a href="#" class="tag"><i class="fa fa-tags"></i> Used</a>
                                    </div>
                                    <!-- item-info-right -->
                                    <div class="user-option pull-right">
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="'.$loc.'"><i class="fa fa-map-marker"></i> </a>
                                        <a class="online" href="#" data-toggle="tooltip" data-placement="top" title="Dealer"><i class="fa fa-suitcase"></i> </a>
                                    </div><!-- item-info-right -->
                                </div><!-- ad-meta -->
                            </div><!-- item-info -->
                        </div>
							
              ';
    }

    }
    else
        echo "No product to show";
}
function getUser($pid){
    global  $con;
    $sql="Select name from visitor JOIN productdetails WHERE productdetails.vid=visitor.vid AND productdetails.pid='$pid'";
    $run=$con->query($sql);
    $res=mysqli_fetch_assoc($run);
    if($res)
        return  $res['name'];
    else
        return "error";
}
function getProDetails(){
    global $con;
    $id=$_REQUEST['id'];
    $lable="select * from productdetails WHERE pid='$id'";
    $res=mysqli_query($con, $lable);
    while($row=mysqli_fetch_array($res)){
        $name=$row['p_name'];
        $price=$row['price'];
        $id=$row['pid'];
        $img = $row['image'];
        $image=array();
        $image=json_decode($img);
        echo "
            <div class='col-lg-12 prod_body'>
           <div class='col-lg-6' style='height: 200px;overflow: hidden'>
            <img src='visitors/images/".$image[0] ."' height='200px' width='200px' class='img-fluid reponsive' style='height:auto;max-width:100%;'>
            </div> <div class='col-lg-6' style='height: 200px;overflow: hidden'>
            <img src='visitors/images/".$image[1] ."' height='200px' width='200px' class='img-fluid reponsive' style='height:auto;max-width:100%;'>
            </div>
            <h3>$name</h3>
            <h5>Price:$price </h5>
            <a href=''class='btn btn-primary btn-sm'> Own it</a>
            </div>
            ";
    }
}
//Check online
function setOnline($vid){
    $last_activity=$_SESSION['LAST_ACTIVITY'] = time();
    $query="UPDATE visitor SET online='1' WHERE vid='$vid' ";
    $sql = "UPDATE visitor SET login_activity = '$last_activity' WHERE vid = '$vid'";
    Run($query);
    Run($sql);
}
function setOffline($vid){
    $query="UPDATE visitor SET online='0' WHERE vid='$vid' ";
    Run($query);
}
//--------end chat----------
function getUphone($pid){
    $sql="Select V.ph_number from visitor AS V JOIN productdetails AS P ON P.vid=V.vid AND P.pid='$pid'";
    $result=Run($sql);
    while ($row=mysqli_fetch_array($result))
        return $row['ph_number'];
}
function getEmail($pid){
    $sql="Select V.email from visitor AS V JOIN productdetails AS P ON P.vid=V.vid AND P.pid='$pid'";
    $result=Run($sql);
    while ($row=mysqli_fetch_array($result))
        return $row['email'];
}
function getPowner($pid){
    $sql="Select V.name from visitor AS V JOIN productdetails AS P ON P.vid=V.vid AND P.pid='$pid'";
    $result=Run($sql);
    while ($row=mysqli_fetch_array($result))
        return $row['name'];
}
function getName($vid){
    $sql="Select * from visitor WHERE vid='$vid'";
    $result=Run($sql);
    while ($row=mysqli_fetch_array($result))
        $name=$row['name'];
    return $name;
}
function UpdateStatus($vid){
    $_SESSION['LAST_ACTIVITY'] = time();
    $last_activity = $_SESSION['LAST_ACTIVITY'];
    $sql = "UPDATE visitor SET login_activity = '$last_activity' WHERE vid = '$vid'";
    Run($sql);
}
//!!-----slider and detial pics
function proPic($pid){

    $sql="Select image from productdetails WHERE pid='$pid'";
    $res=Run($sql);
    echo '<ol class="carousel-indicators">';

    while ($row=mysqli_fetch_array($res))
    {
        $def='noimage.png';
        $nw=json_decode($row['image']);
        $no=count($nw);
        $path= (empty($nw[0])?$def:$nw[0]);
        echo '<li data-target="#product-carousel" data-slide-to="0" class="active">
                                <img src="visitors/images/'.$path.'" alt="Carousel Thumb" class="img-responsive">
                            </li>';
        for($i=1;$i<$no;$i++){
            $path= (empty($nw[$i])?$def:$nw[$i]);
            echo '<li data-target="#product-carousel" data-slide-to="0" >
                                <img src="visitors/images/'.$path.'" alt="Carousel Thumb" class="img-responsive">
                            </li>';
        }
        for($i=$no;$i<5;$i++){
            $path= (empty($nw[$i])?$def:$nw[$i]);
            echo '<li data-target="#product-carousel" data-slide-to="0" >
                                <img src="visitors/images/'.$path.'" alt="Carousel Thumb" class="img-responsive">
                            </li>';
        }
    }

    echo  '</ol>';
                       
}
function proSPic($pid){

    $sql="Select image from productdetails WHERE pid='$pid'";
    $res=Run($sql);


    while ($row=mysqli_fetch_array($res))
    {
        $def='noimage.png';
        $nw=json_decode($row['image']);
        $no=count($nw);
        $path= (empty($nw[0])?$def:$nw[0]);
        echo '<div class="item active">
                                <div class="carousel-image">
                                    <!-- image-wrapper -->
                                    <img src="visitors/images/'.$path.'" alt="Featured Image" class="img-responsive">
                                </div>
                            </div>';
        for($i=1;$i<$no;$i++){
            $path= (empty($nw[$i])?$def:$nw[$i]);
            echo '<div class="item">
                                <div class="carousel-image">
                                    <!-- image-wrapper -->
                                    <img src="visitors/images/'.$path.'" alt="Featured Image" class="img-responsive">
                                </div>
                            </div>';
        }
        for($i=$no;$i<5;$i++){
            $path= (empty($nw[$i])?$def:$nw[$i]);
            echo '<div class="item">
                                <div class="carousel-image">
                                    <!-- image-wrapper -->
                                    <img src="visitors/images/'.$path.'" alt="Featured Image" class="img-responsive">
                                </div>
                            </div>';
        }
    }



}
//!!<<<<-----slider and detial pics-->>

//!!.....footer......//
function footer(){
    echo '
    <section id="something-sell" class="clearfix parallax-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="title">Do you have something-sell?</h2>
                <h4>Post your ad for free on Trade.com</h4>
                <a href="visitors/index.php" class="btn btn-primary">Post Your Ad</a>
            </div>
        </div><!-- row -->
    </div><!-- contaioner -->
</section><!-- download -->

<!-- footer -->
<footer id="footer" class="clearfix">
    <!-- footer-top -->
    <section class="footer-top clearfix">
        <div class="container">
            <div class="row">
                <!-- footer-widget -->
                <div class="col-sm-3">
                    <div class="footer-widget">
                        <h3>Quik Links</h3>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">All Cities</a></li>
                            <li><a href="#">Help & Support</a></li>
                            <li><a href="#">Advertise With Us</a></li>
                            <li><a href="#">Blog</a></li>
                        </ul>
                    </div>
                </div><!-- footer-widget -->

                <!-- footer-widget -->
                <div class="col-sm-3">
                    <div class="footer-widget">
                        <h3>How to sell fast</h3>
                        <ul>
                            <li><a href="#">How to sell fast</a></li>
                            <li><a href="#">Membership</a></li>
                            <li><a href="#">Banner Advertising</a></li>
                            <li><a href="#">Promote your ad</a></li>
                            <li><a href="#">Trade Delivers</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                    </div>
                </div><!-- footer-widget -->

                <!-- footer-widget -->
                <div class="col-sm-3">
                    <div class="footer-widget social-widget">
                        <h3>Follow us on</h3>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook-official"></i>Facebook</a></li>
                            <li><a href="#"><i class="fa fa-twitter-square"></i>Twitter</a></li>
                            <li><a href="#"><i class="fa fa-google-plus-square"></i>Google+</a></li>
                            <li><a href="#"><i class="fa fa-youtube-play"></i>youtube</a></li>
                        </ul>
                    </div>
                </div><!-- footer-widget -->

                <!-- footer-widget -->
                <div class="col-sm-3">
                    <div class="footer-widget news-letter">
                        <h3>Newsletter</h3>
                        <p>Trade is Worldest leading classifieds platform that brings!</p>
                        <!-- form -->
                        <form action="#">
                            <input type="email" class="form-control" placeholder="Your email id">
                            <button type="submit" class="btn btn-primary">Sign Up</button>
                        </form><!-- form -->
                    </div>
                </div><!-- footer-widget -->
            </div><!-- row -->
        </div><!-- container -->
    </section><!-- footer-top -->


    <div class="footer-bottom clearfix text-center">
        <div class="container">
            <p>Copyright &copy; 2016. Developed by <a href="http://themeregion.com/">ZaavadTheme</a></p>
        </div>
    </div><!-- footer-bottom -->
</footer><!-- footer -->

<!--/Preset Style Chooser-->
<!--/End:Preset Style Chooser-->

<!-- JS -->


</body>
</html>
    ';
}
?>

