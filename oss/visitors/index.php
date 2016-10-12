
<?php
include("function/function.php");
session_start();
if($_SESSION['vid']!="") {
    ?>
        <?php headder();?>
               <div class="col-lg-8  cus-insert">
                    <form action="function/function.php" method="post" enctype="multipart/form-data"  name="prod_form">

                        <div class="form-group col-md-6">
                            <label class="small ">Product name:</label>
                            <input type="text" name="p_name" class="col-lg-2 form-control"
                                   placeholder="Enter Product name">
                        </div>

                        <div class="form-group col-md-6 ">
                            <label class="small">Price:</label>
                            <input type="text" name="price" class="form-control" placeholder="Enter price">

                        </div>

                        <div class="form-group col-md-4">
                            <label class="small">Type</label>
                            <select name="type" class="form-control">

                                <option>Select Type</option>
                                <option>Mobile</option>
                                <option>Bike</option>
                                <option>vehicle</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4 ">
                            <label class="small">On Bet</label>
                            <select name="on_bet" class="form-control" re>

                                <option >No</option>
                                <option>Yes</option>
                            </select>
                        </div>
                        <input type="hidden" name="vid" value="<?php echo $_SESSION['vid'];?>">
                        <div class="form-group col-lg-5 img-group ">
                            <label class="small">Upload Images</label>
                            <input type="file" name="file[]" class="form-control" style="margin-top: 0px">
                            <input type="file" name="file[]" class="form-control" style="margin-top: 14px">
                            <input type="file" name="file[]" class="form-control" style="margin-top: 14px">
                        </div>

                        <div class="form-group col-lg-7">

                            <label class="small">description</label>
                            <textarea name="description" id="" cols="70" rows="6" class="form-control" placeholder="Enter Description here"></textarea>
                        </div>
                        <div class="form-group col-lg-12">
                            <button type="submit" name="pro_submit" class="btn btn-default pull-right">Submit</button>
                        </div>
                    </form>
                </div>
          <?php footer();?>
    <?php
}
else{
    header("location:../login.php");
}
?>

<!--echo "<script>alert('$vid')</script>";-->
