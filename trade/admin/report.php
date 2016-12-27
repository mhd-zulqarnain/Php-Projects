<?php
include "function/function.php";

session_start();
if (isset($_SESSION['uid']))
{
?>
<!doctype html>
<html lang="en" xmlns:height="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="style/admin.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/custom.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>

</head>
<body>

<?php
$sql="Select sum(p.price) as tprice from productdetails as p JOIN deals as d on p.pid=d.pid ";
$data=mysqli_fetch_assoc(Run($sql));
$res=$data['tprice'];
//echo "<script>alert('$res')</script>";
?>

<div class="container-fluid">
    <?php headder();
    sideBar();

    ?>
    <div class="col-lg-10 heading" style="height:98px;border-bottom: 1px solid red">
        <h3>Reports</h3>
    </div>
    <div class="col-lg-8 " id="display_info" style="">


            <div class="col-lg-6" style="margin: 20px 20px!important;">
                Total transition:<a style="pointer-events: none"><?php echo $res?></a><br><br>
                <h4>By Date</h4>
                <form action="../transiton.php" method="post">
                <div class="col-lg-6">From:<input type="date" name="date1"></div>
                <div class="col-lg-6">To:<input type="date" name="date2" ></div><br>
                <br>
                <button class="btn btn-primary" ><span class=" fa fa-download" style="color:white"></span>
                Transition</button><br><br><br>
                </form>
            </div>
        <div class="col-md-6">
            <h4>Users Info</h4><a href="../Visitor_Report.php" class="btn btn-primary" >
                <span class=" fa fa-download" style="color:white"></span>
                Generate Report</a>
        </div><br>
    </div>
    <?php
    footer();

    }
    else {
        header("location:login.php");
    }

    ?>

