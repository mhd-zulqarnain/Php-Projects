<?php
include "function/function.php";
headder();
?>

<!-- main -->
<section id="main" class="clearfix category-page">
    <div class="container">
        <div class="breadcrumb-section">
            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="details.php">Home</a></li>
                <li>Electronics & Gedget</li>
            </ol><!-- breadcrumb -->
            <h2 class="title">Mobile Phones</h2>
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
                            <div class="panel-default panel-faq">
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
                                            <li><a href="index.php?&cat=Mobile            ">Mobile            </a></li>
                                            <li><a href="index.php?&cat=Car_Vechiles      ">Car & Vechiles    </a></li>
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
                            </div><!-- panel -->

                            <!-- panel -->
                            <div class="panel-default panel-faq">
                                <!-- panel-heading -->
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#accordion-two">
                                        <h4 class="panel-title">Condition<span class="pull-right"><i class="fa fa-plus"></i></span></h4>
                                    </a>
                                </div><!-- panel-heading -->

                                <div id="accordion-two" class="panel-collapse collapse">
                                    <!-- panel-body -->
                                    <div class="panel-body">
                                        <label for="new"><input type="checkbox" name="new" id="new"> New</label>
                                        <label for="used"><input type="checkbox" name="used" id="used"> Used</label>
                                    </div><!-- panel-body -->
                                </div>
                            </div><!-- panel -->

                            <!-- panel -->
                            <div class="panel-default panel-faq">
                                <!-- panel-heading -->
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#accordion-three">
                                        <h4 class="panel-title">
                                            Price
                                            <span class="pull-right"><i class="fa fa-plus"></i></span>
                                        </h4>
                                    </a>
                                </div><!-- panel-heading -->

                                <div id="accordion-three" class="panel-collapse collapse">
                                    <!-- panel-body -->
                                    <div class="panel-body">
                                        <div class="price-range"><!--price-range-->
                                            <div class="price">
                                                <span>$100 - <strong>$700</strong></span>
                                                <div class="dropdown category-dropdown pull-right">
                                                    <a data-toggle="dropdown" href="#"><span class="change-text">USD</span><i class="fa fa-caret-square-o-down"></i></a>
                                                    <ul class="dropdown-menu category-change">
                                                        <li><a href="#">USD</a></li>
                                                        <li><a href="#">AUD</a></li>
                                                        <li><a href="#">EUR</a></li>
                                                        <li><a href="#">GBP</a></li>
                                                        <li><a href="#">JPY</a></li>
                                                    </ul>
                                                </div><!-- category-change -->
                                                <input type="text"value="" data-slider-min="0" data-slider-max="700" data-slider-step="5" data-slider-value="[250,450]" id="price" ><br />
                                            </div>
                                        </div><!--/price-range-->
                                    </div><!-- panel-body -->
                                </div>
                            </div><!-- panel -->

                            <!-- panel -->
                            <div class="panel-default panel-faq">
                                <!-- panel-heading -->
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#accordion-four">
                                        <h4 class="panel-title">
                                            Posted By
                                            <span class="pull-right"><i class="fa fa-plus"></i></span>
                                        </h4>
                                    </a>
                                </div><!-- panel-heading -->

                                <div id="accordion-four" class="panel-collapse collapse">
                                    <!-- panel-body -->
                                    <div class="panel-body">
                                        <label for="individual"><input type="checkbox" name="individual" id="individual"> Individual</label>
                                        <label for="dealer"><input type="checkbox" name="dealer" id="dealer"> Dealer</label>
                                        <label for="reseller"><input type="checkbox" name="reseller" id="reseller"> Reseller</label>
                                        <label for="manufacturer"><input type="checkbox" name="manufacturer" id="manufacturer"> Manufacturer</label>
                                    </div><!-- panel-body -->
                                </div>
                            </div><!-- panel -->

                            <!-- panel -->
                            <div class="panel-default panel-faq">
                                <!-- panel-heading -->
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#accordion-five">
                                        <h4 class="panel-title">
                                            Brand
                                            <span class="pull-right"><i class="fa fa-plus"></i></span>
                                        </h4>
                                    </a>
                                </div><!-- panel-heading -->

                                <div id="accordion-five" class="panel-collapse collapse">
                                    <!-- panel-body -->
                                    <div class="panel-body">
                                        <input type="text" placeholder="Search Brand" class="form-control">
                                        <label for="apple"><input type="checkbox" name="apple" id="apple"> Apple</label>
                                        <label for="htc"><input type="checkbox" name="htc" id="htc"> HTC</label>
                                        <label for="micromax"><input type="checkbox" name="micromax" id="micromax"> Micromax</label>
                                        <label for="nokia"><input type="checkbox" name="nokia" id="nokia"> Nokia</label>
                                        <label for="others"><input type="checkbox" name="others" id="others"> Others</label>
                                        <label for="samsung"><input type="checkbox" name="samsung" id="samsung"> Samsung</label>
                                        <span class="border"></span>
                                        <label for="acer"><input type="checkbox" name="acer" id="acer"> Acer</label>
                                        <label for="bird"><input type="checkbox" name="bird" id="bird"> Bird</label>
                                        <label for="blackberry"><input type="checkbox" name="blackberry" id="blackberry"> Blackberry</label>
                                        <label for="celkon"><input type="checkbox" name="celkon" id="celkon"> Celkon</label>
                                        <label for="ericsson"><input type="checkbox" name="ericsson" id="ericsson"> Ericsson</label>
                                        <label for="fly"><input type="checkbox" name="fly" id="fly"> Fly</label>
                                        <label for="g-fone"><input type="checkbox" name="g-fone" id="g-fone"> g-Fone</label>
                                        <label for="gionee"><input type="checkbox" name="gionee" id="gionee"> Gionee</label>
                                        <label for="haier"><input type="checkbox" name="haier" id="haier"> Haier</label>
                                        <label for="hp"><input type="checkbox" name="hp" id="hp"> HP</label>
                                    </div><!-- panel-body -->
                                </div>
                            </div> <!-- panel -->
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
                                   $lable="Select * from  productdetails where p_name LIKE '%$key%' AND  type='$cat' AND approved=1 ";
                               }
                               else if(isset($_REQUEST['keyword'])){
                                   $key=$_REQUEST['keyword'];
                                   $lable="Select * from  productdetails where p_name LIKE '%$key%' AND approved=1";
                               }
                               else if(isset($_REQUEST['cat'])){
                                   $cat=$_REQUEST['cat'];
                                   $lable = "select * from productdetails WHERE type='$cat' AND approved=1";
                               }
                               else {
                                   $lable = "select * from productdetails WHERE approved=1 ";
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


<section id="something-sell" class="clearfix parallax-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="title">Do you have something-sell?</h2>
                <h4>Post your ad for free on Trade.com</h4>
                <a href="ad-post.html" class="btn btn-primary">Post Your Ad</a>
            </div>
        </div><!-- row -->
    </div><!-- contaioner -->
</section><!-- something-sell -->

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
            <p>Copyright &copy; 2016. Developed by <a href="http://themeregion.com/">ThemeRegion</a></p>
        </div>
    </div><!-- footer-bottom -->
</footer><!-- footer -->

<!--/Preset Style Chooser-->
<div class="style-chooser">
    <div class="style-chooser-inner">
        <a href="#" class="toggler"><i class="fa fa-life-ring fa-spin"></i></a>
        <h4>Presets</h4>
        <ul class="preset-list clearfix">
            <li class="preset1 active" data-preset="1"><a href="#" data-color="preset1"></a></li>
            <li class="preset2" data-preset="2"><a href="#" data-color="preset2"></a></li>
            <li class="preset3" data-preset="3"><a href="#" data-color="preset3"></a></li>
            <li class="preset4" data-preset="4"><a href="#" data-color="preset4"></a></li>
        </ul>
    </div>
</div>
<!--/End:Preset Style Chooser-->

<!-- JS -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
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



<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-73239902-1', 'auto');
    ga('send', 'pageview');

</script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">


</html>