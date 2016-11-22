
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="style/core.css">

</head>
<body>
<div  style="border-bottom:1px solid black;height: 40px;padding:0;margin:0;background-color: red ">
<h1 class="login-header">Login </h1>
</div>

<div class="container  login">
<div>
    <div class="signin-form col-lg-4 col-lg-push-5 well">
        <form action="login.php" method="post" >
            <h3>Sign in</h3>
            <div class="form-group">

                <input type="text" name="user_name" placeholder="Enter your email" class="form-control" required >
            </div><div class="form-group">
                <input type="password" name="pass" placeholder="Password" class="form-control" required >
            </div>
            <input type="submit" name="submit" class="col-lg-2 btn btn-md" value="Login">
            <a href="signup.php" class="pull-right">Registor</a>
        </form>
    </div>

</div>
</body>
</html>

<?php
include_once "FbChatMock.php";
$cls=new FbChatMockup();
$conn=$cls->conn();
if(isset($_POST['submit']))
{
    if($conn){
        echo "running";
    }
    $name=$_POST['user_name'];
    $pass=$_POST['pass'];
    $sql="SELECT * from users WHERE username='$name' AND pass='$pass'";
    if($row=mysqli_fetch_array($conn->query($sql)))
    {
        $vid=$row['id'];
        session_start();
        $_SESSION['id']=$vid;
        header("location:index.php");
    }
    else
        echo "<script>alert('invlid password')</script>";

}

?>