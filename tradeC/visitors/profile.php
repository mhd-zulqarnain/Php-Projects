
<?php
include("function/function.php");
session_start();
if($_SESSION['vid']!="") {
    $id=$_SESSION['vid'];
    headder();
    sideBar();

    ?>

    <div class="col-lg-10" style="border-bottom: 1px solid red">
        <h3 style="color: midnightblue"><span class="fa fa-user fa-1x"></span> Profile</h3>
    </div>
    <div class="col-lg-10 wrapper">
    <div class="col-lg-12 cus-action">


    <?php
    $sql = "Select * from visitor WHERE vid='$id'";
    $res=Run($sql);
    while ($row=mysqli_fetch_array($res)){
        $uname=$row['user_name'];
        $name=$row['name'];
        $pass=$row['password'];
        $mobile=$row['ph_number'];
    }

    ?>
    <div class="col-lg-10">

        <div class="col-lg-10" style="padding: 20px!important;">
            <img src="../images/avatar.png" alt="" height="100" width="100">
        </div>
        <div class="col-lg-6">
            <form action="function/function.php" method="post" class="form-horizontal">
                <div class="form-group">
                    <label class="control-label col-sm-2" >Username:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="uname" value="<?php echo $uname?>" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" >Name:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $name?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Password:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="pwd" value="<?php echo $pass?>">
                    </div>
                </div>
                <input type="hidden" value="<?php echo $id?>" name="vid">
                <div class="form-group">
                    <label class="control-label col-sm-2" >Mobile:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="mobile" value="<?php echo $mobile?>">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="u_update" class="btn btn-default">Update</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

    <?php footer();?>
    <?php
}
else{
    header("location:../login.php");
}
?>