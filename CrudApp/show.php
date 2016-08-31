<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="styl.css" type="text/css" rel="stylesheet">
</head>

<body>
<div class="wrapper">
    <div class="header">
        <div id="logo"><h1>HOUSE RENTEL SYSTEM</h1></div>
        <div class="list">
            <ul>
                <li> <a href="Index.php">Submit</a></li>
                <li> <a href="update.php">Update</a></li>
                <li> <a href="show.php">view</a></li>
                <!--            <li> <a href="#"></a></li>-->
            </ul>
        </div>
    </div>
    <br><br>
    <div class="form" style="text-align: center">
       
        <table>
            <th width="30px"> Name</th>
            <th width="30px"> Age</th>
            <th width="30px"> Action</th>

    </div>
</div>
<!--php submit section-->

<?php

include'Connection.php';
$conn=connect_db();

$sql="SELECT* FROM student";
 if ($conn->query($sql)){
    $res=mysqli_query($conn,$sql);
 }
    else
        echo "Error";
while($row=mysqli_fetch_array($res))
{
    $id=$row['id'];
    $name=$row['Name'];
    $class=$row['Class'];
    ?>

    <tr>
        <td><?php echo $name?> </td>
        <td><?php echo $class?> </td>
        <td>
            <a href="update.php?id=<?php echo $id?>&Class=<?php echo $class?>&Name=<?php echo $name?>">Edit </a>
            <a href="delete.php?id=<?php echo $id?>"> Delete </a>
        </td>

    </tr>

<?php
 }

?>
</table>
<!--php section ends-->

</body>
</html>




