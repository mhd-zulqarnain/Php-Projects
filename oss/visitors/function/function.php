<?php
function myconnection(){

    return mysqli_connect("localhost","root","","oss");

}




function sellout(){

    get_loaded_extension
}
//-----------------product add-----
if (isset($_POST['pro_submit'])) {

    $con=myConnection();
    $p_name = $_POST['p_name'];
    $price = $_POST['price'];
    $type = $_POST['type'];
    $on_bet = $_POST['on_bet'];
    $description = $_POST['description'];
    $vid = $_SESSION['vid'];

    if($on_bet!="Yes"){
        $bet='0';
    }
    else
        $bet='1';
    echo $bet;
    $file_name=$_FILES['file']['name'];
    $file_path=$_FILES['file']['tmp_name'];
    $arr_path=array();
    $arr_name=array();
    foreach ($file_path as $item)
        array_push($arr_path,$item);
    foreach ($file_name as $item)
        array_push($arr_name,$item);
    $img_path=json_encode($arr_name);
    $sql="insert into productdetails(p_name,price,type,description,vid,sell_out,on_bet,image) 
                                VALUES ('$p_name','$price','$type','$description','$vid','0','$bet','$img_path')";
    if($con->query($sql)){
        move_uploaded_file($arr_path[0],"images/".$arr_name[0]);
        move_uploaded_file($arr_path[1],"images/".$arr_name[1]);
        move_uploaded_file($arr_path[2],"images/".$arr_name[2]);
        header("location:items.php");
    }

}
//................end product entery...........

function title(){
    echo '

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link href="style/visitor.css" rel="stylesheet">
        <link href="style/bootstrap.min.css" rel="stylesheet">
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/custom.js"></script>
    </head>
    <body>
    <div class="container">
        <div class="col-lg-12 header" style="height: 60px;background-color: red">
        <div class="col-lg-3 pull-right"><a href="logout.php" class="btn btn-md pull-right btn-logout ">Logout</a></div>
        </div>
    ';
}
function sideBar(){
    echo '<div class="col-lg-2 side-bar" style="height: 100px;background-color:rebeccapurple">
                <h3 class="list-group-item">Action</h3>
                <ul class="list-group">
                    <li class="list-group-item"><a href="index.php">Add new items</a></li>
                    <li class="list-group-item"><a href="items.php">My items</a></li>
                    <li class="list-group-item"><a href="">dfasdf</a></li>
                </ul>
            </div>';
}




?>

