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
      <td bordercolor="#003333" bgcolor="#999999"><input name="pass" type="password" id="pass" /></td>
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
</html
<?php
$con = mysql_connect("localhost","root","") or die (mysql_error());
$db = mysql_select_db('ebill',$con) or die (mysql_error());


if (isset($_POST['login']))
{
	echo $u_name=$_POST['u_name'];
	echo $u_pass=$_POST['u_pass'];
	
	$query = "select * from  users where user_name='$u_name' AND user_pass='$u_pass'";
	$run = mysql_query('$query')or die(mysql_error());
}

?>