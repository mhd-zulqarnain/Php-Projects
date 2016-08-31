

<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>


<?php
$conn=mysqli_connect("localhost","root","","test");


if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $pass=$_POST['pass'];
    $sql="select name pass from user where name='$name' and pass='$pass'";
    $result=mysqli_query($conn,$sql);
    if($row=mysqli_fetch_row($result))
    {
        echo "<script>alert('found')</script>";
        session_start();
        $_SESSION['username']=$name;
        header("location:index.Partial");
    }
    else
        echo "<script>alert('invalid password or username')</script>";
}

?>

<form action="in.php" method="post">
    <input type="text" placeholder="username" name="name">
    <input type="text" placeholder="password" name="pass">

<input type="submit" name="submit">
</form>
</body>
</html>
