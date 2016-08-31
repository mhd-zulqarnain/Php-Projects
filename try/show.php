<?php
include 'Connect.php';

$conn=connect_db();

?>

<!DOCTYPE html>
<html>
<head>
    <style>
        th{
            width: 300px;
        }
        body{
            text-align: center;
        }
    </style>
</head>
<body>

<table>
    <tr>
        <th> name</th>
        <th> class </th>
        <th>action</th>
    </tr>
    
    <?php
    $sql="SELECT* FROM info";
    if($conn->query($sql))
        $res=mysqli_query($conn,$sql);
    else
        echo"error";
        while ($row=mysqli_fetch_array($res))
    {
            $name=$row['name'];
            $class=$row['class'];
            $status=true;

        ?>
   <tr>
       <td><?php echo $name?></td>
       <td><?php echo $class?></td>
       <td><a href="edit.php?class=<?php echo$class?>&name=<?php echo$name?>&status=<?php echo$status?>">edit</a></td>
   </tr>
    <?php
    }
    ?>
</table>
</body>
</html>
