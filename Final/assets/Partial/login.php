
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../lib/bootstrap.min.css">
    <link rel="stylesheet" href="../style/custom.css">

</head>
<body>
<div class="container">
<div>
    <div class="signin-form col-lg-4 col-lg-push-4">
        <form action="login.php" method="post" >
            <h2>Sign In.</h2>
            <div class="form-group">
                <input type="text" name="userName" placeholder="Enter your email" class="form-control" required >
            </div><div class="form-group">
                <input type="text" name="pass" placeholder="Password" class="form-control" required >
            </div>
            <input type="submit" name="submit" class="form-control">
        </form>
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
        header("location:../../index.php");
    }
    else
        echo "<script>alert('invlid password')</script>";

}

?>