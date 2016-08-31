<!DOCTYPE html>
<html>

<head>
<body>

<?php
$conn= mysqli_connect("localhost","root","","res_sys");
$sql="Select * FROM student AS std LEFT JOIN department AS dep ON std.Dname=dep.Dname";
$result=mysqli_query($conn,$sql);
?>
<table >
    <tr width="300px">
    <th width="300px">Studen Name</th>
    <th width="300px">Department</th>
    </tr>
    <?php
    while ($row=mysqli_fetch_array($result)) {
         $name = $row['S_Name'];
         $semistor = $row['Dname'];
        ?>
        <tr >
            <td><?php echo $name?></td>
            <td><?php echo $semistor?></td>
        </tr>


        <?php
    }
    ?>

</table>

</body>
</head>
</html>

