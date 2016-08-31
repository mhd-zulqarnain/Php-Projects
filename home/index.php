<!DOCTYPE html>
<html>
<body style="text-align: center;">
<form action="index2.php">
    <input type="submit" value="Old format">
</form>
<h1>Student Record</h1>
<br><br>
<form action="index.php" method="post">
    <input type="text" name="name" placeholder="Name" required><br><br>
    <input type="text" name="class" placeholder="Enter your  class " required>
    <br><br>    <input type="submit" name="submit">
</form>

<br><br>
<table width="600" style="margin: 0 auto">
    <th width="200px">Id  </th>
    <th width="200px">Name  </th>
    <th width="200px">Clas  </th>


<?php
include 'connection.php';
$conn=conn_DB();
if(!$conn) {
    echo "Connection error";
}else
{
    if(isset($_POST['submit']))
    {
    $name=$_POST['name'];
    $class=$_POST['class'];
    $sql="INSERT INTO student(Name,Class) VALUES ('$name','$class')";
        if(!$conn->query($sql))
        echo "Error in inserting";

    }

//$sql1="SELECT* FROM student LIMIT 2";
$sql1="SELECT* FROM student ";
    $res=mysqli_query($conn,$sql1);
    while($row=mysqli_fetch_array($res))
    {
        $id=$row['id'];
        $name=$row['Name'];
        $class=$row['Class'];

        ?>
<tr>

    <td> <?php echo $id?></td>
    <td> <?php echo $name?></td>
    <td> <?php echo $class?></td>
</tr>
    <?php
    }
}
?>

</table>

</body>
</html>