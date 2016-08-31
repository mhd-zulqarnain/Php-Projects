<!DOCTYPE html>

<style>
    td{
        width: 200px;
    }
</style>
<html>
<body style="text-align: center">
<?php$isClick=false;
?>
<table>
    <tr>
        <td>Roll No</td>
        <td>Name</td>
        <td>Class</td>
    </tr>
<?php


$isClick=false;

$sql="SELECT* FROM info";
$res=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_array($res))
{
    $id=$row['Roll'];
    $name=$row['Name'];
    $class=$row['Class'];
    ?>

    <tr>
        <td> <?php echo $id?></td>
        <td> <?php echo $name?></td>
        <td> <?php echo $class?></td>
    </tr>
<?php }?>
</table>
<!--Display table content ends-->

<!--<form action="--><?php //echo htmlspecialchars($_SERVER['PHP_SELF']) ?><!--">-->
<form action="index.php"">
<input type="text" name="name" placeholder="Enter name here"><br><br>
    <input type="submit" value=" Submit"  <?php $isClick=true?>>

</form>


<?php
$nme = $_GET['name'];
if($isClick) {
    if ($nme == '') {
        echo "<script>alert('plx fill the form')</script>";
        exit();
    } else {

        $ins = "INSERT INTO info(Name) VALUES ('$nme')``";

        if ($conn->query($ins) === TRUE)
            $isClick=false;
    }
}
?>
</body>
</html>