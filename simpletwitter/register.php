<?php
require 'dfconfig/config.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Registeration Page</title>
<style>
#main-warpper{
width:500px;
margin:auto;
padding:5px;
background:white;
border:2px solid #0080FF;
}

.image{
width:150px;
text-align:center;
border-radius:50%;}

.myfrom{width:450px;
margin:0 auto;
margin-left:10px;

}

.inputvalues{
width:430px;
margin:0 auto;
padding:10px;
}
#Signup-btn{
margin-top:10px;
background-color:#005EBB;
padding:5px;
width:450px;
color:white;
text-align:center;
font-size:18px;
font-weight:bold;
}

#back-btn{
margin-bottom:10px;
margin-top:10px;
background-color:#005EBB;
padding:5px;
width:450px;
color:white;
text-align:center;
font-size:18px;
font-weight:bold;
}

</style>
</head>

<body style="background-color:#666666">
<div id="main-warpper">
<center><h2>Sign Up</h2>
<img src="image/new-twitter-logo-vector-eps-free-graphics-download-C44755-clipart.png" class="image" />
</center>
<form class="myform" action="register.php" method="post">
<label><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Username:</label><br />
<center><input name="username" type="text" class="inputvalues" placeholder="Enter Username" /><br /> </center>
<label><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Password:</label><br />
<center>
<input name="password" type="password" class="inputvalues" placeholder="Enter Password"  /><br />
</center>
<label><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Confirm Password:</label><br />
<center>
<input name="cpassword" type="password" class="inputvalues" placeholder="Confirm Password" /><br />

<input name="submit_btn" type="submit" id="Signup-btn" value="Sign Up" /><br />
<a href="index.php"><input type="button" id="back-btn" value="<< Back To Login" /></a>
</center>


</form>

<?php

if(isset($_POST['submit_btn']))
{
  /*echo '<script type="text/javascript"> alert("sign Up button clicked")</script>'; */
  $username= $_POST['username'];
  $password= $_POST['password'];
  $cpassword= $_POST['cpassword'];


if($password==$cpassword)
{
$query= "select * from user WHERE username='$username'";
$query_run= mysqli_query($con,$query);

if(mysqli_num_rows($query_run)>0)
{
   /*there is already a user with the same username*/
   echo '<script type="text/javascript"> alert("user already exsits... try another username")</script>';

}
else
{
$query="insert into user values('$username','$password')";
$query_run=mysqli_query($con,$query);
if($query_run)
{
echo '<script type="text/javascript"> alert("User Registered....Go to login page to login")</script>';

}
else
{
echo '<script type="text/javascript"> alert("Error!")</script>';
}
}
}
else{
echo '<script type="text/javascript"> alert("Password and confirm password doest not match!")</script>';

}
}


?>

</div>
</body>
</html>
