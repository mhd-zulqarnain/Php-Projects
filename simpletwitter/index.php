<?php
require 'dfconfig/config.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login Page</title>
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
#login-btn{
margin-top:10px;
background-color:#005EBB;
padding:5px;
width:450px;
color:white;
text-align:center;
font-size:18px;
font-weight:bold;
}

#Registeration-btn{
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
#margin{
margin-left:30px;}

</style>
</head>

<body style="background-color:#666666">
<div id="main-warpper">
<center><h2>Log in </h2>
<img src="image/new-twitter-logo-vector-eps-free-graphics-download-C44755-clipart.png" class="image" />
</center>
<form class="myform" action="index.php" method="post">
<label><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Username:</label><br />
<center><input name="username" type="text" class="inputvalues" placeholder="Type your username" /><br /> </center>
<label><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Password:</label><br />
<center>
<input name="password" type="password" class="inputvalues" placeholder="Type your password" /><br />
<input name="login" type="submit" id="login-btn" value="Login" /><br />
<a href="register.php"><input type="button" id="Registeration-btn" value="Sign up for Twitter" /></a>
</center>


</form>
<?php
if(isset($_POST['login'])) {

            if ($con) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "Select * from user WHERE username='$username' AND password='$password'";


        $result = mysqli_query($con, $query);

        $row = mysqli_num_rows($result);
        if (isset($_POST['login']))
            if ($row > 0) {
                //	echo $row['username'];
                $_SESSION['username']=$username;
	            header('location:homepage.php');

            }
        else{
            echo "wrong password";
        }



    }

}
//
//{
//
//    $username=$_POST['username'];
//    $password=$_POST['password'];
//
// //$query="select * from user WHERE username='$username' AND password='$password'";
//   $query="Select * from user";
// $result=mysqli_query($con,$query);
//while($row=mysqli_fetch_object($result)){
//
//  //	echo $row['username'];
//	echo $row->username;
//
//  }
//
//
//   if(mysqli_num_row($query_run)>0)
//   {
//      //valid
//      $_SESSION['username']=$username;
//	  header('location:homepage.php');
//
//   }
//   else
//   {
//       //invalid
//      echo '<script type="text/javascript"> alert("invalid credentials")</script>';
//   }
//
//}


?>
</div>
</body>
</html>
