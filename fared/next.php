<?php 

$name=$_GET['name'];

$class=$_GET['class'];

$server="localhost";
$user="root";
$pass="";
$db="record";

$conn= new mysqli($server,$user,$pass,$db);
if($conn)
echo "connection made";
else
echo "eror";


$sql="INSERT INTO info(name,class) VALUES('$name','$class')";

if($conn->query($sql))
  echo "inserted";


?>
<!DOCTYPE html>
<html>
<head>
<img src="<?php echo $name ?>">
<!--<img src="2.PNG">-->
</head>
<body>

</body>
</html>
