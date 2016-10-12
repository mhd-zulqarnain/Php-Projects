<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
$conn=new mysqli("localhost","root","","24");
$sql="select * from pic WHERE id='36'";
$res=$conn->query($sql);
//$arr=array();
while ($row=mysqli_fetch_array($res)) {
    $arr = explode($row['image']);
    print_r($arr);
   /*  echo $img[1];
    echo "<pr>";
    echo $size = sizeof($img);
    echo $img[1];*/
}
?>



</body>
</html>
