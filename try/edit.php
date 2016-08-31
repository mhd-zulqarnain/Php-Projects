<?php
if( isset($_REQUEST['name'])) {
    $name = $_REQUEST['name'];
    $class = $_REQUEST['class'];
}
else
{
    $name="";
    $class="";


}
?>


<!DOCTYPE html>
<html>
<head>

</head>
<body style="text-align: center">
<h1>Edit</h1>
<form action="edit.php">
    Name:<input type="text" name="name" value="<?php echo $name?>"><br><br>
    Class:<input type="text" name="class" value="<?php echo $class?>">
</form>

</body>
</html>
