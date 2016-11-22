<?php
if(isset($_POST['submit']))
{
$conn=mysqli_connect("localhost","root","","home");
$name=$_POST['name'];
$pass=$_POST['pass'];
$sql="SELECT name passward FROM login WHERE name='$name' AND passward='$pass' ";
  $result=mysqli_query($conn,$sql);
   if($row=mysqli_fetch_row($result))
   {
       session_start();
      $_SESSION["name"]=$name;
       header("location:index.php");
   }
}
?>

<!DOCTYPE html>

<html>
<head>
    <link rel="stylesheet" href="../House_Ren/assets/lib/bootstrap.min.css">
</head>
<body>
<div class="col-lg-2  " style="" >
    <form action="login.php" method="post">
    <div class="form-group">
       Name: <input type="text" class="form-control" name="name">
    </div>
    <div class="form-group">
        Password:<input type="password" class="form-control" name="pass">
    </div>
        <div>
            <input type="submit" value="submit" name="submit">
        </div>

    </form>
</div>

</body>
</html>
