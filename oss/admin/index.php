<?php
include"function/function.php"
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
        .tbl-hide td{display: none}
    </style>
</head>
<body>
<div class="container">
    <div class="col-lg-2 side-bar " style="height: 520px;background-color: rebeccapurple">
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
    </div>
    <div class="col-lg-10 header" style="height: 40px;background-color: #a94a42">
        <div class="col-lg-2 pull-right" style="margin-top: 12px" >
            <div class="dropdown">
                <?php
                $noti="SELECT notification.vid, visitor.name FROM notification LEFT JOIN visitor ON( notification.vid=visitor.vid) where status='0'";
                $num=mysqli_num_rows(Run($noti));
                ?>
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" onclick="admFunc()">Notification
                    <span class="badge" style="background-color: red;color:white"><?php echo $num?></span></button>
                <ul class="dropdown-menu">

                    <?php
                    if($num<0) {
                        ?>
                        <li class="alert-danger"> NO Notification</li>
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
    <div class="col-lg-10" style="height:98px;border-bottom: 1px solid red"></div>
    <div class="col-lg-5" style="height: 900px" id="display_info">
        <table class="table ">
            <th>Product </th>
            <th>Price</th>
            <th>Posted By</th>
            <th>Approval</th>
            <?php
            $sql="SELECT productdetails.*,visitor.name FROM productdetails LEFT JOIN visitor ON
                  productdetails.vid=visitor.vid WHERE productdetails.approved=0";
            $res=Run($sql);
            while($row=mysqli_fetch_array($res)){
                $pid=$row['pid'];
                $p_name=$row['p_name'];
                $name=$row['name'];
                $price=$row['price'];
                $pid=$row['pid'];

                ?>
            <tbody>
            <tr>
            <td class="tbl-inner"> <?php echo $p_name?></td>
            <td> <?php echo $price?></td>
            <td> <?php echo $name?></td>
            <td>
                <form class="myform">
                    Approve &nbsp;<input id="checkbox"  value="<?php echo $pid?>" type="checkbox">
                </form>
            </td>
            </tr>
                <tr class="tbl-hide">
                    <td colspan="4" style="height: 100px; background-color: yellowgreen">
                            <div  class="new" style="height: 50px; background-color: yellowgreen"> gertii

                            </div>

                    </td>
                </tr>
            </tbody>
            <?php }?>

        </table>

    </div>
</div>
</body>
</html>

<script>
    $("tr").on("click",".tbl-inner",function () {
        $(this).closest("tr")
            .siblings('tr')
            .children('td')
            .slideToggle(1000);

        $(this).closest("tbody")
            .siblings("tbody")
            .find("div.new")
            .slideUp(1000);

    })


</script>
<script>
        $('.myform :checkbox').change(function() {


        if(this.checked){
            if(confirm("are your sure")){
                var $pid=$(this).val();
                
                var $object={
                    
                    data:"update", 
                    pid:$pid,
                };
                
                $.ajax({
                   type:"POST",
                    url:"function/function.php",
                    data:$object,
                    success:function (response) {
                        alert('Post has been approved');
                        location.reload();
                    },
                    error:function (error) {
                        alert('error');
                    }
                    
                    
                });
                

            }
            else
                $(this).prop("checked",false)
        }
        else {

        }
    });

        function admFunc(){


            $.ajax({
                type:"POST",
                url:"function/function.php",
                data:"notiadm",
                success:function (success) {
                    location.reload();
                },
                error:function (error) {
                        alert("error in notification");
                        
                    }

                
            });
        }
</script>


<!--<script>
    $('#myform :checkbox').change(function() {
        // this will contain a reference to the checkbox
        if (this.checked) {
            if (confirm("are you sure")) {
                var $value = $(this).val();
                var $obj = {
                    data: "access",
                    value: $value
                };
                $.ajax({
                    type: "POST",
                    url: "function.php",
                    data: $obj,
                    success: function (result) {
                        alert('updated');
                    },
                    error: function (error) {
                        alert('error');
                    }
                });
            } else {
                $(this).prop("checked", false)
            }
        } else {
            $(this).prop("checked", false)
            // the checkbox is now no longer checked
        }
    });

</script>-->