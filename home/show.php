<!DOCTYPE html>
<html>
<style>

    td{
        background-color: wheat;

        border-width: 3px;
        border-color: black ;
    }
    td{
        width: 220px;
    }

</style>
<body>
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="home";

$conn= new mysqli($servername,$username,$password,$dbname);

?>
<table>
<tr>
    <td width="120px">Id </td>
    <td width="120px">Name </td>
    <td width="120px">Action </td>

</tr><br>


<?php

$sql=" SELECT* FROM student";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result))
{
    $name = $row['Name'];
    $class =  $row['Class'];
    $id=$row['id'];
    ?>
<tr>

    <td><?php echo $id ?></td>
    <td> <?php echo $name?></td>
    <td> <?php echo $class?></td>
    <td><a href="Update.php" ></a></td>
</tr>

    <?php
}?>

</table>
</body>
</html>