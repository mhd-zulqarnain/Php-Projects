<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body style=" text-align: center">
<h1>Student</h1>

<form action="del.php">
<input type="text" name="name" placeholder="Enter name to delete">
<input type="submit" value="Delete">
</form>

<form action="index.php" method="post">
    <input type="text" name="name"><br><br>
    <input type="text" name="gender"><br><br>
    <input type="text" name="age"><br><br>
    <input type="submit" name="submit" value="submit"><br>
</form>

<?php
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $db = "24";
if(!isset($_POST['submit']))
echo " not running";

if(isset($_POST['submit']))
{
    echo"running";
    $name=$_POST['name'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $conn = new mysqli($servername, $username, $pass, $db);
//    $sql = "INSERT INTO student(Name,Class) VALUES('$name','$class')";
    $sql= "INSERT INTO info (Name,Age,Gender) VALUES ('$name','$age','$gender' )" ;
//  $conn->query($sql);
    if ($conn->query($sql)) {
        echo " <script> alert('Data Stored')</script>";
    }
};

?>



</body>
</html>