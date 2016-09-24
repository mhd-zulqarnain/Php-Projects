<?php

$con=mysqli_connect("localhost","root","","paging");

$page= isset($_GET['page'])? $_GET['page'] : 1 ;
$pageCount;
if($page=='0'||$page=='')
{
    $page=1;
    $pageCount=1;
}

else{
    $pageCount=($page*5)-5;     //algorithm to get real page number
}
$sql="Select * from paging limit $pageCount,5";
$result=mysqli_query($con,$sql);

//    if($con->query($sql))
while($row=mysqli_fetch_array($result))
{
    echo $row['id'],$row['value'];
    echo "<br>";

}

$num=mysqli_num_rows($con->query("Select * from paging"));
$j=ceil($num/5);
for($i=1;$i<=$j;$i++)
{?>
    <a href="index.php?&page=<?php echo $i?>"> <?php echo $i?> </a>
    <?php
}?>