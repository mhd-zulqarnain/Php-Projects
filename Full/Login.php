<!DOCTYPE html>
<html>
<link rel="stylesheet" href="">
<link rel="stylesheet" href="../House_Ren/assets/lib/bootstrap.min.css">
<link rel="stylesheet" href=" assets/lib/bootstrap-theme.css">

<body>
<?php
if(isset($_POST['submit'])){

require_once 'connect.php';
$conn = connect_db();
if(!$conn){
    echo 'error';
}
$username=$_POST['username'];
$mail=$_POST['email'];

$sql="SELECT name email FROM user WHERE name='$username' AND email='$mail'";
            $result=mysqli_query($conn,$sql);
            if($row=mysqli_fetch_row($result))
            {
    session_start();
    $_SESSION['username'] = $username;
    header("location:index.Partial");
                $num=mysqli_num_rows($earch)!='0';

}
else{
    $error_msg = "wrong Username of password ";
    ?>
    <div class="alert alert-danger"><?php echo $error_msg?></div>
<?php   

}
}

?>

<div >

<form action="login.php" method="post">
    <input type="text" name="username" placeholder="username"><br><br>
    <input type="text" name="email" placeholder="email"><br><br>
    <input type="submit" name="submit">
</form>

</div>
</body>
</html>