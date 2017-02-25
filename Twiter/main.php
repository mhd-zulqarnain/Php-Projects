
<?php
include "function/function.php";
if(!isset($_SESSION['vid'])) {
    header("location:index.php");

}else {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <?php
    head();
    ?>
    <body class="main">

    <!-- header -->
    <div id="top-nav" class="navbar  navbar-static-top">
        <div class="container-fluid top-nav">
            <div class="col-md-12">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <ul class="nav navbar-nav navbar-left navigation">
                        <li><a href="#"><i class="fa fa-home fa-1x"></i> Home</a></li>
                        <li><a href="#"><i class="fa fa-bell-o fa-1x"></i> Notification</a></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-1x"></i> Logout</a></li>
                    </ul>

                </div>
                <div class="  col-md-offset-6 row">
                    <ul class="nav navbar-nav navbar-left">
                        <li class="ftwitter"><a href="#"><i class="fa fa-twitter fa-2x" style="color: #00a0d2;padding-bottom:0px;"></i></a></li>
                    </ul>
                </div>
            </div>

        </div>
        <!-- /container -->

    </div>

    <!-- /Header -->

    <!-- Main -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                <!-- Left column -->
                <?php

                $id=$_SESSION['vid'];
                $def="noimage.jpg";
                $sql="SELECT * from visitor WHERE vid='$id' ";
                $run=Run($sql);
                $result=mysqli_fetch_assoc($run);

                ?>

                <div class="col-lg-12 null fa-border" style="background-color: #ffffff">
                    <br>
                    <div class="col-sm-4">
                        <img src="images/<?php echo $result['prf_pic']?>" height="60" width="60" class="img-circle" alt="">
                    </div>
                    <div class="col-sm-8">
                        <br>
                        <a href="#"><?php echo ucfirst($result['vname'])?></a><br>
                        <a href="#" data-toggle="modal" data-target="#myModal">Settings</a><br>
                        <a href="#" data-toggle="modal" data-target="#myfriends">Friends</a><br>
                        <br>
                        <br>
                    </div>

                </div>

            </div>
            <!-- /col-3 -->
            <div class="col-sm-9">

                <!-- column 2 -->


                <div class="row">
                    <!-- center left-->
                    <div class="col-md-6">

                        <form action="function/function.php" method="post" enctype="multipart/form-data" style="background-color: #ffffff">
                            <textarea name="text"  cols="30" rows="4 " class="form-control" ></textarea>

                            <br>


                            <div class="btn-group btn-group-justified">
                                <a href="#" class=" col-sm-1">
                                    <i class="fa fa-camera fa-1x upload" ">
                                    <input type="file" name="imfile" style="display:none " id="ppic" >
                                    </i>
                                </a>


                                <a href="#" class="col-sm-1">
                                    <i class="fa fa-location-arrow fa-1x"></i>
                                </a>
                                <a href="#" class="col-sm-1">
                                    <i class="fa fa-image fa-1x"></i>
                                </a>

                                <div class="col-md-6 pull-right row">
                                    <button class="btn btn-sm btn-info pull-right" name="t_submit">
                                        <i class="fa fa-edit fa-1px"></i>Tweet
                                    </button>
                                </div>

                            </div>
                            <hr>
                        </form>


                        <!--/panel-->

                        <!--   posts                         -->
                        <div>

                            <?php
                            $vid=$_SESSION['vid'];
                            $sql="SELECT visitor.*,post.* FROM post JOIN visitor WHERE visitor.vid=post.vid AND visitor.vid='$vid' ORDER BY post.pid DESC ";
                            $run=Run($sql);
                             if($run->num_rows==0)
                             {
                                 echo "<h3 class='danger'>No tweet to show</h3>";

                             }
                            while ($row=mysqli_fetch_array($run)) {
                                $pic = $row['post_pic'];
                                $prfpic = $row['prf_pic'];
                                $text = $row['post_title'];
                                $time = $row['time'];
                                $uname = $row['uname'];
                                $vname = $row['vname'];

                                $prfpic= (empty($prfpic)?$def:$prfpic);
                                ?>
                                <br>
                                <div class="col-sm-12" >
                                    <div class="col-lg-12">
                                        <br class="clearfix">
                                    </div>
                                    <div class="col-md-12" style="background-color:#ffffff">
                                        <div class="col-sm-8 row">
                                            <img src="<?php echo "images/".$prfpic?>" height="40" width="40"
                                                 class="img-thumbnail"
                                                 alt="">
                                            <span ><?php echo ucwords($vname)?></span>
                                            <span class="sm-font"><?php echo "@".ucwords($uname)?></span>
                                        </div>
                                        <div class="col-md-4"><?php echo $time ?></div>
                                    </div>
                                    <div class="col-lg-12" style="background-color:#ffffff ">
                                        <br class="clearfix">
                                    </div>

                                    <div class="col-sm-12 " style="background-color:#ffffff">
                                        <?php echo ucfirst($text)?><br><br>
                                        <?php
                                        if(!empty($pic)){
                                            echo '<img src=images/'.$pic.' class="img-responsive">';
                                        }
                                        ?>



                                    </div>
                                </div>


                                <?php
                            }?>
                        </div>

                        <!--/posts-->



                    </div>
                    <!--/col-->

                    <!--/col-span-6-->

                </div>
                <!--/row-->



            </div>
            <!--/col-span-9-->
        </div>
    </div>
    <!-- /Main -->

    <footer class="text-center"> <a
            href=""><strong></strong></a></footer>
    </body>
    </html>
    <?php
}?>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Sign up-------------------->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Profile Setting</h4>
            </div>

            <div class="col-lg-12">
                <form action="function/function.php" method="post"  enctype="multipart/form-data" class="form-horizontal">
                    <div class="col-lg-12" style="padding: 20px!important;">

                        <img src="images/<?php echo $result['prf_pic']?>" class="img-thumbnail" height="100" width="100">
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Change Profile:</label>
                            <div class="col-sm-10">
                                <br>    <input type="file"  name="prf_pic" >
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" >Username:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="uname" value="<?php echo $result['uname']?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  name="name" value="<?php echo $result['vname']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Password:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="pwd" value="<?php echo $result['password']?>">
                        </div>
                    </div>
                    <input type="hidden" value="<?php echo $result['vid']?>" name="vid">


                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" name="u_update" class="btn btn-default">Update</button>
                        </div>
                    </div>
                </form>
            </div>


            <div class="modal-footer">
            </div>
        </div>
        <!-- Sign up-------------------->
    </div>
</div>

<div class="modal fade" id="myfriends" role="dialog">
    <div class="modal-dialog">

        <!-- Sign up-------------------->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Friends</h4>
            </div>

            <div class="col-lg-12">
                <?php
                $sql="Select * from visitor where vid<>'$vid'";
                $new=Run($sql);
                while($row=mysqli_fetch_array($new)){
                ?>
                <div class="col-sm-3">
                    <br>
                    <input type="hidden" value="<?php echo $row['vid'];?>" class="fri">
                    <img src="images/<?php echo $row['prf_pic'];?>" class="img-thumbnail img-responsive" height="80" width="80">
                    <h6><?php echo $row['vname'];?></h6>
                    <button class="btn btn-info btn-add">Add as friend</button>

                </div>
                <?php
                    }?>
            </div>


            <div class="modal-footer">
            </div>
        </div>
        <!-- Sign up-------------------->
    </div>
</div>

<script>
    $(".upload").on("click",function (){
        $("#ppic").slideToggle();
    });
$(".btn-add").on("click",function () {
    var $id=$(".fri").val();
    alert($id);
    $obj={
        data:"add_friend",
        id:$id,
    };
    ajax()

})


</script>

