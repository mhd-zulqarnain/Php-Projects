<?php
function myconnection(){

    return mysqli_connect("localhost","root","","oss");
}
$con=myconnection();

function Run($query){
    global $con;
    return $con->query($query);
}
function removePro($id){
    $sql="Delete from productdetails where pid='$id'";
    return Run($sql);
}

function isSell(){
    $con=myconnection();
    $sql="Select sell_out from productdetails";
    Run($sql);
}
///....remove items
if(isset($_REQUEST['re_pid'])){
    $id=$_REQUEST['re_pid'];
    if(removePro($id))
    header("location:../items.php");

}
//-----------------product add-----
if (isset($_POST['pro_submit'])) {

    $con=myConnection();
    $p_name = $_POST['p_name'];
    $price = $_POST['price'];
    $type = $_POST['type'];
    $on_bet = $_POST['on_bet'];
    $description = $_POST['description'];
    $vid = $_POST['vid'];
    if($on_bet!="Yes"){
        $bet='0';
    }
    else
        $bet='1';
    $file_name=$_FILES['file']['name'];
    $file_path=$_FILES['file']['tmp_name'];
    $arr_path=array();
    $arr_name=array();
    foreach ($file_path as $item)
        array_push($arr_path,$item);
    foreach ($file_name as $item)
        array_push($arr_name,$item);
    $img_path=json_encode($arr_name);
    $sql="insert into productdetails(p_name,price,type,approved,description,vid,sell_out,on_bet,image) 
                                VALUES ('$p_name','$price','$type','0','$description','$vid','0','$bet','$img_path')";

    if($con->query($sql)){
        move_uploaded_file($arr_path[0],"../images/".$arr_name[0]);
        move_uploaded_file($arr_path[1],"../images/".$arr_name[1]);
        move_uploaded_file($arr_path[2],"../images/".$arr_name[2]);
        header("location:../items.php");
    }
    else{
        echo "error";
    }

}
//................end product entery..
function headder(){
    echo '

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link href="style/visitor.css" rel="stylesheet">
        <link href="style/bootstrap.min.css" rel="stylesheet">
        <link href="style/font-awesome.min.css" rel="stylesheet">
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/custom.js"></script>
    </head>
    <body>
    <div class="container">';
    sideBar();
        echo'
        <div class="col-lg-10 header" style="height: 40px;background-color: #a94a42">
        <div class="col-lg-3 pull-right"><a href="logout.php" class="btn btn-md pull-right btn-logout ">Logout</a></div>
        </div>
        <div class="col-lg-10" style="height:60px;"></div>
        <div class="col-lg-10 wrapper">
        ';

      echo' <div class="col-lg-12 cus-action">';

}
function footer(){

    echo '
      </div>
        </div>


    <div class="col-lg-12 footer" style="height: 30px;border-bottom: 1px solid red;">
    </div>
    </div>

    </body>
    </html>
    ';
}
function sideBar(){
    echo '<div class="col-lg-2 side-bar" style="height: 520px;>
                <h3 class="list-group-item">Action</h3>
                <ul class="list-group">
                   <a href="index.php"> <li class="list-group-item fa fa-camera fa-1x"></li>
                   <span>Add new items</span>
                   </a>
                    <a href="items.php"><li class="list-group-item fa fa-eye-slash fa-1x"></li>
                    <span>My items</span>
                    </a>
                    <a href=""><li class="list-group-item fa fa-eye fa-1x"></li>
                    <span>testbar</span>
                    </a>
                </ul>
            </div>';
}




?>

