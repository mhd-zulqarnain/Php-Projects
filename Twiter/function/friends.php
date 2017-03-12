<div class="modal-dialog">

    <!-- friends model-------------------->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Friends</h4>
        </div>

        <div class="col-lg-12">
            <?php
            //                $sql="Select * from visitor where vid<>'$vid'";
            $con=mysqli_connect("localhost","root","","twt");
            $vid=$_GET['ses'];
            $sql="Select visitor.*,friends.* from visitor JOIN friends WHERE visitor.vid=friends.rid AND friends.vid='$vid'";
            $new=$con->query($sql);
            while($row=mysqli_fetch_array($new)){
                $status=$row['status'];
                ?>
                <div class="col-sm-2">
                    <br>
                    <img src="images/<?php echo $row['prf_pic'];?>" class="img-thumbnail img-responsive" >
                    <h6><?php echo $row['vname'];?></h6>
                    <h5><a class="fa fa-check"  style="color: green"><Followng></Followng></a></h5>

                    <?php
                    /*if($status=='')
                        echo '<button class="btn btn-info btn-add">Add as friend</button>';
                    else if($status=='1')
                        echo'<button class="btn btn-info btn-add" disabled >Already Friends</button>';
                    else if($status=='0')
                        echo'<button class="btn btn-info btn-add" disabled >Request Sent</button>';*/
                    ?>


                </div>
                <?php
            }?>
        </div>
        <div class="col-lg-12">
            <?php
            //                $sql="Select * from visitor where vid<>'$vid'";

            $sql="Select * from visitor where vid not in(select rid from friends WHERE vid='$vid') AND vid<>'$vid'";
            $new=$con->query($sql);
            while($row=mysqli_fetch_array($new)){
                ?>
                <div class="col-sm-2">
                    <br>
                    <input type="hidden" value="<?php echo $row['vid'];?>" class="fri">
                    <img src="images/<?php echo $row['prf_pic'];?>" class="img-thumbnail img-responsive" >
                    <h6><?php echo $row['vname'];?></h6>
                    <?php
                    echo '<button class="btn btn-info btn-add">Follow</button>';
                    ?>


                </div>
                <?php
            }?>
        </div>


        <div class="modal-footer">
        </div>
    </div>
    <!-- Friends-------------------->
</div>

<script>
    $(".btn-add").on("click",function () {
        var $id=$(".fri").val();
        var $ses=$(".ses").val();
        $obj={
            data:"add_friend",
            id:$id,
            ses:$ses,
        };
        console.log($obj);
        $.ajax({
            type:"POST",
            url:"function/function.php",
            data:$obj,
            success:function(success) {
                $.get("function/friends.php?ses="+$ses,function(data) {
                    $("#myfriends").html(data);
                })
            },
        });

    })


</script>