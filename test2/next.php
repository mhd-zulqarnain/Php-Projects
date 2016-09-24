<?php
if(isset($_REQUEST['submit'])) {
    $conn = new mysqli("localhost", "root", "", "24");
    $file_name=$_FILES['file']['name'];
    $file_path=$_FILES['file']['tmp_name'];
    move_uploaded_file($file_path,"images/".$file_name);
    $ext=pathinfo($file_name,PATHINFO_EXTENSION);
    
    $name=uniqid();
    $sql="insert into pic(image,ext) VALUES ('$name','$ext')";
   if($conn->query($sql))
    header("location:show.php");
}
?>