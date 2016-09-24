
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="login.css">

</head>
<body>
<div  style="border-bottom:1px solid black;height: 40px;padding:0;margin:0;background-color: red ">
<h1 class="login-header">Blog </h1>
</div>

<div class="container  col-lg-12">
<div>
    <div class="signin-form col-lg-4 col-lg-push-4 well">
        <form action="index.php" method="post" >
            <h3>Sign in</h3>
            <div class="form-group">

                <input type="text" name="userName" placeholder="Enter your email" class="form-control" required >
            </div><div class="form-group">
                <input type="password" name="pass" placeholder="Password" class="form-control" required >
            </div>
            <input type="submit" name="submit" class="col-lg-2 btn btn-md" value="Login">
        </form>
        <a href="#" class="col-lg-push-4 " >Registor</a>
    </div>

</div>
</body>
</html>

<?php
include 'connection.php';
if(isset($_POST['submit']))
{
    $conn=myConnection();
    $name=$_POST['userName'];
    $pass=$_POST['pass'];
    $sql="SELECT userName FROM admin  WHERE UserName='$name' AND password='$pass'";
    if(mysqli_fetch_row($conn->query($sql)))
    {
        session_start();
        $_SESSION['name']=$name;
        header("location:../../admin.php");
    }
    else
        echo "<script>alert('invlid password')</script>";

}

?>