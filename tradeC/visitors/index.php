
<?php
include("function/function.php");
session_start();
if($_SESSION['vid']!="") {
    $id=$_SESSION['vid'];
    headder();
    ?>


    <?php sideBar();?>

    <div class="col-lg-10">
        <h3 style="color: midnightblue"><span class="fa fa-plus "></span> Add New Ads</h3>
        <hr />
        <input type="hidden" value="<?php echo $_SESSION['vid']?>" class="vid" />
        <div class="col-lg-12  cus-insert">
            <form action="function/function.php" method="post" enctype="multipart/form-data" name="prod_form">

                <div class="form-group col-md-6">
                    <label class="small ">Product name<span style="color: red">*</span></label>
                    <input type="text" name="p_name" class="col-lg-2 form-control" required
                           placeholder="Enter Product name">
                </div>

                <div class="form-group col-md-6 ">
                    <label class="small">Price<span style="color: red">*</span></label>
                    <input type="text" name="price" class="form-control" placeholder="Enter price(RS 1000-100000)" pattern="^[0-9]{4}|[0-9]{5}|[0-9]{6}$" title="Enter valid price between RS 1000 to 100000" required>

                </div>

                <div class="form-group col-md-4">
                    <label class="small">Type<span style="color: red">*</span></label>
                    <select name="type" class="form-control" required >

                        <option value="" disabled selected>Select your option</option>
                        <option value="Mobile">Mobile            </option>
                        <option value="Car_Vechiles">Car & Vechiles    </option>
                        <option value="Electrics_Gidget">Electrics & Gidget</option>
                        <option value="Books_Maginzes">Books & Maginzes  </option>
                        <option value="RealEstate">Real Estate       </option>
                        <option value="Sports_Games">Sports & Games    </option>
                        <option value="Fashion_Beauty">Fashion & Beauty  </option>
                        <option value="HomeAppliances">Home Appliances   </option>
                        <option value="Music_Arts">Music & Arts      </option>
                        <option value="Pets_Animals">Pets & Animals    </option>
                    </select>
                </div>

                <div class="form-group col-md-4 ">
                    <label class="small">Brand<span style="color: red">*</span></label>
                    <input type="text" name="brand" class="form-control" placeholder="Enter Brand name" required>

                </div>
                <div class="form-group col-md-4 ">
                    <label class="small">Location<span style="color: red">*</span></label>
                    <select name="location" class="form-control" title="Please Select City" required>
                        <option selected>Karachi</option>
                        <option>Lahore</option>
                        <option>Islamabad</option>
                        <option>Multan</option>
                        <option>Other City</option>

                    </select>
                </div>
                <div class="form-group col-lg-5 img-group ">
                    <label class="small">Upload Images<span style="color: red">*(minimun 2 pics)</span></label>
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

                <input type="hidden" name="vid" value="<?php echo $_SESSION['vid'];?>">
                <div class="form-group col-lg-12">
                    <button type="submit" name="pro_submit" class="btn btn-default pull-right">Submit</button>
                </div>

            </form>
        </div>

        <input type="hidden" class="vid" value="<?php echo $_SESSION['vid'];?>">
    </div>
    <?php footer();?>
    <?php
}
else{
    header("location:../login.php");
}
?>