<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="styl.css" type="text/css" rel="stylesheet">
</head>

<body>

<?php

if(isset($_REQUEST['Name']))
{
    $name=$_REQUEST['Name'];
    $class=$_REQUEST['Class'];
echo "<script>alert('$name')</script>";

}
else{
    $name="";
    $class="";
}

?>

<div class="wrapper">
    <div class="header">
        <div id="logo"><h1>HOUSE RENTEL SYSTEM</h1></div>
        <div class="list">
            <ul>
                <li> <a href="Index.php">Submit</a></li>
                <li> <a href="update.php">Update</a></li>
                <li> <a href="show.php">view</a></li>
            </ul>
        </div>
    </div>
    <br><br>
    <div class="form" style="text-align: center">
        <form action="update.php" method="post">
            NAME : <input type="text" name="nname" value="<?php echo $name; ?>" required><br><br>
            AGE :<input type="text" name="nclass" value="<?php echo $class; ?>" required><br><br>
            <input type="hidden" name="userid" value="<?php echo $_REQUEST['id']?>"  ><br><br>

            <input type="submit" name="submit" value="Submit"><br>
        </form>

    </div>
</div>
<!--php submit section-->


    
<?php
include'Connection.php';
$conn= connect_db();
//echo $id=$_REQUEST['id'];
if(isset($_POST['submit']))
{
$Nname=$_POST['nname'];
$Nclass=$_POST['nclass'];
 $id=$_POST['userid'];
//$name=$_REQUEST['Name'];
//$class=$_REQUEST['Class'];

    $sql="UPDATE student SET Name='$Nname',Class='$Nclass'  WHERE id='$id'";
    if($conn->query($sql)){
        echo "<script>alert('updated successfully');</script>";
        header('Location: show.php');
    }


}

?>

<!--php section ends-->
</body>
</html>