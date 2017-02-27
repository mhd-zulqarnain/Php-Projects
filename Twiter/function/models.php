
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Setting model-------------------->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Profile Setting</h4>
            </div>

            <div class="col-lg-12">
                <form action="function/function.php" method="post"  enctype="multipart/form-data" class="form-horizontal">
                    <div class="col-lg-12" style="padding: 20px!important;">

                        <img src="images/<?php echo $result['prf_pic']?>" class="img-thumbnail" height="100" width="100">
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Change Profile:</label>
                            <div class="col-sm-10">
                                <br>    <input type="file"  name="prf_pic" >
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" >Username:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="uname" value="<?php echo $result['uname']?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  name="name" value="<?php echo $result['vname']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Password:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="pwd" value="<?php echo $result['password']?>">
                        </div>
                    </div>
                    <input type="hidden" value="<?php echo $result['vid']?>" name="vid">


                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" name="u_update" class="btn btn-default">Update</button>
                        </div>
                    </div>
                </form>
            </div>


            <div class="modal-footer">
            </div>
        </div>
        <!-- Setting model------------------->
    </div>
</div>

<div class="modal fade" id="myfriends" role="dialog">
    <div class="modal-dialog">

        <!-- friends model-------------------->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Friends</h4>
            </div>

            <div class="col-lg-12">
                <?php
                $sql="Select * from visitor where vid<>'$vid'";
                $new=Run($sql);
                while($row=mysqli_fetch_array($new)){
                    ?>
                    <div class="col-sm-3">
                        <br>
                        <input type="hidden" value="<?php echo $row['vid'];?>" class="fri">
                        <img src="images/<?php echo $row['prf_pic'];?>" class="img-thumbnail img-responsive" height="80" width="80">
                        <h6><?php echo $row['vname'];?></h6>
                        <button class="btn btn-info btn-add">Add as friend</button>

                    </div>
                    <?php
                }?>
            </div>


            <div class="modal-footer">
            </div>
        </div>
        <!-- Friends-------------------->
    </div>
</div>