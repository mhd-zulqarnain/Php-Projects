<?php

$name=$_GET['name'];
$class=$_GET['class'];
$servername="localhost";
$username="root";
$pass="";
$db="record";

//$check=$_GET['name'];
//$status=false;
$conn=new mysqli($servername,$username,$pass,$db);

$sql1="SELECT* FROM info WHERE name='$name'";
$res=mysqli_query($conn,$sql1);
//
//while($row=mysqli_fetch_array($res))
//{
//    if( $row['name']==$check)
//    $status=true;
//
//}
//
//if($status)
//    echo "Duplicate name";
//else
//
//{
//    $sql="INSERT INTO info(name,class) VALUES('$name','$class')";
//    if($conn->query($sql))
//        header("Location:show.Partial");
//
//
//
//}
$lenght=mysqli_num_rows($res);
if($lenght>0){

    echo "Duplicate name";
}
else
{
        $sql="INSERT INTO info(name,class) VALUES('$name','$class')";
    if($conn->query($sql))
        header("Location:show.Partial");

}
?>