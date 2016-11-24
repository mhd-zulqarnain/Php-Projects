<?php
session_start();
if(isset($_SESSION['vid'])){
    
        header("location:visitors/items.php");
    }else {

    ?>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="visitors/style/bootstrap.min.css">
        <link rel="stylesheet" href="visitors/style/visitor.css">

    </head>
    <body>
    <div style="border-bottom:1px solid black;height: 40px;padding:0;margin:0;background-color: red ">
        <h1 class="login-header">Login </h1>
    </div>

    <div class="container  col-lg-12">
        <div>
            <div class="signin-form col-lg-4 col-lg-push-4 well">
                <form action="login.php" method="post">
                    <h3>Sign in</h3>
                    <div class="form-group">

                        <input type="text" name="user_name" placeholder="Enter your email" class="form-control"
                               required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="pass" placeholder="Password" class="form-control" required>
                        <input type="hidden" name="pid" value="<?php echo $_REQUEST['pp'] ?>" class="form-control">
                    </div>
                    <input type="submit" name="submit" class="col-lg-2 btn btn-md" value="Login">
                    <a href="signup.php" class="pull-right">Registor</a>
                </form>
            </div>

        </div>
    </body>
    </html>

    <?php
    require "function/function.php";
    if (isset($_POST['submit'])) {
        $conn = mysqli_connect("localhost","root","","oss1");
        $name = $_POST['user_name'];
        $pass = $_POST['pass'];
        $pid = $_POST['pid'];
        $sql = "SELECT * from visitor WHERE user_name='$name' AND password='$pass'";
        if ($row = mysqli_fetch_array($conn->query($sql))) {
            $vid = $row['vid'];
            setOnline($vid);
            session_start();
            $_SESSION['vid'] = $vid;
            $_SESSION['LAST_ACTIVITY'] = time();
            $last_activity = $_SESSION['LAST_ACTIVITY'];
            if (is_numeric($pid)) {
                header("location:index.php");
            } else {
                header("location:visitors/index.php");
            }
        } else
            echo "<script>alert('invlid password')</script>";

    }
}
?>