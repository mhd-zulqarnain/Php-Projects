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
<div class="container-fluid">
    <?php headder();
    sideBar();

    ?>
    <div class="col-lg-10 heading" style="height:98px;border-bottom: 1px solid red">
        <h3>Products For Approval</h3>
    </div>
    <div class="col-lg-10" id="display_info">

        <div class="col-lg-12 wrapper">
            <div class="col-lg-3 title"><b>Product name</b></div>
            <div class="col-lg-3 title"><b>Owner</b></div>
            <div class="col-lg-2 title"><b>Price</b></div>
            <div class="col-lg-4 title"><b>Approval</b></div>


            <?php
            $sql = "SELECT productdetails.*,visitor.name FROM productdetails LEFT JOIN visitor ON
                  productdetails.vid=visitor.vid WHERE productdetails.approved=0";
            $res = Run($sql);
            if (mysqli_num_rows($res) == 0) {
                echo '<br><br><span class="alert-danger"> No product to get approved</span>';
            }
            while ($row = mysqli_fetch_array($res)) {
                $pid = $row['pid'];
                $p_name = substr(strtoupper($row['p_name']), 0, 6) . '..';
                $name = $row['name'];
                $price = $row['price'];
                $pid = $row['pid'];
                $img = $row['image'];
                $image = array();
                $image = json_decode($img);

                ?>
                <div class="row1">
                    <div class="col-lg-12 target">
                        <div class="col-lg-3" style="color: #0A246A"><?php echo $p_name ?><span class="fa fa-arrow-down"
                                                                                                style="color: red;font-size: 12px">IMAGES</span>
                        </div>
                        <div class="col-lg-3"><?php echo $name ?></div>
                        <div class="col-lg-2"><?php echo $price ?></div>
                        <div class="col-lg-4">
                            <div class="col-lg-2">
                                <form class="myform" style="color: red;font-size: 10px">
                                    Approve &nbsp;<input id="checkbox" value="<?php echo $pid ?>" type="checkbox">
                                </form>
                            </div>
                            <div class="col-lg-2">
                                <form class="disform" style="color: red;font-size: 10px">
                                    Disaprove &nbsp;<input id="checkbox1" value="<?php echo $pid ?>" type="checkbox">
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-12 dist" style="display: none;">
                        <?php
                        $def = 'noimage.png';
                        $path = (empty($image[0]) ? $def : $image[0]);
                        for ($i = 0; $i < 5; $i++) {
                            $path = (empty($image[$i]) ? $def : $image[$i]);
                            echo '<div class="col-lg-2 " style="height:100px;overflow-y: scroll">
                            <img src="../visitors/images/' . $path . '" height="200px" width="200px"
                                 class="img-fluid" style="height:auto;max-width:100%;">

                        </div>';
                        }
                        ?>

                    </div>

                </div>


            <?php } ?>

        </div>
    </div>
    <?php
    footer();

    }
    else {
        header("location:login.php");
    }

    ?>

