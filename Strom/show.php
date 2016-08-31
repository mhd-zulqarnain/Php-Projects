<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body style="text-align: center">
<h1>Student Record</h1>
<table>
    <tr>
        <td >name</td>
        <td >age</td>
        <td >country</td>
        <td >Action</td>
    </tr>
<?php

$servername = "localhost";
$password = "";
$username = "root";
$dbname = "24";
$conn = new mysqli($servername, $username, $password, $dbname);

$sql=" SELECT* FROM info ";

$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result))
{

    $id = $row['id'];
    $name = $row['Name'];
    $age =  $row['Age'];
    $country =  $row['Country'];
    ?>
<tr>
    <td> <?php echo $name ?></td>
    <td> <?php echo $age ?></td>
    <td> <?php echo $country ?></td>
    <td>
        <a href="edit.php?id=<?php echo $id ?>&name=<?php echo $name ?>&age=<?php echo $age ?>&country=<?php echo $country ?>">edit</a>
        <form action="del.php?id=<?php echo $id?>" method="post">
            <input type="submit" value="delete" >
        </form></td>

</tr>
<?php
} ?>
</table>
</body>
</html>