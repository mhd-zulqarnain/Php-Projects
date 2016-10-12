<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
$conn=new mysqli("localhost","root","","24")


?>


    <form   method="post"  action="index.php" enctype="multipart/form-data">
        <input type="file" name="file[]" id="multiple"><br/><br/>
        <input type="file" name="file[]" id="multiple"><br/><br/>
        <input type="submit" name="submit">
    </form>
<?php if(isset($_POST['submit'])){
    $file = $_FILES['file']['name'];
    $arr =array();
    $date=date("Y-m-d H:i:s");
    foreach ($file as $item){
       array_push($arr,"$item");
    };
    $data=implode($arr);
    $sql="insert into pic(image,date) VALUE('$data','$date')";

    if($conn->query($sql))
    {
        echo  "running";
    }



} ?>

</body>
</html>