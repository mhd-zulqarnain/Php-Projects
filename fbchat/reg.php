<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {
	color: #0066FF;
	font-weight: bold;
	font-style: italic;
}
.style2 {
	color: #0033CC;
	font-style: italic;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<center><strong> Register Here</strong></center>
<center>
<form action="reg.php" method="post">
  <table width="222" border="1" bordercolor="#000000" bgcolor="#F0F0F0">
    <tr>
      <td width="74" bordercolor="#003333" bgcolor="#999999"><span class="style1">User Name </span></td>
      <td width="167" bordercolor="#003333" bgcolor="#999999"><input name="u_name" type="text" id="u_name" /></td>
    </tr>
    <tr>
      <td bordercolor="#003333" bgcolor="#999999"><span class="style2">Password</span></td>
      <td bordercolor="#003333" bgcolor="#999999"><input name="pass" type="password" id="pass" /></td>
    </tr>
    <tr>
      <td bordercolor="#003333" bgcolor="#999999"><span class="style2">Email</span></td>
      <td bordercolor="#003333" bgcolor="#999999"><input name="email" type="text" id="email" /></td>
    </tr>
    <tr>
      <td colspan="2" bordercolor="#003333" bgcolor="#999999">
        
          <div align="center">
            <input type="Submit" name="Submit" value="Submit" />
          </div>
        <div align="justify"></div></td>
    </tr>
  </table>
</form> 
</center>
</body>
</html>
<?php
$con=mysql_connect("localhost","root","") or die (mysql_error());
$db=mysql_select_db('ebill',$con) or die(mysql_error());

if(isset($_POST['Submit']))
{
	  $name=$_POST['u_name'];
	  $pass=$_POST['pass'];
      $email=$_POST['email'];
	
	if($name=='')
	{
		echo "<script>alert('Enter Your name')</script>";
		exit();
	}
	if($pass=='')
	{
		echo "<script>alert('Enter  Your password')</script>";
		exit();
	}
	if($email=='')
	{
		echo "<script>alert('Enter Your email')</script>";
		exit();
		}
	else
	{
		$que="insert into users(user_name,user_email,user_pass)values('$name','$email','$pass')";
		if(mysql_query($que))
	{
		echo "<script>alert('Registration successfully')</script>";
		echo "<script>window.open('home.php','_self')</script>";
	}
}
}
?>