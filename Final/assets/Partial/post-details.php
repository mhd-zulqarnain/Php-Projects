

<?php
if(isset($_REQUEST['id']))
{
include 'connection.php';
$conn = myConnection();
$id=$_REQUEST['id'];
$sql = "Select * from post WHERE Pid=$id";
$result = $conn->query($sql);
?>


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
            <div class="well">
                <h4>Blog Categories</h4>
                <div class="row">
                    <div class="col-lg-6">
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
                    <div class="col-lg-6">
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

        </div>

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
        <div class="user-comment col-xs-12 col-md-8">
            <h4 class="col-lg-4 text-primary">Commented by Name</h4>
            <div class="col-lg-12 text-success">Can you please post about the travlling spots in winter</div>
        </div>
</div>
</div>

<?php
if(isset($_POST['submit'])){
    $comment=$_POST['content'];
    $mail=$_POST['email'];
    $name=$_POST['name'];
    $id=$_POST['id'];
    $date=date("Y-m-d");
    $sql="INSERT INTO comment (Pid,description,Pdate,name,email) VALUES ('$id','$content','$date','$name','$mail')";

    if($conn->query($sql))
    {
        echo "<script> alert('run')</script>";}
    else
        echo "<script> alert('error')</script>";

}
?>