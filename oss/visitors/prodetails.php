<?php
session_start();
include("function/function.php");
if($_SESSION['vid']=!'')
{
headder();
    ?>
    <?php
    if(isset($_REQUEST['p_id'])){
        $pid=$_REQUEST['p_id'];

        $sql="Select * from productdetails WHERE pid='$pid'";
        $result=Run($sql);
         $ar = [];
        while ($row=mysqli_fetch_array($result)) {
            $img = JSON_DECODE($row['image']);
            $des=$row['description'];

            if($row['sell_out']=='1')
                $status="Sell out";
            else
                $status="Not Sell";
            if($row['on_bet']=='1') {
                $bet = "ON Bet";
                $st="not BEt";
            }
            else{
                $st="On Bet";
                $bet="Not Bet";
            }

            ?>
            <div class="col-lg-12">
                <div class="col-lg-4 pull-right" style="height: 400px;background-color: #00AAE7">
                    <img src="<?php echo "images/" . $img[0] ?>" alt="" height="300" width="280">
                </div>
                <div class="col-lg-8 pull-right" style="height: 400px;background-color:#4fa2c2">
                    <h3><?php echo strtoupper($row['p_name']."<hr>")?></h3>
                    <h4>Price:<?php echo $row['price']?></h4>
                    <h4>Status:<?php echo $status?></h4>

                        <?php if($row['sell_out']!='1')?>
            
                        <h4 href="#"> Item Bought By:</h4>
                    <h5>Description:<?php echo $des?></h5>

                        <select name="" id="">
                            <option value=""> <?php echo $bet?></option>
                            <option value=""> <?php echo $st?></option>
                        </select>
                    </h5>
                    <?php if($row['sell_out']!='0')?>
                    <a href="#"> Update</a>



                </div>
            </div>
            <?php
        }?>
    <?php
    }
    else
        echo "<script>alert('No product to show')</script>"
    ?>
<?php
    footer();
}else
    header("location:login.php");
?>