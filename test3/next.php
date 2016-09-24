<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
$conn=new mysqli("localhost","root","","24");
$sql="select * from pic WHERE id='31'";
$res=$conn->query($sql);
while ($row=mysqli_fetch_array($res)) {
    $img = JSON_DECODE($row['image']);
    /* echo $img[0];
     echo $img[1];*/
    echo "<pr>";
    echo $size = sizeof($img);
    echo $img[1];
}
?>



</body>
</html>
