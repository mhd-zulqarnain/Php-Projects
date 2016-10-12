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
if(isset($_REQUEST['update_pro'])){
    echo $pid=$_REQUEST['update_pro'];
    echo $status= $_REQUEST['status'];
    $sql="update productdetails set on_bet='$status' WHERE pid='$pid'";
    $res=Run($sql);
    if($sql)
    {
        header("location:../prodetails.php?p_id=$pid");
    }
}
//___________buying record
function buy($vid){

  $query = "SELECT D.pid,date(D.B_date),V.name,P.p_name,P.price FROM deals AS D  join productdetails As P on D.pid=P.pid
                JOIN visitor AS V on V.vid=D.vid WHERE V.vid='$vid'";
    $res=Run($query);

    echo '
    <div class="col-lg-6">
    <h2>Previous Shopping Details</h2>
    <table class="table">
            <th>Product name</th>
                    <th>Price</th>
                    <th>Date</th>
                    <tr>';
    if(mysqli_num_rows($res)>0){
    while ($row=mysqli_fetch_array($res))
    {
            $name=$row['name'];
            $pname=$row['p_name'];
            $price=$row['price'];
            $date=$row['date(D.B_date)'];
        echo '      <td>'.$pname.' </td>
                    <td>'.$price.'</td>
                    <td>'.$date.'</td>
                    </tr>';
    }
    }
    else{
        echo' <hr><h2 class="alert-danger ">No transision record</h2>';
    }
    echo' </table>
    </div>
    ';
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
        <script type="text/javascript" src=".."></script>
        <script type="text/javascript" src="js/custom.js"></script>
    </head>
    <body>
    <div class="container">';
    sideBar();
        echo'
        <div class="col-lg-10 header" style="height: 40px;background-color: #a94a42">
        <div class="col-lg-3 pull-right"><a href="../logout.php" class="btn btn-md pull-right btn-logout ">Logout</a></div>
        </div>
        <div class="col-lg-10" style="height:98px;border-bottom: 1px solid red"></div>
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
                <a href="items.php"><li class="list-group-item fa fa-dashboard fa-1x"></li>
                    <span>Dashboard</span>
                    </a>
                    <hr>
                   <a href="index.php"> <li class="list-group-item fa fa-tags fa-1x"></li>
                   <span>Add New</span>
                   </a>
                   <hr>
                    <a href=""><li class="list-group-item fa fa-eye fa-1x"></li>
                    <span>testbar</span>
                    </a>
                    
                   <hr>
                </ul>
            </div>';
}




?>

