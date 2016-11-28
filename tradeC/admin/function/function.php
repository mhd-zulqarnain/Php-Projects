<?php
function myconnection(){

    return mysqli_connect("mysql.2freehosting.com","u940906128_root","parvi167","u940906128_oss");
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
///------------verify------admin--///
if(isset($_POST['data'])=='update')
{
    if(($_POST['data'])=='update'){
    $pid=$_POST['pid'];
    $msg="item has been approved";
    $sql="update productdetails set approved='1' WHERE pid='$pid'";
    $sql1="    UPDATE notification SET  status=1,message='$msg' WHERE pid='$pid'";
    Run($sql1);
    Run($sql);}
}
//disapprove
if(isset($_POST['data']))
{
    if(($_POST['data'])=='disapprove'){
    $pid=$_POST['pid'];
    $sql="Delete from productdetails WHERE pid='$pid'";
    Run($sql);
    }
//    Run("Delete from productdetails WHERE pid='$pid'");
}
function headder(){
    
    echo '<div class="col-lg-12 headder " style="height: 40px;background-color: #a94a42">
            <div class="col-lg-2" style="margin-top: 8px!important; color: #2b4f6d; margin-left: 12px!important;">
            <h3>Admin Panal</h3>
            </div>
            ';

       getNoti();
       echo' <div class="col-lg-3 pull-right"><a href="logout.php" class="btn btn-md pull-right btn-logout ">Logout</a>
        </div>
    </div>';


}
function footer(){

    echo '
    <div class="col-lg-12 footer" style="border-bottom: 1px solid red">
    </div>
        </div>

        </div>

   </body>
   </html>
    ';
}
function sideBar(){
    echo '<div class="col-lg-2 side-bar" style="height: 520px;>
                <h3 class="list-group-item"></h3>
                <ul class="list-group">
                <a href="all_users.php"><li class="list-group-item fa fa-dashboard fa-1x"></li>
                    <span>View Users</span>
                    </a>
                    <hr>
                   <a href="index.php"> <li class="list-group-item fa fa-tags fa-1x"></li>
                   <span>Approval</span>
                   </a>
                   <hr>
                    <a href=""><li class="list-group-item fa fa-eye fa-1x"></li>
                    <span>testbar</span>
                    </a>
                    
                   <hr>
                </ul>
            </div>';
}
function getNoti(){
    echo '
    <div class="col-lg-2 pull-right notification" style="margin-top: 12px" >
            <div class="dropdown">';

                $noti="SELECT notification.vid, visitor.name FROM notification LEFT JOIN visitor ON( notification.vid=visitor.vid) where status='0'";
                $num=mysqli_num_rows(Run($noti));
                $des="data";
                if($num==0)
                    $des="";
                echo '
                <input type="hidden" value="<?php echo $des?>" class="grab">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" >Notification
                    <span class="badge" style="background-color: red;color:white">'. $num.'</span></button>
                <ul class="dropdown-menu">';


                    if($num==0) {

                        echo '<li style="text-align: center" class="alert alert-danger"> NO Notification to show</li>';

                    }
                    else {
                        $res = Run($noti);
                        while ($row = mysqli_fetch_array($res)) {
                            $name = ucfirst($row['name']);


                            echo '<li style="color: blue"><img src="../../Final/assets/images/avatar.png" height="20px"
                                                         width="20px">'. ' '. $name . ' '.'<span
                                    class="small">Added new Item</span></li>';
                        }
                    }
                echo '</ul>
            </div>

        </div>';
}
function cusPro($vid){
    echo '<div class="col-lg-8 pull-left">

                <table class="table table-condensed">
                    <th>Product name</th>
                    <th>Price</th>
                    <th>status</th>
                    <th>Approval</th>
                    <th>Action</th>';

    $page=isset($_REQUEST['page'])?$_REQUEST['page']:1;
    $pagecount=($page*4)-4;

    $sql="Select * from productdetails WHERE vid='$vid' limit $pagecount,4";
    $res=Run($sql);

    while($row=mysqli_fetch_array($res)){
        $pid=$row['pid'];
        $name=$row['p_name'];
        $price=$row['price'];
        if($row['approved']=='1'){
            $approve="Yes";
        }
        else
            $approve="No";
        if($row['sell_out']=='1'){
            $status="Sell out";
        }
        else
            $status="Not sell";

        echo '<tr>
                        <td>'. $name.'</td>
                        <td> '.$price.'</td>
                        <td> '.$status.' </td>
                        <td> '.$approve .'</td>
                        <td><input type="button" onClick="delProd('.$pid.')" value="DELETE" class="btnDel"></td>
                        ';

    }
    echo '</tr>';
    $result=Run("Select * from productdetails WHERE vid='$vid'");
    $num=mysqli_num_rows($result);
    $j=ceil($num/4);
    echo "<div class='col-lg-12 text-center pull-right site-admin-paging'>";
    for ($i=1;$i<=$j;$i++){

        echo '<a href="u_details.php?vid='. $vid.'&page='. $i.'"> '.$i.'</a>';
    }
    echo '</div>';
                echo '</table>';
               $count=mysqli_num_rows($res);
                if($count=='0'){
                    echo '<div class="alert"> No product added</div>';
                }
                echo '</div>
';
}
if(isset($_POST['data'])){

if(($_POST['data'])=='del'){
    $vid=$_POST['value'];
    $sql="DELETE from productdetails WHERE vid='$vid'";
    Run($sql);
    $sq2="DELETE from notification WHERE vid='$vid'";
    Run($sq2);
    $sq1="DELETE from visitor WHERE vid='$vid'";
    Run($sq1);
    }
    elseif ($_POST['data']=='delpro'){
        $pid=$_POST['value'];
        $sql="DELETE from productdetails WHERE pid='$pid'";
        Run($sql);
        $sq2="DELETE from notification WHERE pid='$pid'";
        Run($sq2);
    }
}


?>

