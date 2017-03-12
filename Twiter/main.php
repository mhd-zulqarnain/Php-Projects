
<?php
include "function/function.php";
if(!isset($_SESSION['vid'])) {
    header("location:index.php");

}else {
    ?>
    <!DOCTYPE html>
    <html lang="en" xmlns:padding-bottom="http://www.w3.org/1999/xhtml">
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
                        <input type="hidden" class="ses" value="<?php echo $_SESSION['vid']?>">
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

   
    <div class="container-fluid">
        <div class="row">
            <!-- new tweet-->
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
                        <a href="#" data-toggle="modal" data-target="#myfriends">Followers</a><br>
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
                        <!--new tweet---------------------------->
                        <form action="function/function.php" method="post" enctype="multipart/form-data" style="background-color: #ffffff">
                            <textarea name="text"  cols="30" rows="4 " class="form-control" required ></textarea>

                            <br>


                            <div class="btn-group btn-group-justified">
                                <a href="#" class=" col-sm-1">
                                    <i class="fa fa-camera fa-1x upload" ">
                                    <input type="file" name="imfile" id="ppic" >
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

                        <!--new tweet end---------------------------->

                    <?php
                    include("function/tweet.php");
                    ?>
                        <!--   posts  -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main -->

    <footer class="text-center"> <a
            href=""><strong></strong></a></footer>
    </body>
    </html>
    <?php
}?>

<?php
include("function/models.php");
?>
<script>

    $(".cmt_content").on('keyup', function (e) {

        var $pid = $(this).siblings('.cmt_id').val(),
        $content = $(this).val();

        if(event.keyCode===13){
            var $obj={
                data:"comment",
                text:$content,
                pid: $pid
            };
            $.ajax({
                type:"post",
                url:"function/function.php",
                data:$obj,
                success:function (response) {
                        location.reload();
                    }

            });
        }
    });



    $(".btn-add").on("click",function () {
        var $id=$(".fri").val();
        var $ses=$(".ses").val();
        console.log($id);
        $obj={
            data:"add_friend",
            id:$id,
        };
        console.log($obj);
        $.ajax({
            type:"POST",
            url:"function/function.php",
            data:$obj,
            success:function (success) {
                $.get("function/friends.php?ses="+$ses,function(data) {
                    $("#myfriends").html(data);
                })
            },
        });

    })
    $(".delPost").on("click",function () {
        var $owner=$(this).siblings(".powner").val();
        $obj={
            data:'delPost',
            id:$owner,
        }
        $.ajax({
            type:'POST',
            url:'function/function.php',
            data:$obj,
            success:function (response) {
                location.reload();
            }

        })

    })

</script>

