<?php


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

#logout-btn{
margin-bottom:10px;
margin-top:10px;
background-color:#FF0000;
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
<center><h2>Home Page</h2>
        <h3>Welcome User</h3>
<img src="image/new-twitter-logo-vector-eps-free-graphics-download-C44755-clipart.png" class="image" />
</center>
<form class="myform" action="homepage.php" method="post">

<center>

<input type="button" id="logout-btn" value="Log Out" />
</center>


</form>
</div>
</body>
</html>
