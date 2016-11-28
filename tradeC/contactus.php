<?php
include "function/function.php";
headder();

if(isset($_SESSION['vid'])!=""){
    $vid=$_SESSION['vid'];

    UpdateStatus($vid);
}

?>
<!-- main -->
<section id="main" class="clearfix details-page">
    <div class="container">
        <div class="breadcrumb-section">
            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>

            </ol><!-- breadcrumb -->
            <h2 class="title">Contact us</h2>
        </div>



        <div class="section  container">
                <!-- carousel -->
            <div class="col-md-offset-2">
                <div class="row">

                    <form role="form" action="" method="post">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label for="InputName">Your Name</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="InputName" id="InputName" placeholder="Enter Name" required="">
                                    <span class="input-group-addon"><i class="fa fa-check"></i></span></div>
                            </div>
                            <div class="form-group">
                                <label for="InputEmail">Your Email</label>
                                <div class="input-group">
                                    <input type="email" class="form-control" id="InputEmail" name="InputEmail" placeholder="Enter Email" required="">
                                    <span class="input-group-addon"><i class="fa fa-check"></i></span></div>
                            </div>
                            <div class="form-group">
                                <label for="InputMessage">Message</label>
                                <div class="input-group">
                                    <textarea name="InputMessage" id="InputMessage" class="form-control" rows="5" required=""></textarea>
                                    <span class="input-group-addon"><i class="fa fa-check"></i></span></div>
                            </div>
                            <div class="form-group">
                                <label for="InputReal">What is 4+3?</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="InputReal" id="InputReal" required="">
                                    <span class="input-group-addon"><i class="fa fa-check"></i></span></div>
                            </div>
                            <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info ">
                        </div>
                    </form>
                </div>
            </div>

    <!-- recommended-info -->
    </div><!-- container -->
</section><!-- main -->

<!-- chat portion -->
<?php footer();?>


