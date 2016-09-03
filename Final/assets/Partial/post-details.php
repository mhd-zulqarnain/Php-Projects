

<?php
if(isset($_REQUEST['id']))
{
include 'connection.php';
$conn = myConnection();
$id=$_REQUEST['id'];
$sql = "Select * from post WHERE Pid=$id";
$result = $conn->query($sql);
//-------counter
if($raw=mysqli_num_rows($result)) {
    $sql = "Select * from post_view WHERE Pid=$id";
    $run = $conn->query($sql);
    if (mysqli_num_rows($run)) {
        $var="UPDATE  post_view set count=count+1 WHERE Pid='$id'";
        $conn->query($var);
    }
    else
    {

        $var="INSERT INTO post_view (Pid,count) VALUES ('$id','1')";
        $conn->query($var);
    }
}
//-------counter ends
?>

<
<div class="container site-wrapper">
    <div class="row">
        <div class="col-lg-8 post-wrapper">


            <?php
            while ($row = mysqli_fetch_array($result))
            {
                $title = $row['title'];
                $content = $row['content'];
                $img = $row['image'];
                $eidtor = $row['editor'];
                $category = $row['category'];
                $date = $row['publishDate'];


                ?>

                <div class="col-lg-12  col-xs-12 post-body">
                    <div class="row">
                        <div class="col-lg-12 col-xs-12">
                            <div class="row">
                                <h3 class="head-color text-primary"><?php echo $title ?></h3>
                                <h4>by<a href="" class="text-primary"> <?php echo $eidtor ?></a></h4>
                                <h5> Posted on <?php echo $date ?></h5>
                            </div>
                        </div>
                        <div class="col-lg-12 pull-left  post-img"><img src="<?php echo $img ?>" class="img-responsive"
                            "></div>
                        <div class="row">
                            <div class="col-lg-12 pull-right"><p> <?php echo $content ?></p>
                            </div>
                        </div>
                    </div>
                </div>


                <?php
            }
            }else{
                ?>
                <div class="alert alert-danger col-lg-12 text-center">No post found</div>
            <?php } ?>
        </div>
        <div class="col-lg-4 site-recent pull-right hidden-xs"  >
            <?php include 'category.php'?>

        </div>
        <!--submit commment box-->
        <div class="post-comment col-xs-12 col-md-8">
            <form action="postBody.php" method="post">
                <div class="form-group ">

                    <input type="text"  required placeholder="Name(required)" class="form-control" name="name">
                </div>
                <div  class="form-group">
                    <input type="text" required placeholder="Mail(will not be publish)(required)" name="email" class="form-control">
                </div>
                <div class="form-group" >
                    <textarea class="form-control" name="content" rows="4"></textarea>
                </div>
                <input type="hidden" value="<?php echo $id?>" name="id">
                <button type="submit" class="btn btn-default" name="submit">Submit</button>

            </form>

        </div>
        <!--        comment Box-->
        <div class="col-lg-8  site-comment-box">
            <?php
            $res=$conn->query("SELECT * FROM comment WHERE Pid=$id");
            while ($row=mysqli_fetch_array($res)) {
                $nam=$row['name'];
                $caption=$row['description'];
                ?>
                <div class="user-comment col-lg-12 col-md-8">

                    <div class="col-lg-2 "><img src="assets\images\avatar.png"></div>
                    <div class="col-lg-10 pull-right">
                        <h4 class="col-lg-4 text-primary"><a style="color: #0000fa; text-decoration:midnightblue"><?php echo $nam?></a> Says</h4>
                        <div class="col-lg-12 text-success"><?php echo $caption?></div>


                    </div>

                </div>
                <?php
            }?>
        </div>
    </div>
</div>

<script>
    $(function () {
        $("form").submit(){
            $(this).closest('form').find("input[type=text], textarea").val("");

        }
    });
</script>
<?php
if(isset($_POST['submit'])){
    $comt=$_POST['content'];
    $mail=$_POST['email'];
    $name=$_POST['name'];
    $id=$_POST['id'];
    $date=date("Y-m-d");
    if($comt != '' && $mail != '' && $name != '' && $id != '' && $date != ''){
        $sql="INSERT INTO comment (Pid,description,Pdate,name,email) VALUES ('$id','$comt','$date','$name','$mail')";

        if($conn->query($sql))
        {
            echo "<script> alert('run')</script>";
            exit;
        }
        else {
            echo "<script> alert('error')</script>";
        }
    }
}
?>