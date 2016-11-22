
<?php
include("function/function.php");
session_start();
if($_SESSION['vid']!="") {
    $id=$_SESSION['vid'];
    headder();
    ?>

    <input type="hidden" value="<?php echo $_SESSION['vid']?>" class="vid">
               <div class="col-lg-8  cus-insert">
                    <form action="function/function.php" method="post" enctype="multipart/form-data"  name="prod_form">

                        <div class="form-group col-md-6">
                            <label class="small ">Product name:</label>
                            <input type="text" name="p_name" class="col-lg-2 form-control"
                                   placeholder="Enter Product name">
                        </div>

                        <div class="form-group col-md-6 ">
                            <label class="small">Price:</label>
                            <input type="text" name="price" class="form-control" placeholder="Enter price" pattern="^[0-9]{4}|[0-9]{5}|[0-9]{6}$" title="Enter valid price between RS 1000 to 100000">

                        </div>

                        <div class="form-group col-md-4">
                            <label class="small">Type</label>
                            <select name="type" class="form-control" required >

                                <option value="" disabled selected>Select your option</option>
                                <option>Bike</option>
                                <option>vehicle</option>
                                <option>Electronics & Gedgets</option>
                                <option>Books & Magazines</option>
                                <option>Home Appliances</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4 ">
                            <label class="small">On Bet</label>
                            <select name="on_bet" class="form-control" >

                                <option >No</option>
                                <option>Yes</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-5 img-group ">
                            <label class="small">Upload Images</label>
                            <input type="file" name="file[]" class="form-control" style="margin-top: 0px"  title="must upload two photos" required >
                            <input type="file" name="file[]" class="form-control" style="margin-top: 14px" title="must upload two photos" required >
                            <input type="file" name="file[]" class="form-control" style="margin-top: 14px">
                        </div>

                        <div class="form-group col-lg-7">

                            <label class="small">description</label>
                            <textarea name="description" id="" cols="70" rows="6" class="form-control" placeholder="Enter Description here"></textarea>
                        </div>

                        <input type="hidden"    name="vid" value="<?php echo $_SESSION['vid'];?>">
                        <div class="form-group col-lg-12">
                            <button type="submit" name="pro_submit" class="btn btn-default pull-right">Submit</button>
                        </div>

                    </form>
                </div>
    <input type="hidden" class="vid" value="<?php echo $_SESSION['vid'];?>">

    <?php footer();?>
    <?php
}
else{
    header("location:../login.php");
}
?>