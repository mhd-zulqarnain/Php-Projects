<?php
include"function/function.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="style/admin.css" rel="stylesheet">
    <link href="../style/bootstrap.min.css" rel="stylesheet">
    <link href="../style/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/custom.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>

    <style type="text/css" rel="stylesheet">
        .box{width: 300px;height: 200px;background-color: forestgreen}

    </style>
</head>
<body>
<div class="container"><?php sideBar()?>
<div class="col-lg-10 header" style="height: 40px;background-color: #a94a42">
    <div class="col-lg-2 pull-right" style="margin-top: 12px" >
        <div class="dropdown">
            <?php
            $noti="SELECT notification.vid, visitor.name FROM notification LEFT JOIN visitor ON( notification.vid=visitor.vid) where status='0'";
            $num=mysqli_num_rows(Run($noti));
            $des;
            if($num==0)
                $des="";
            else
                $des="data";
            ?>
            <input type="hidden" value="<?php echo $des?>" class="grab">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"  onclick="admFunc()">Notification
                <span class="badge" style="background-color: red;color:white"><?php echo $num?></span></button>
            <ul class="dropdown-menu">

                <?php
                if($num==0) {
                    ?>
                    <li style="text-align: center" class="alert alert-danger"> NO Notification to show</li>
                    <?php
                }
                else {
                    $res = Run($noti);
                    while ($row = mysqli_fetch_array($res)) {
                        $name = ucfirst($row['name']);

                        ?>
                        <li style="color: blue"><img src="../../Final/assets/images/avatar.png" height="20px"
                                                     width="20px"><?php echo " " . $name . " " ?><span
                                class="small">Added new Item</span></li>
                    <?php }
                }?>
            </ul>
        </div>

    </div>
    <div class="col-lg-3 pull-right"><a href="../logout.php" class="btn btn-md pull-right btn-logout ">Logout</a></div>
</div>