
<!doctype html>
<html>
<body style="text-align:center">
<form action="index.php" method="post">

    Name:<input type="text" name="name"><br><br>
    Roll:<input type="text" name="roll"><br><br>
    <input type="submit" value="submit" name="submit"><br><br>
</form>
<table align="center">
    <th>ID</th>
    <th>NAME</th>
    <th>CLASS</th>
    <th>Action</th>
<?php

include'Connection.php';
$conn=connect();
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $class=$_POST['roll'];
    $sql= "INSERT INTO student(Name,Class) VALUES('$name','$class')";

}


if($res=mysqli_query($conn,"select* from student"))
{
    while ($arr=mysqli_fetch_array($res))

    {

        $id=$arr['id'];
        $name=$arr['Name'];
        $class=$arr['Class'];
?>
<tr>
    <td style="border: 1px solid black;"><?php echo $id?> </td>
    <td style="border: 1px solid black;"><?php echo $name?> </td>
    <td style="border: 1px solid black;"><?php echo $class?> </td>
    <td style="border: 1px solid black;">
        <a href="update.php?&Name=<?php echo $name?>">send</a>
        <a href="Del.php?&id=<?php echo $id;?>">Delete</a>
    </td>

</tr>

<?php
    }
}
?>

</table>


</body>
</html>
