<?php
include 'connection.php';
$conn=myConnection();
$sql="Select * from post";
$result=$conn->query($sql);
?>


<div class="container site-wrapper">
    <div class="row">
        <div class="col-lg-8 post-wrapper">


            <?php
            while($row=mysqli_fetch_array($result))
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
            <div class="well">
                <h4>Blog Categories</h4>
                <div class="row">
                    <div class="col-lg-6 col-xs-6">
                        <ul class="list-unstyled">
                            <li><a href="https://blackrockdigital.github.io/startbootstrap-blog-home/#">Category Name</a>
                            </li>
                            <li><a href="https://blackrockdigital.github.io/startbootstrap-blog-home/#">Category Name</a>
                            </li>
                            <li><a href="https://blackrockdigital.github.io/startbootstrap-blog-home/#">Category Name</a>
                            </li>
                            <li><a href="https://blackrockdigital.github.io/startbootstrap-blog-home/#">Category Name</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.col-lg-6 -->
                    <div class="col-lg-6 col-xs-6">
                        <ul class="list-unstyled">
                            <li><a href="https://blackrockdigital.github.io/startbootstrap-blog-home/#">Category Name</a>
                            </li>
                            <li><a href="https://blackrockdigital.github.io/startbootstrap-blog-home/#">Category Name</a>
                            </li>
                            <li><a href="https://blackrockdigital.github.io/startbootstrap-blog-home/#">Category Name</a>
                            </li>
                            <li><a href="https://blackrockdigital.github.io/startbootstrap-blog-home/#">Category Name</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.col-lg-6 -->
                </div>
                <!-- /.row -->
            </div>
            <!--<h3>Recent Post</h3>
            <div class="col-lg-3"><img src="http://2.bp.blogspot.com/-jcFR5ETw7WU/VpaJEYdJreI/AAAAAAAApZ4/kmpgihMUPKU/s1600/13_6.jpg" style="width: 100%"></div>
            <div class="col-lg-9"><h4>title of the post</h4></div>-->
        </div>
        
    </div>
</div>