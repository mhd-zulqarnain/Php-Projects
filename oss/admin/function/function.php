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
///------------verify--------///
if(isset($_POST['data'])=='update')
{
    $pid=$_POST['pid'];

    $sql="update productdetails set approved='1' WHERE pid='$pid'";

    Run($sql);
}
if(isset($_POST['notiadm']))
{
    $sql="update notification set status='1'";
    Run($sql);
    
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

