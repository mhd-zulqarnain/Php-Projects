
<?php if(isset($_REQUEST['submit']))
{ 
    $file_name=$_FILES['file']['name'];
    $file_path=$_FILES['file']['temp_name'];

    $download_path="downloads/".$file_name;



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