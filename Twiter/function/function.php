
<?php


date_default_timezone_set("Asia/Karachi");

$con=mysqli_connect("localhost","root","","twt");

session_start();
function Run($query){
    global $con;
    return $con->query($query);
}


if(isset($_POST['S_submit'])){

   $name=$_POST['name'];
    $uname=$_POST['uname'];
  $pass=$_POST['pass'];

    $sql="insert into visitor(vname,uname, password) VALUES ('$name','$uname','$pass')";
    $run=Run($sql);
    if($run){
        header("location:../index.php?&a=1");
    }
    else{
        header("location:../index.php?&a=2");
    }

}
//---sign in
if (isset($_POST['submit'])) {
    $name = $_POST['user_name'];
    $pass = $_POST['pass'];

    $sql = "SELECT * from visitor WHERE uname='$name' AND password='$pass'";
    if ($row = mysqli_fetch_array($con->query($sql))) {
        $vid = $row['vid'];

        $_SESSION['vid'] =$vid;
        header("location:../main.php");
    } else
        echo "<script>alert('invlid password')</script>";
    header("location:../index.php");
}

//---sign in


function head(){
    echo
    ' <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

        <script src="js/jquery-3.1.1.min.js"></script>
        <link rel="stylesheet" href="css/bootstrap-theme.css" type="text/css">
        <link rel="stylesheet" href="css/custom.css" type="text/css">
        <script src="js/custom.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.js"></script>
    </head>';
}

//------tweet----
if(isset($_POST['t_submit'])){

     $text=$_POST['text'];
    $time = date("Y-m-d H:i:s");
     $vid=$_SESSION['vid'];

    $file_name=$_FILES['imfile']['name'];
    $file_path =$_FILES['imfile']['tmp_name'];

    move_uploaded_file($file_path,"../images/".$file_name);

    $sql="INSERT INTO post(vid,post_title, post_pic,time) VALUES ('$vid','$text','$file_name','$time')";
    if(Run($sql)){
        header("location:../main.php");
    }


}




//----------------------------**********sign up validata***********_------------------

if (isset($_POST['ins'])=='uname_v') {
    $value=0;
    $name=$_POST['name'];
    $sql="Select vid from visitor WHERE uname='$name'";
    $run=Run($sql);
    if($run->num_rows>0){
        $value=1;
    }
    echo $value;
}

//----------------------------**********update profile***********_------------------
if (isset($_POST['u_update'])) {

    $file_name=$_FILES['prf_pic']['name'];
    $file_path =$_FILES['prf_pic']['tmp_name'];

    move_uploaded_file($file_path,"../images/".$file_name);

    $name = $_POST['name'];
    $pwd = $_POST['pwd'];
    $vid = $_POST['vid'];
if(!empty($file_name)){
    $sql="update visitor set vname='$name',password='$pwd',prf_pic='$file_name' WHERE vid='$vid'";
}
    else
        $sql="update visitor set vname='$name',password='$pwd' WHERE vid='$vid'";

    if(Run($sql))
    {
        header("location:../main.php");
    }

}
//----------------------------**********update profile***********_------------------
//----------------------------**********add friend***********_------------------
if (isset($_POST['data'])=='add_friend') {
    $vid=$_SESSION['vid'];
    $rid=$_POST['id'];
    $sql="insert into friends(vid,rid,status) VALUES('$vid','$rid','0')";
    Run($sql);

}
//----------------------------**********add friend***********_------------------
//----------------------------**********comments***********_------------------

if (isset($_POST['data'])=='comment') {
    $pid=$_POST['pid'];
    $vid=$_SESSION['vid'];
    $text=$_POST['text'];
    $sql="insert into comment(pid,vid,c_text) VALUES('$pid','$vid','$text')";
    Run($sql);

}
//----------------------------**********comments***********_------------------
//----------------------------**********post delete***********_------------------
if (isset($_POST['data'])=='delPost') {
    $pid=$_POST['id'];
    $sql="Delete from post WHERE pid='$pid'";
    Run($sql);

}
//----------------------------**********post delete***********_------------------
?>

