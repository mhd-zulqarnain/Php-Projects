<div class="col-lg-2 pull-right notification" style="margin-top: 2px" >
    <div class="dropdown">
        <?php
        $id=$_SESSION['vid'];
        
        UpdateStatus($id);
        
        $noti="SELECT notification.pid,notification.vid,notification.message, visitor.name FROM notification LEFT JOIN visitor ON( notification.vid=visitor.vid) where status='1' AND notification.vid='$id'";
        $num=mysqli_num_rows(Run($noti));
        if($num==0)
            $des="";
        else
            $des="data";
        ?>
        <input type="hidden" value="<?php echo $des?>" class="grab">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"  onclick="visFunc(<?php echo $id?>)">Notification
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
                    $message=$row['message'];
                    $pid=$row['pid'];
                    ?>
                    <li style="color: blue">

                        <span class="small"><a href="prodetails.php?p_id=<?php echo $pid?>"><?php echo " ".$message?></a></span></li>
                <?php }
            }?>
        </ul>
    </div>

</div>

<script>
    function visFunc(id){
        var $val=$(".grab").val();
        var $id=id;
        if($val!="")
        {
            $obj={
                data:"udata",
                vid:$id
            };
            $.ajax({
                type:"Post",
                url:"function/function.php",
                data:$obj,
                success:function (success) {
                    /*setTimeout(function () {
                        location.reload(1);
                    },2000)*/
                },
                error:function (error) {
                    alert('error')
                }
            });
        }
    }

</script>