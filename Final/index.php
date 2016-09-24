<?php
include('assets/Partial/header.php') ;
include 'assets/Partial/connection.php';
$conn=myConnection();
$page= isset($_GET['page'])? $_GET['page'] : 1 ;
$pageCount;
if($page=='0'||$page=='')
{
    $page=1;
    $pageCount=1;
}

else{
    $pageCount=($page*4)-4;     //algorithm to get real page number
}
$sql = "Select post.*,post_view.count from post LEFT JOIN post_view ON post.Pid=post_view.Pid ORDER BY `publishDate` DESC limit $pageCount,4";
$result=$conn->query($sql);
include 'assets/Partial/post-show.php';

$num=mysqli_num_rows($conn->query("Select * from post"));
$j=ceil($num/4);
?>

<div class="col-lg-8 index-pagination">
<div class="col-lg-8 text-center pull-right ">
<?php
for($i=1;$i<=$j;$i++)
{?>
    <a href="index.php?&page=<?php echo $i?>"> <?php echo $i?> </a>
    <?php
}?>
</div>
</div>
<?php include 'assets/Partial/footer.php'?>


