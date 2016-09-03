<?php
include 'connection.php';
$category=$_REQUEST['category'];
//echo "<script>alert('$category')</script>";
$conn=myConnection();
$sql="Select * from post WHERE category='$category'";
$res=$conn->query($sql);
?>


<div class="container site-wrapper">
    <div class="row">
        <div class="col-lg-8 post-wrapper">


            <?php
            while($row=mysqli_fetch_array($res))
            {
                $id=$row['Pid'];
                $title=$row['title'];
                $content=$row['content'];
                $img=$row['image'];
                $eidtor=$row['editor'];
                $category=$row['category'];
                $date=$row['publishDate'];


                ?>

                <div class="col-lg-12 col-xs-12 post-body">
                    <div class="row">
                        <div class="col-lg-12 col-xs-12">
                            <div class="row">
                                <h3 class="head-color text-primary"> <?php echo $title?></h3>
                                <h4 >by<a href="" class="text-primary">  <?php echo $eidtor?></a></h4>
                                <h5> Posted on <?php echo $date?></h5>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xs-12 pull-left  post-img" ><img src="<?php echo $img?>" style="width:782px;height:240px;"></div>
                        <div class="row">
                            <div class="col-lg-12  col-xs-12 pull-right"><p> <?php echo  substr($content,0,170)."...."?></p></div>
                        </div>
                        <a href="postBody.php?&id=<?= $id?>" class="btn btn-primary btn-md btn-Cls">Read More</a>
                    </div>
                </div>


            <?php }?>
        </div>
        <div class="col-lg-4 site-recent  col-xs-4 pull-right hidden-xs"  >
            <?php include 'category.php'?>
        </div>

    </div>
</div>