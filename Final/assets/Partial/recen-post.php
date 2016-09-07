<?php
$con=myConnection();
$sql1="Select * from post LEFT JOIN post_view ON post.Pid=post_view.Pid ORDER BY post_view.count DESC LIMIT 4";
$res=$con->query($sql1);

?>
<div class="col-lg-12 hidden-xs recent-main">

    <h3 class="text-primary recent-header" >Popular posts   </h3>
    <div class="recent-posts well col-lg-12 pull-right ">


        <?php
        while ($row=mysqli_fetch_array($res))
        {
            $id=$row['Pid'];
            $title=$row['title'];
            $content=$row['content'];
            $img=$row['image'];
            ?>
            <div class="row">



                <div class="col-lg-12">
                    <a href="postBody.php?&id=<?php echo $id?>" class="fa fa fa-caret-right fa-1x"> <?php echo strtoupper($title)?></a>
                    <p style="line-height: 1.5;"> <?php echo  "   ".substr($content,0,100)."...."?></p>
                </div>

            </div>
        <?php }?>

    </div>
</div>








