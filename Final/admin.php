<?php

session_start();
if(isset($_SESSION['name'])!="") {
    ?>


<?php
if(isset($_REQUEST['data'])){
    include 'assets/Partial/connection.php';
    $conn=myConnection();
    
    $id=$_REQUEST['data'];
    $sql="Select * from post WHERE pid='$id'";
    $res=$conn->query($sql);
    while($row=mysqli_fetch_array($res)) {
        $title = $row['title'];
        $author =$row['editor'];
        $category = $row['category'];
        $image = $row['image'];
        $description = $row['content'];
    }
}
else{
    $title = "";
    $author ="";
    $category ="";
    $image = "";
    $description = "";
}
?>



<?php include('assets/Partial/admHeader.php') ?>
<?php include('assets/Partial/admSidebar.php') ?>
<div class="col-lg-12 col-lg-push-2" style="background-color:#FFFFF0">



    <form action="function.php" method="post" enctype="multipart/form-data">
        <div class="form-group ">
            <label>Post title:</label>
            <input type="text"  required placeholder="Post Tiltle" class="form-control" name="title"  value="<?php echo $title?>">
        </div>
        <div class="form-group col-lg-8 row">
            <label>Author:</label>
            <input type="text"  required placeholder="Author" class="form-control" name="author" value="<?php echo $author?>">
        </div>
        <div class="form-group col-lg-4 ">
            <label>Category:</label>
            <input type="text"  required placeholder="category" class="form-control" name="category" value="<?php echo $category?>">
        </div>
        <div  class="form-group col-lg-7 row">
            <label>Image Alt :</label>
            <input type="text" required  name="name" class="form-control" value="<?php echo $image?> ">
        </div>
        <div  class="form-group col-lg-5">
            <label>Select image:</label>
            <input type="file" required  name="imgeFile" class="form-control" >
        </div>
        <div class="form-group" >

            <label>Description:</label>
            <textarea class=" jqte_editor  " name="content"   placeholder="Description" name="textarea" ><?php echo $description?></textarea>
        </div>
        <button type="submit" class="btn btn-default" name="submit">Post</button>

    </form>

</div>
<div>

</div>
<script type="text/javascript">
$(document).ready(function () {
$('.jqte_editor').jqte();

})
</script>

<?php include('assets/Partial/admFooter.php') ?>


<?php
}
else
header("location:assets/Partial/login.php");
?>



