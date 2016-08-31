<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body style=" text-align: center">
<h1>Student</h1>

<?php
//
//$severname="localhost";
//$username="root";
//$password="";
//$dbname="24";
//
//$conn=new mysqli($severname,$username,$password,$dbname);
//$count=" SELECT COUNT('id') FROM info";
//echo($count);
//
//?>
<a href="del.php">Click here to delete</a>
<form action="next.php">
     Name:<input type="text" placeholder=" UserName:" name="name"><br><br>
   Password:<input type="password"  placeholder="Passward:" name="password"><br><br>

    Age:<select name="Age">
	<option >Enter your age</option>
        <option selected="true">17</option>
        <option >18</option>
        <option >19</option>
        <option >20</option>
        </select><br><br>

   Country:<select name="Country">
	<option >Enter your Country</option>
        <option  >Pakistan</option>
        <option >India</option>
        <option >Turkey</option>
        </select>

    <br><br>
    Gender:
    <input type="radio" name="gender" value="male" checked="true">Male
    <input type="radio" name="gender" value="fmale">Female<br><br>


 <input type="submit"> 


</form>
</body>
</html>