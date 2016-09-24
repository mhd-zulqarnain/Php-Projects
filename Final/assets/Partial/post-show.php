

<!--Funvtion to show posts view -->

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
                $comments;
//                echo "<script>alert('$ird')</script>";
                $sql="SELECT COUNT(Pid) FROM comment WHERE  Pid='$id';";
                $cout=$conn->query($sql);
                while ($tow=mysqli_fetch_row($cout))
                    $comments=$tow[0];
                ?>

                <div class="col-lg-12 col-xs-12 post-body no-padding">
                    <div class="col-lg-12 col-xs-12 no-padding">
                    </div>
                    <div class="post-sub col-lg-12 no-padding">
                        <div class="col-lg-5 col-xs-12 pull-left  post-img no-padding" ><img src="<?php echo 'assets/images/'.$img?>" style="width:300px;height: 220px;"></div>

                        <div class="col-lg-7  col-xs-12 pull-right no-padding">
                            <a href="postBody.php?&id=<?php echo $id?>"><h3 class="head-color text-primary">
                                    <?php echo strtoupper($title)?></h3></a>

                            <span class="fa fa fa-comment fa-1x  sm-fonts" aria-hidden="true"><?php echo " ".$comments?></span>
                            <span class="fa fa fa-user fa-1x sm-fonts" aria-hidden="true"><?php echo " ".$eidtor?></span>
                                <span class="fa fa fa-eye fa-1x sm-fonts" aria-hidden="true"><?php
                                    if(!$row['count'])
                                        echo '0';
                                    else
                                        echo $row['count']; ?>
                                </span>
                            <span class="fa fa fa-tag fa-1x sm-fonts" aria-hidden="true"><?php echo " ".$category?></span>
                            <span class="fa fa-calendar fa-1x sm-fonts" aria-hidden="true"><?php echo " ".$date?></span>
                            <p> <?php echo  "   ".substr($content,0,210)."...."?></p>
                            <a href="postBody.php?&id=<?php echo $id?>" class="btn btn-primary btn-md btn-Cls">Read More</a></div>
                    </div>

                </div>


            <?php }?>
        </div>
        <div class="col-lg-4 site-category col-xs-4 pull-right hidden-xs"  >
            <?php include 'category.php'?>
            <?php include 'recen-post.php'?>
        </div>


    </div>
</div>