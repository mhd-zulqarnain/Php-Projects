<?php
if(isset($_REQUEST['data'])){

    $title=$_REQUEST['data'];
    $author=$_REQUEST['data'];
    $category=$_REQUEST['data'];
    $description=$_REQUEST['data'];
}
?>



<?php include('assets/Partial/admHeader.php') ?>
<?php include('assets/Partial/admSidebar.php') ?>
<div class="col-lg-5 col-lg-push-2" style="background-color:#FFFFF0">



    <form action="function.php" method="post">
        <div class="form-group ">
            <label>Post title:</label>
            <input type="text"  required placeholder="Post Tiltle" class="form-control" name="title" >
        </div>
        <div class="form-group col-lg-8 row">
            <label>Author:</label>
            <input type="text"  required placeholder="Author" class="form-control" name="author" >
        </div>
        <div class="form-group col-lg-4 ">
            <label>Category:</label>
            <input type="text"  required placeholder="category" class="form-control" name="category" >
        </div>
        <div  class="form-group col-lg-7 row">
            <label>Image name:</label>
            <input type="text" required  name="name" class="form-control" >
        </div>
        <div  class="form-group col-lg-5">
            <label>Select image:</label>
            <input type="file" required  name="file" class="form-control" >
        </div>
        <div class="form-group" >

            <label>Description:</label>
            <textarea class="form-control" name="content" rows="4"  placeholder="Description"></textarea>
        </div>
        <button type="submit" class="btn btn-default" name="submit">Post</button>
    </form>




</div>

<?php include('assets/Partial/admFooter.php') ?>



<!--<div class="col-lg-8 col-lg-push-2 admin-site-publish" style="background-color: transparent ; height: 800px">

    <form action="function.php" method="post" enctype="multipart/form-data" ">
    <input type="text" name="name" placeholder="Enter a name for image " id="name_adm"><BR>
    <input type="file" name="file" placeholder="Enter  the name"   id="file_adm">
    <textarea rows="10">Enter text here</textarea>
    <input type="text" name="title" placeholder="" id="title_adm">
    <button type="submit" name="submit" class="btn btn-default" id="submit_adm">Submit</button>
    </form>
    <img src="" class="img-rounded" width="238px" height="400px">
</div>-->




