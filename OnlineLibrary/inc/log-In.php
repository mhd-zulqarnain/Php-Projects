<?php 
$pageTitle = "Log In";

include 'inc/header.php'; 
include 'inc/Connection.php';

session_start();

if(isset($_SESSION['name'])){
    session_destroy();
    header("location:home.php");}

if(isset($_POST["Fsubmit"])){
    $name = addslashes(strtolower($_POST["username"]));
    $pass = $_POST["password"];

    $query = "SELECT * FROM `users` WHERE `user_name` = \"$name\"";
    $result = $db->query($query);
    $num = $result->num_rows;
    if($num == 1){
        while ($row = $result->fetch_assoc()) {
            if(strtolower($row["user_name"]) == $name AND $row["user_password"] == $pass){
                $_SESSION["name"]=$name;
                header("location:home.php");
                exit();
            }
            else {
                if(($row["user_password"]) != $pass)
                    echo"<div class=\"container\">
                            <div class=\"alert alert-danger col-sm-8 col-sm-offset-2\">
                            <p><strong>Warning!</strong> Invalid Password </p>
                        </div> </div>";
            }
        }
    }else {
        echo"<div class=\"container\">
        <div class=\"alert alert-danger col-sm-8 col-sm-offset-2\">
                <p><strong>Warning!</strong> Invalid Username </p>
            </div> </div>";
    }

}

?>


<div class="container">
    <form class="form-horizontal" action="log-In.php" method="POST">

        <div class="well container col-sm-8 col-sm-offset-2">

            <!-- Form Name -->
            <legend>Please Log In To Continue</legend>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="username" >Username</label>  
                <div class="col-md-5">
                    <input id="username" name="username" type="text" placeholder="Username or Email" class="form-control input-md" required="">
                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="password">Password</label>  
                <div class="col-md-5">
                    <input id="password" name="password" type="password" placeholder="Password" class="form-control input-md" required="">
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4"></label>
                <div class="col-md-5">
                    <button id="Fsubmit" name="Fsubmit" class="btn btn-primary btn-block">Log In</button>
                    <hr>
                    <h6 align="center">OR</h6>
                    <a href="log-in" class="btn btn-default btn-block">Sign Up</a>
                </div>
            </div>
        </div>

    </form>

</div>

<?php 
include 'inc/footer.php';
?>