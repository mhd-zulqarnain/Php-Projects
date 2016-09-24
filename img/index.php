
<?php if(isset($_REQUEST['submit']))
{ 
    $file_name=$_FILES['file']['name'];
    $file_path=$_FILES['file']['temp_name'];
    $ext=pathinfo($file_name,PATHINFO_EXTENSION);


    $download_path="downloads/".$file_name;
    $extension=array("jpeg","jpg","png");

    if(in_array($ext,$extension)){
        echo "<script>alert('Its a picture')</script>";
    }
    else
        echo "<script>alert('Select a picture')</script>";


}?>



<html>

<body>
<form method="Post" action="index.php" enctype="multipart/form-data">
    <table align="center">
        <tr>
            <td>Enter name</td><td><input type="text" name="name"/></td>
        </tr>
        <tr>
            <td>Enter Price</td><td><input type="text" name="price"/></td>
        </tr>
        <tr>
            <td>Choose File</td><td><input type="file" name="file"/></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit"/></td><td><p><?php echo @$msg;?></p></td>
        </tr>
    </table>

    <?php echo "<script>alert('$file')</script>"?>
    <img src="<?php echo "downloads/".$file_name;?>" />


</form>


</body>
</html>