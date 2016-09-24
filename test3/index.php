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
    foreach ($file as $item){
       array_push($arr,"$item");
    };
    $data=JSON_ENCODE($arr);
    $sql="insert into pic(image) VALUE('$data')";

    if($conn->query($sql))
    {
        echo  "running";
    }



} ?>

</body>
</html>