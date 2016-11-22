<!DOCTYPE html>
<html>
<head><title>LOGIN PHP </title></head>
<body bgcolor="orange">
<center><strong> LOGIN HERE </strong></center>
<center>
<form action="login.php" method="post">
  <table width="222" border="1" bordercolor="#000000" bgcolor="#F0F0F0">
    <tr>
      <td width="74" bordercolor="#003333" bgcolor="#999999"><span class="style1">User Name </span></td>
      <td width="167" bordercolor="#003333" bgcolor="#999999"><input name="u_name" type="text" id="u_name" /></td>
    </tr>	
    <tr>
      <td bordercolor="#003333" bgcolor="#999999"><span class="style2">Password</span></td>
      <td bordercolor="#003333" bgcolor="#999999"><input name="pass" type="password" id="pass"  /></td>
    </tr>
    
    <tr>
      <td colspan="2" bordercolor="#003333" bgcolor="#999999">
        
          <div align="center">
            <input type="Submit" name="login" value="login" />
          </div>
        <div align="justify"></div></td>
    </tr>
  </table>
</form> 
</center>
</body>
</html>

<?php
$con=mysqli_connect("localhost","root","","ebill");

if (isset($_POST['login']))
{
	 $u_name=$_POST['u_name'];
	 $u_pass=$_POST['pass'];
	
	$que="select user_name from users WHERE  user_name='$u_name' AND user_pass='$u_pass'";
//	$que = "select * from  users where user_name='$u_name' AND user_pass='$u_pass'";
  $result=mysqli_query($con,$que);
  if(mysqli_num_rows($result)!='0'){
    echo "found";
    ///yaha likhna hy jis page py jana ho
    header("location:home.php");
  }
  else{
    echo "wrong password";
  }
}

?>