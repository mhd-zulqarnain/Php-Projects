<?php

$con=mysqli_connect("localhost","root","","oss1");
function Run($query){
    global $con;
    return $con->query($query);
}

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

        $page=isset($_REQUEST['page'])?$_REQUEST['page']:1;
        $pagecount=($page*4)-4;

        if(!isset($_REQUEST['postname'])){
            $lable = "select * from productdetails WHERE approved=1 limit $pagecount,4";
            $sql1="Select * from productdetails WHERE approved=1"; //for pagination

        }
        else
        {
            $post=$_REQUEST['postname'];
            $lable="Select * from  productdetails where p_name LIKE '%$post%' limit $pagecount,4";
            $sql1="Select * from  productdetails where p_name LIKE '%$post%'";

        }
        $res = mysqli_query($con, $lable);
        //paging....
        echo "<div class='col-lg-12 text-center pull-right site-paging'>";
        $num=mysqli_num_rows(Run($sql1));
        $page=ceil($num/4);
        for($i=1;$i<=$page;$i++){
            if(!isset($_REQUEST['postname'])){
                echo '<a href="index.php?&page=' . $i . '">' . $i . '</a> ';
            }
            else
                echo '<a href="index.php?&page=' . $i . '&postname='.$post.'">' . $i . '</a> ';
        }
        echo "</div>";
        //paging....end/////
        $count=mysqli_num_rows(Run($lable));///TO check the number of post displaying
        if($count>0) {
            while ($row = mysqli_fetch_array($res)) {
                $name = $row['p_name'];
                $price = $row['price'];
                $id = $row['pid'];
                $img = $row['image'];
                $image = array();
                $image = json_decode($img);
                echo "
            <div class='col-lg-5 prod_body' >
            <div class='col-lg-12' style='height: 200px;overflow: hidden'>
            <img src='visitors/images/" . $image[0] . "' height='200px' width='200px' class='img-fluid reponsive' style='height:auto;max-width:100%;'>
            </div>
             
            <h3>$name</h3>
            <h5>Price:$price </h5>
            <a href='detail.php?&id=$id'class='btn btn-primary btn-sm'> Own it</a>
            </div>
            
          
            ";
            }
        }else{
            echo '<div>No post to show</div>';
        }
    }
}
function morePro(){
        global $con;
        $lable = "select * from productdetails WHERE approved=1 limit 7";
        $res = mysqli_query($con, $lable);

          while ($row = mysqli_fetch_array($res)) {
              $name = $row['p_name'];
              $price = $row['price'];
              $id = $row['pid'];
              $img = $row['image'];
              $date = $row['date'];
              $image = array();
              $image = json_decode($img);
              echo '
              <div class="more_prdct2">
							<img src=visitors/images/'.$image[0].'>
								<h5>Rs '.$price.'</h5>
								<h6>'.$name.' </h6>
								<p>Book and Magzine/Mobile Phone</p>
								<div class="more_prdct2_btm">
									<p>'.$date.'</p>
				
				<h6><span style="margin-left:100px;"class="glyphicon glyphicon-tag"></span>Used</h6>
										<span style="margin-left:90%;line-height:25px;"class="glyphicon glyphicon-briefcase">&nbsp;<span class="glyphicon glyphicon-map-marker"></span></span>
				
								</div>
						</div>
              
              
              ';
          }

}
function moreProxm(){
    global $con;
    $lable = "select * from productdetails WHERE approved=1 limit 5";
    $res = mysqli_query($con, $lable);

    while ($row = mysqli_fetch_array($res)) {
        $name = $row['p_name'];
        $price = $row['price'];
        $id = $row['pid'];
        $img = $row['image'];
        $date = $row['date'];
        $type = $row['type'];
        $image = array();
        $image = json_decode($img);
        echo '
              
              
              <div class="ads2 " >
						<div class="sub_ads2">
							<img src=visitors/images/'.$image[0].'>
							<p>Rs '.$price.'</p>
								<h5><center>'.$name.'</center></h5><br>
									<h6>'.$type.'</h6>
										
						</div>
						<div class="btm">
							<p>'.$date.'</p>
								<img src="images/a.png"/>
						</div>
							</div>	
							
              ';
    }

}
function getCatPro(){
    if(isset($_REQUEST['cat'])){

        global $con;
        $cat=$_REQUEST['cat'];
        $page=isset($_REQUEST['page'])?$_REQUEST['page']:1;
        $pagecount=($page*4)-4;
        $lable = "select * from productdetails WHERE type='$cat' AND approved=1 limit $pagecount,4";
        $res = mysqli_query($con, $lable);
        $sql="select * from productdetails WHERE type='$cat' AND approved=1";
        $page=ceil(((mysqli_num_rows($con->query($sql))))/4);
        echo "<div class='col-lg-12 text-center pull-right site-paging'>";
        for($i=1;$i<=$page;$i++){
            echo '<a href="index.php?&page='.$i.'&cat='.$cat.'"> '.$i.'</a>';
        }
        echo '</div>';
        while ($row = mysqli_fetch_array($res)) {
            $name = $row['p_name'];
            $price = $row['price'];
            $id = $row['pid'];
            $img = $row['image'];
            $image=array();
            $image=json_decode($img);
            echo "
            <div class='col-lg-5 prod_body'>
            <div class='col-lg-12' style='height: 200px;overflow: hidden'>
            <img src='visitors/images/".$image[0] ."' height='200px' width='200px' class='img-fluid reponsive' style='height:auto;max-width:100%;'>
            </div>
            <h3>$name</h3>
            <h5>Price:$price </h5>
            <a href='detail.php?&id=$id'class='btn btn-primary btn-sm'> Own it</a>
            </div>
            ";
        }
    }
}
function getUser($pid){
global  $con;
    $sql="Select name from visitor JOIN productdetails WHERE productdetails.vid=visitor.vid AND productdetails.pid='$pid'";
    $run=$con->query($sql);
    $res=mysqli_fetch_assoc($run);
    if($res)
    return  $res['name'];
    else
        return "error";
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
        $img = $row['image'];
        $image=array();
        $image=json_decode($img);
        echo "
            <div class='col-lg-12 prod_body'>
           <div class='col-lg-6' style='height: 200px;overflow: hidden'>
            <img src='visitors/images/".$image[0] ."' height='200px' width='200px' class='img-fluid reponsive' style='height:auto;max-width:100%;'>
            </div> <div class='col-lg-6' style='height: 200px;overflow: hidden'>
            <img src='visitors/images/".$image[1] ."' height='200px' width='200px' class='img-fluid reponsive' style='height:auto;max-width:100%;'>
            </div>
            <h3>$name</h3>
            <h5>Price:$price </h5>
            <a href=''class='btn btn-primary btn-sm'> Own it</a>
            </div>
            ";
    }
}
//Check online

function setOnline($vid){
    $last_activity=$_SESSION['LAST_ACTIVITY'] = time();
    $query="UPDATE visitor SET online='1' WHERE vid='$vid' ";
    $sql = "UPDATE visitor SET login_activity = '$last_activity' WHERE vid = '$vid'";
    Run($query);
    Run($sql);
}
function setOffline($vid){
    $query="UPDATE visitor SET online='0' WHERE vid='$vid' ";
    Run($query);
}
//--------end chat----------
function getUphone($pid){
    $sql="Select V.ph_number from visitor AS V JOIN productdetails AS P ON P.vid=V.vid AND P.pid='$pid'";
    $result=Run($sql);
    while ($row=mysqli_fetch_array($result))
    return $row['ph_number'];
}
function getEmail($pid){
    $sql="Select V.email from visitor AS V JOIN productdetails AS P ON P.vid=V.vid AND P.pid='$pid'";
    $result=Run($sql);
    while ($row=mysqli_fetch_array($result))
        return $row['email'];
}
function getPowner($pid){
    $sql="Select V.name from visitor AS V JOIN productdetails AS P ON P.vid=V.vid AND P.pid='$pid'";
    $result=Run($sql);
    while ($row=mysqli_fetch_array($result))
        return $row['name'];
}
function getName($vid){
    $sql="Select * from visitor WHERE vid='$vid'";
    $result=Run($sql);
    while ($row=mysqli_fetch_array($result))
         $name=$row['name'];
    return $name;
}

function UpdateStatus($vid){
    $_SESSION['LAST_ACTIVITY'] = time();
    $last_activity = $_SESSION['LAST_ACTIVITY'];
    $sql = "UPDATE visitor SET login_activity = '$last_activity' WHERE vid = '$vid'";
    Run($sql);
}
?>

