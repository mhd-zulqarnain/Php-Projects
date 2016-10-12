<?php

$con=mysqli_connect("localhost","root","","paging");

$page=isset($_GET['page'])?$_GET['page']:1;
$pagecount=($page*5)-5;

$sql="Select * from paging limit $pagecount,5";

$res=$con->query($sql);
while($row=mysqli_fetch_array($res)){
    echo $row['id'],$row['value'];
    echo "<br>";
}




$sql="Select * from paging";
$res=$con->query($sql);
$rows=mysqli_num_rows($res);
$j=ceil($rows/5);
for($i=1;$i<=$j;$i++)
{?>
    <a href="index1.php?&page=<?php echo $i?>"> <?php echo $i?> </a>

    <?php
}?>