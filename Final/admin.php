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
            $description = html_entity_decode($row['content']); 
//            $description = $row['content'];
        }
    }
    else{
        $id="";
        $title = "";
        $author ="";
        $category ="";
        $image = "";
        $description = "";
    }
    ?>



    <?php include('assets/Partial/admHeader.php') ?>
    <?php include('assets/Partial/admSidebar.php') ?>
    <div class="col-lg-2 text-center " > <h1>New Post</h1></div>
    <div class="col-lg-10 post-new " >



        <form action="function.php?&id=<?php echo $id?>" method="post" enctype="multipart/form-data">


            <div class="col-lg-10 form-group row" style="width: 78%"> <input type="text"  required placeholder="Post Tiltle" name="title" class="form-control" value="<?php echo $title?>"></div>
            <div class="col-lg-1 text-center"><button type="submit" class="btn btn-default post-btn" name="submit">Post</button></div>
            <div class="col-lg-9 no-margin no-padding" style="margin-top: -32px;">  <textarea class=" jqte_editor  " name="content"   placeholder="Description" name="textarea" ><?php echo $description?></textarea>
            </div>
            <div class="col-lg-3">
                <input type="text"  required placeholder="Author" class="form-control post-input"  name="author" value="<?php echo $author?>">
                <input type="text"  required placeholder="category" class="form-control post-input"  name="category" value="<?php echo $category?>">
                <input type="text" required   placeholder="image name" name="name" class="form-control post-input"  value="<?php echo $image?>">
                <input type="file" required  name="imgeFile" class="file" onchange="previewFile()" >
                <img src="assets/images/<?php echo $image?>" name="image" class="image response" width="226px" height="226px" >
            </div>
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

<script>

    function previewFile() {
        var preview = document.querySelector('img');
        var file    = document.querySelector('input[type=file]').files[0];
        var reader  = new FileReader();

        reader.addEventListener("load", function () {
            preview.src = reader.result;
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }

    }
</script>

