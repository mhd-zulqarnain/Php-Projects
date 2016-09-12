<!----------------------post Delete------------------------->
<?php

include 'assets/Partial/connection.php';
$conn = myConnection();
if(isset($_REQUEST['del_id']))
{
    $id=$_REQUEST['del_id'];
    echo "<script>alert('$id')</script>";
    $sql="Delete from comment WHERE Pid='$id'";
    $sql1="Delete from post WHERE Pid='$id'";
    $res=$conn->query($sql);
    $res1=$conn->query($sql1);
    if($res1)
        header("location:update.php");
    else
        echo "<script>alert('error')</script>";


}?>
<!--------------------------------Comment delete------------------->
<?php


if(isset($_REQUEST['delid']))
{
    $id=$id=$_REQUEST['delid'];
    echo "<script>alert('$id')</script>";
    $sql="Delete from comment WHERE id='$id'";
    $res=$conn->query($sql);
    if($res)
        header("location:comments.php");
    else
        echo "<script>alert('error')</script>";


}?>
<!-----------------------------image upload------------------------------->
<?php
if(isset($_REQUEST['submit']))
{
    $conn=mysqli_connect("localhost","root","","blog");
    $title=$_POST['title'];
    $image=$_POST['name'];
    $category=$_POST['category'];
    $content=$_POST['content'];
    $editor=$_POST['author'];
    $date=date("Y/m/d");
    $file_name=$_FILES['imgeFile']['name'];
    $file_path=$_FILES['imgeFile']['tmp_name'];

    $download_path="assets/images/".$file_name;
    move_uploaded_file($file_path,"assets/images/$file_name");
    $ext = strtolower(substr(strrchr($file_name, "."), 1));

    if($ext != 'jpg' || $ext != 'png'){
        $image=$image.".".$ext;
    }
    else {
        echo"<script>alert('invalid imge try agin')</script>";
        exit;
    }

    rename($download_path,"assets/images/".$image);
    $sql="INSERT INTO post(title,content,image,publishDate,editor,category) VALUES ('$title','$content','$image','$date','$editor','$category')";
    $result=$conn->query($sql);
   if($result)
        header("location:admin.php");
    else
        echo "error";


}?>



<!--------------------------comment elemet------------------------------------>

<?php
if(isset($_POST['data']) == 'comment_data'){
    $comt = $_POST['content'];
    $mail = $_POST['email'];
    $name = $_POST['name'];
    $id = $_POST['id'];
    $date = date("Y-m-d");

    if($comt != '' && $mail != '' && $name != '' && $id != '' && $date != ''){
        $sql = "INSERT INTO comment(Pid,description,Pdate,name,email) VALUES ('$id','$comt','$date','$name','$mail')";

        if($conn->query($sql))
        {
            $msg = "form subbmit successfully";
            header("location:http://www.w3schools.com/");
        }
        else {
            $msg = "please try again later";
            header("location:http://www.w3schools.com/");
        }
    }
}