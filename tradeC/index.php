<?php
include "function/function.php";
headder();
if(isset($_SESSION['vid'])!=""){
    $vid=$_SESSION['vid'];

    UpdateStatus($vid);
}
?>

<!-- main -->
<section id="main" class="clearfix category-page">
    <div class="container">
        <div class="breadcrumb-section">
            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
            </ol><!-- breadcrumb -->
            <h2 class="title">All Ads</h2>
        </div>
        <div class="banner">

            <!-- banner-form -->
            <div class="banner-form banner-form-full">
                <form action="#">
                    <input type="text" class="form-control" placeholder="Type Your key word" name="keyword">
                    <button type="submit" class="form-control" value="Search">Search</button>
                </form>
            </div><!-- banner-form -->
        </div>

        <div class="category-info">
            <div class="row">
                <!-- accordion-->
                <div class="col-md-3 col-sm-4">
                    <div class="accordion">
                        <!-- panel-group -->
                        <div class="panel-group" id="accordion">

                            <!-- panel -->
                            <div class="panel-default panel-faq categories">
                                <!-- panel-heading -->
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#accordion-one">
                                        <h4 class="panel-title">Categories<span class="pull-right"><i class="fa fa-minus"></i></span></h4>
                                    </a>
                                </div><!-- panel-heading -->

                                <div id="accordion-one" class="panel-collapse collapse in">
                                    <!-- panel-body -->
                                    <div class="panel-body">
                                        <h5><a href="index.php"><i class="fa fa-caret-down"></i> All Categories</a></h5>

                                        <ul>
                                            <li><a href="index.php?&cat=Mobile          ">Mobile            </a></li>
                                            <li><a href="index.php?&cat=Car_Vechiles    ">Car & Vechiles    </a></li>
                                            <li><a href="index.php?&cat=Electrics_Gidget">Electrics & Gidget</a></li>
                                            <li><a href="index.php?&cat=Books_Maginzes  ">Books & Maginzes   </a></li>
                                            <li><a href="index.php?&cat=RealEstate       ">Real Estate        </a></li>
                                            <li><a href="index.php?&cat=Sports_Games    ">Sports & Games     </a></li>
                                            <li><a href="index.php?&cat=Fashion_Beauty  ">Fashion & Beauty    </a></li>
                                            <li><a href="index.php?&cat=HomeAppliances   ">Home Appliances     </a></li>
                                            <li><a href="index.php?&cat=Music_Arts      ">Music & Arts        </a></li>
                                            <li><a href="index.php?&cat=Pets_Animals    ">Pets & Animals      </a></li>
                                        </ul>

                                    </div><!-- panel-body -->
                                </div>
                            </div>
                            <!-- panel -->



                        </div><!-- panel-group -->
                    </div>
                </div><!-- accordion-->

                <!-- recommended-ads -->
                <div class="col-sm-8 col-md-7">
                    <div class="section recommended-ads">
                    

                        <!-- ad-item -->
                        <?php
                        moreProxm();

                        ?>
                        <!-- pagination  -->
                        <div class="text-center">
                            <ul class="pagination ">

                               <?php


                               if(isset($_REQUEST['cat'])&&isset($_REQUEST['keyword'])){
                                   $key=$_REQUEST['keyword'];
                                   $cat=$_REQUEST['cat'];
                                   $lable="Select pid from  productdetails where p_name LIKE '%$key%' AND  type='$cat' AND approved=1 ";
                               }
                               else if(isset($_REQUEST['keyword'])){
                                   $key=$_REQUEST['keyword'];
                                   $lable="Select pid from  productdetails where p_name LIKE '%$key%' AND approved=1";
                               }
                               else if(isset($_REQUEST['cat'])){
                                   $cat=$_REQUEST['cat'];
                                   $lable = "select pid from productdetails WHERE type='$cat' AND approved=1";
                               }
                               else {
                                   $lable = "select pid from productdetails WHERE approved=1 ";
                               }
                               $res=Run($lable);
                               $num=mysqli_num_rows($res);

                                $j=ceil($num/4);
                                for($i=1;$i<=$j;$i++) {
                                    echo '<li><a href="index.php?&page='.$i.'">'.$i.'</a></li>';

                                }
                                    ?>

                            </ul>
                        </div><!-- pagination  -->
                    </div>
                </div><!-- recommended-ads -->

                <div class="col-md-2 hidden-xs hidden-sm">
                    <div class="advertisement text-center">
                        <a href="#"><img src="images/ads/2.jpg" alt="" class="img-responsive"></a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- container -->
</section><!-- main -->


<?php
footer();
?>




<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-73239902-1', 'auto');
    ga('send', 'pageview');

</script>
