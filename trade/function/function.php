<?php
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
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/slidr.css">
    <link rel="stylesheet" href="css/main.css">
    <link id="preset" rel="stylesheet" href="css/presets/preset1.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700,300" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Signika+Negative:400,300,600,700" rel="stylesheet" type="text/css">
    <link rel="icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="images/ico/apple-touch-icon-57-precomposed.png">
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/modernizr.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="js/gmaps.min.js"></script>
<script src="js/goMap.js"></script>
<script src="js/map.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/smoothscroll.min.js"></script>
<script src="js/scrollup.min.js"></script>
<script src="js/price-range.js"></script>
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
                        <li ><a href="javascript:void(0);"  >Home </a>
                        </li>
                        <li><a href="categories.html">Category</a></li>
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
                    <li><a href="login.php"> Sign In </a></li>
                    <li><a href="signup.php">Register</a></li>
                </ul><!-- sign-in -->
                <a href="login.php" class="btn">Post Your Ad</a>';
}

    else
        echo '<ul class="sign-in">
                    <li><i class="fa fa-user"></i></li>
                    <li><a href="#"> '.getUname().' </a></li>
                    <li><a href="logout.php">Logout</a></li>
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
        return strtoupper($name['name']);
    }

}
function getCat(){
    global $con;
    $lable="    SELECT DISTINCT type FROM productdetails";
    $res=mysqli_query($con, $lable);
    while($row=mysqli_fetch_array($res)){
        $lable=$row['type'];
        $lable=strtoupper($lable);
        echo "
            <li><a href='index.php?cat=$lable'>$lable</a></li>";
    }
}
function getPro(){
    if(!isset($_REQUEST['cat'])){
        global $con;

        $page=isset($_REQUEST['page'])?$_REQUEST['page']:1;
        $pagecount=($page*4)-4;

        if(!isset($_REQUEST['postname'])){
            $lable = "select * from productdetails WHERE approved=1 limit $pagecount,4";
            $sql1="Select * from productdetails WHERE approved=1"; //for pagination

        }
        else
        {
            $post=$_REQUEST['postname'];
            $lable="Select * from  productdetails where p_name LIKE '%$post%' limit $pagecount,4";
            $sql1="Select * from  productdetails where p_name LIKE '%$post%'";

        }
        $res = mysqli_query($con, $lable);
        //paging....
        echo "<div class='col-lg-12 text-center pull-right site-paging'>";
        $num=mysqli_num_rows(Run($sql1));
        $page=ceil($num/4);
        for($i=1;$i<=$page;$i++){
            if(!isset($_REQUEST['postname'])){
                echo '<a href="index.php?&page=' . $i . '">' . $i . '</a> ';
            }
            else
                echo '<a href="index.php?&page=' . $i . '&postname='.$post.'">' . $i . '</a> ';
        }
        echo "</div>";
        //paging....end/////
        $count=mysqli_num_rows(Run($lable));///TO check the number of post displaying
        if($count>0) {
            while ($row = mysqli_fetch_array($res)) {
                $name = $row['p_name'];
                $price = $row['price'];
                $id = $row['pid'];
                $img = $row['image'];
                $image = array();
                $image = json_decode($img);
                echo "
            <div class='col-lg-5 prod_body' >
            <div class='col-lg-12' style='height: 200px;overflow: hidden'>
            <img src='visitors/images/" . $image[0] . "' height='200px' width='200px' class='img-fluid reponsive' style='height:auto;max-width:100%;'>
            </div>
             
            <h3>$name</h3>
            <h5>Price:$price </h5>
            <a href='detail.php?&id=$id'class='btn btn-primary btn-sm'> Own it</a>
            </div>
            
          
            ";
            }
        }else{
            echo '<div>No post to show</div>';
        }
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
    else {
        $lable = "select * from productdetails WHERE approved=1  ORDER BY pid DESC limit $pagecount,4";
    }
    $res = mysqli_query($con, $lable);
    $no=mysqli_num_rows($res);
    if($no>0){
    while ($row = mysqli_fetch_array($res)) {
        $name = $row['p_name'];
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
                                    <h3 class="item-price">Rs'.$price.' <span>(Negotiable)</span></h3>
                                    <h4 class="item-title"><a href="#">'.$name.'</a></h4>
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
function getCatPro(){
    if(isset($_REQUEST['cat'])){

        global $con;
        $cat=$_REQUEST['cat'];
        $page=isset($_REQUEST['page'])?$_REQUEST['page']:1;
        $pagecount=($page*4)-4;
        $lable = "select * from productdetails WHERE type='$cat' AND approved=1 limit $pagecount,4";
        $res = mysqli_query($con, $lable);
        $sql="select * from productdetails WHERE type='$cat' AND approved=1";
        $page=ceil(((mysqli_num_rows($con->query($sql))))/4);
        echo "<div class='col-lg-12 text-center pull-right site-paging'>";
        for($i=1;$i<=$page;$i++){
            echo '<a href="index.php?&page='.$i.'&cat='.$cat.'"> '.$i.'</a>';
        }
        echo '</div>';
        while ($row = mysqli_fetch_array($res)) {
            $name = $row['p_name'];
            $price = $row['price'];
            $id = $row['pid'];
            $img = $row['image'];
            $image=array();
            $image=json_decode($img);
            echo "
            <div class='col-lg-5 prod_body'>
            <div class='col-lg-12' style='height: 200px;overflow: hidden'>
            <img src='visitors/images/".$image[0] ."' height='200px' width='200px' class='img-fluid reponsive' style='height:auto;max-width:100%;'>
            </div>
            <h3>$name</h3>
            <h5>Price:$price </h5>
            <a href='detail.php?&id=$id'class='btn btn-primary btn-sm'> Own it</a>
            </div>
            ";
        }
    }
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
?>

