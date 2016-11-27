
<?php
include("function/function.php");
session_start();
if($_SESSION['vid']!="") {
    $id=$_SESSION['vid'];
    headder();


    ?>

    <div class="col-lg-12" style="border-bottom: 1px solid red">
        <h3 style="color: midnightblue"><span class="fa fa-map-o fa-1x"></span>Add New Ads</h3>
    </div>
    <div class="col-lg-10 wrapper">
  <div class="col-lg-12 cus-action">
    <input type="hidden" value="<?php echo $_SESSION['vid']?>" class="vid">
               <div class="col-lg-12  cus-insert">
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
                                <option>Mobile</option>
                                <option>Car_Vechiles</option>
                                <option>Electrics_Gidget</option>
                                <option>Books_Maginzes</option>
                                <option>RealEstate</option>
                                <option>Sports_Games</option>
                                <option>Fashion_Beauty</option>
                                <option>HomeAppliances</option>
                                <option>Music_Arts</option>
                                <option>Pets_Animals</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4 ">
                            <label class="small">Brand:</label>
                            <input type="text" name="brand" class="form-control" placeholder="Enter Brand name">

                        </div>
                        <div class="form-group col-md-4 ">
                            <label class="small">Location </label>
                            <select name="location" class="form-control" required title="Please Select City">
                                <option disabled selected>City</option>
                                <option>Karachi</option>
                                <option>Lahore</option>
                                <option>Islamabad</option>
                                <option>Multan</option>
                                <option>Other City</option>

                            </select>
                        </div>
                        <div class="form-group col-lg-5 img-group ">
                            <label class="small">Upload Images</label>
                            <input type="file" name="file[]" class="form-control" style="margin-top: 0px"  title="must upload two photos" required >
                            <input type="file" name="file[]" class="form-control" style="margin-top: 14px" title="must upload two photos" required >
                            <input type="file" name="file[]" class="form-control" style="margin-top: 14px">
                            <input type="file" name="file[]" class="form-control" style="margin-top: 14px">
                            <input type="file" name="file[]" class="form-control" style="margin-top: 14px">
                        </div>

                        <div class="form-group col-lg-7">

                            <label class="small">description</label>
                            <textarea name="description" id="" cols="70" rows="11" class="form-control" placeholder="Enter Description here"></textarea>
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