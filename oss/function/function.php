<?php
function myconnection(){

    return mysqli_connect("localhost","root","","oss");
}
$con=myconnection();
function getCat(){
    global $con;
    $lable="    SELECT DISTINCT type FROM productdetails";
    $res=mysqli_query($con, $lable);
    while($row=mysqli_fetch_array($res)){
        $lable=$row['type'];
        $lable=strtoupper($lable);
        echo "
            <li><a href='index.php?cat=$lable'>$lable</a></li>";
    }
}

function getPro(){
    if(!isset($_REQUEST['cat'])){
        global $con;
        $lable = "select * from productdetails";
        $res = mysqli_query($con, $lable);
        while ($row = mysqli_fetch_array($res)) {
            $name = $row['p_name'];
            $price = $row['price'];
            $id = $row['pid'];
            echo "
            <div class='col-lg-5 prod_body'>
            
             <img src='../Final/assets/images/avatar.png' height='250px' width='250px'>
            <h3>$name</h3>
            <h5>Price:$price </h5>
            <a href='details.php?&id=$id'class='btn btn-primary btn-sm'> Own it</a>
            </div>
            ";
        }
    }
}
function getCatPro(){
    if(isset($_REQUEST['cat'])){

        global $con;
        $cat=$_REQUEST['cat'];
        $lable = "select * from productdetails WHERE type='$cat'";
        $res = mysqli_query($con, $lable);
        while ($row = mysqli_fetch_array($res)) {
            $name = $row['p_name'];
            $price = $row['price'];
            $id = $row['pid'];
            echo "
            <div class='col-lg-5 prod_body'>
            
             <img src='../Final/assets/images/avatar.png' height='250px' width='250px'>
            <h3>$name</h3>
            <h5>Price:$price </h5>
            <a href='details.php?&id=$id'class='btn btn-primary btn-sm'> Own it</a>
            </div>
            ";
        }
    }
}

function getProDetails(){
    global $con;
    $id=$_REQUEST['id'];
    $lable="select * from productdetails WHERE pid='$id'";
    $res=mysqli_query($con, $lable);
    while($row=mysqli_fetch_array($res)){
        $name=$row['p_name'];
        $price=$row['price'];
        $id=$row['pid'];
        echo "
            <div class='col-lg-12 prod_body'>
            
             <img src='../Final/assets/images/avatar.png' height='250px' width='250px'>
             <img src='../Final/assets/images/avatar.png' height='250px' width='250px'>
            <h3>$name</h3>
            <h5>Price:$price </h5>
            <a href=''class='btn btn-primary btn-sm'> Own it</a>
            </div>
            ";
    }
}
?>

