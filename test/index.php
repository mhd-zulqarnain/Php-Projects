<?php
$con=mysqli_connect("localhost","root","","oss");
$sql="Select image from productdetails";
$res=$con->query($sql);

while ($row=mysqli_fetch_array($res))
{
    $nw=json_decode($row['image']);
    $no=count($nw);

    for($i=0;$i<$no;$i++){
        echo "<img src='images/".$nw[$i]."'>  <br>";
    }
    for($i=$no;$i<5;$i++){
        echo "<img src='../Final/assets/images/avatar.png'";
    }

    
}
    ?>
