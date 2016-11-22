<?php 
$pageTitle = "Sign Up";

include 'inc/header.php'; 
include 'inc/Connection.php';
?>

<div class="container">
    <form class="form-horizontal" action="#" method="POST">
        <div class="thumbnail-container container col-sm-8 col-sm-offset-2">
            <!-- Form Name -->
            <legend>Please SignUp To Continue</legend>
            <!-- Text input-->
            <div class="form-group ">
                <!-- User Name-->
                <div class="col-md-5 col-sm-offset-4">
                    <label class="control-label " for="username" >Username</label>  
                    <input id="username" name="username" type="text" placeholder="Username or Email" class="form-control input-md" required="">
                </div>
                <!-- Password-->
                <div class="col-md-5 col-sm-offset-4">
                    <label class="control-label " for="password">Password</label>
                    <input id="password" name="password" type="password" placeholder="Password" class="form-control input-md" required="">
                </div>
                <!-- Confirm Password-->
                <div class="col-md-5 col-sm-offset-4">
                    <label class="control-label" for="Cpassword">Confirm Password</label>  
                    <input id="Cpassword" name="Cpassword" type="password" placeholder="Confirm Password" class="form-control input-md" required="">
                </div>
                <!-- Submit-->
                <div class="col-md-5 col-sm-offset-4">
                    <br>
                    <button id="Fsubmit" name="Fsubmit" class="btn btn-primary btn-block">Sign Up</button>
                    <hr>
                    <p align="center">Already have an account ? <a href="log-in" >Log In</a></p>
                </div>
            </div> <!-- End Of Form Fields -->
        </div> <!-- End Of Form Div-->
    </form>
</div> <!-- End Of Container -->

<?php 
include 'inc/footer.php';
?>