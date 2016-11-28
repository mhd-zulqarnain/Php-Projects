<?php
include("function/function.php");

session_start();
if($_SESSION['vid']!="")
{
    $vid=$_SESSION['vid'];
    headder();
    sideBar();
    echo'
        <div class="col-lg-10" style="height:60px;border-bottom: 1px solid red">
        <h2>Product Detail</h2>
    </div>
        <div class="col-lg-10 ">
        ';

    echo' <div class="col-lg-12 cus-action">';
    if (isset($_REQUEST['p_id'])) {
        $pid = $_REQUEST['p_id'];

        $sql = "Select * from productdetails WHERE pid='$pid'";
        $result = Run($sql);
        $ar = [];
        while ($row = mysqli_fetch_array($result)) {
            $img = JSON_DECODE($row['image']);
            $des = $row['description'];
            $pid = $row['pid'];

            if ($row['sell_out'] != '0')
                $status = '<h5>Status:<h1 style="color: red">Sell out</h1></h5>';
            else
                $status = '<h5>Status:Not Sell</h5>';

            $def='noimage.png';


            ?>
            <div class="col-lg-12">
                <?php
                $path= (empty($img[0])?$def:$img[0])
                ?>
                <div class="col-lg-4 pull-right" style="background-color: white">
                    <img src="<?php echo "images/" . $path ?>" alt="" height="300" width="320">
                   <?php
                   for($i=1;$i<4;$i++){
                       $path= (empty($img[$i])?$def:$img[$i]);
                   ?>

                    <img src="<?php echo "images/".$path?>" alt="" height="85" width="25" class="col-lg-4 img-panel">

                <?php }?>
                </div>
                <div class="col-lg-8 pull-right" style="height: 400px;background-color:white">
                    <h3><?php echo strtoupper($row['p_name'] . "<hr>") ?></h3>
                    <h4>Price:<input type="text" value="<?php echo $row['price'] ?>" class="price"></h4>
                    <?php echo $status ?>


                    <?php if ($row['sell_out'] != '0') {
                        $query = "SELECT visitor.*,date(deals.B_date) FROM visitor inner join deals on deals.vid=visitor.vid WHERE deals.pid='$pid'";
                        $res = Run($query);
                        while ($rw = mysqli_fetch_array($res)) {
                            $buyer = $rw['name'];
                            $date = $rw['date(deals.B_date)']
                            ?>

                            <h4 href="#"> Item Bought By:<?php echo $buyer ?></h4>
                            <h3 href="#"> <?php echo $date ?></h3>
                            <?php
                        }
                    } ?>

                    <?php if ($row['sell_out'] == '0')

                    {
                        ?>
                        <h5>Description:<?php echo $des ?></h5>
                        <select name="sell" id="sell">
                            <option value="1" > Sell</option>
                            <option value="2" selected>Not Sell </option>
                        </select>

                        <select name="buyer" id="buyer"  disabled>
                            <option value="3">Unknown</option>
                            <?php
                            $query="Select name,vid from visitor WHERE vid<>'$vid'";
                            $res=Run($query);
                            while($rw=mysqli_fetch_array($res)){
                            ?>
                            <option value="<?php echo $rw['vid']?>"><?php echo $rw['name']?> </option>
                                <?php }?>
                        </select>

                        <br><br>
<!--                        <a href="" class="fa fa-eye fa-1x update" onclick="updtByer()"> Update</a>-->
                        <button  class="fa fa-eye fa-1x update" onclick="updtByer()" disabled> Update</button>
<!--                        <a href="index.php?pid=--><?php //echo $pid?><!--" class="fa fa-edit fa-1x " id="edit">Edit</a>-->
                        <a href="function/function.php?re_pid=<?php echo $pid?>" onclick="return confirm('Are you sure?')" class="fa fa-times fa-1x " id="delete" style="color: red;">Remove</a>
                        <input type="hidden" id ="ppid" value="<?php echo $row['pid']?>">

                        <?php
                    } ?>


                </div>
            </div>
            <?php
        } ?>
        <?php
    }

    else
        echo "<script>alert('No product to show')</script>"
    ?>
    <?php
    footer();
}else
    header("location:../login.php");
?>
<script>


    $("#sell").change(function () {
        if(this.value=='2')
        {
          $("#buyer").attr('disabled', 'disabled');
          $(".update").attr('disabled', 'disabled');
        }else {
            $("#buyer").removeAttr('disabled');
            $(".update").removeAttr('disabled');
        }

    })
    
    

        function updtByer() {


            var $selected = $("#buyer").val();
            var $pid = $('#ppid').val();
            var $price = $('.price').val();


                $obj={
                    data:'upd_buyer',
                    bname:$selected,
                    pname:$pid,
                    price:$price
                }
                $.ajax({
                    url:'function/function.php',
                    data:$obj,
                    type:'post',
                    sucess:function () {
                        location.reload();
                    }
                })
            }

        

</script>
