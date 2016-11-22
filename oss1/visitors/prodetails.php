<?php
include("function/function.php");

session_start();
if($_SESSION['vid']!="")
{
    $vid=$_SESSION['vid'];
    headder();
    if (isset($_REQUEST['p_id'])) {
        $pid = $_REQUEST['p_id'];

        $sql = "Select * from productdetails WHERE pid='$pid'";
        $result = Run($sql);
        $ar = [];
        while ($row = mysqli_fetch_array($result)) {
            $img = JSON_DECODE($row['image']);
            $des = $row['description'];
            $pid = $row['pid'];

            if ($row['sell_out'] == '1')
                $status = "Sell out";
            else
                $status = "Not Sell";
            if ($row['on_bet'] == '1') {
                $bet = "ON Bet";
                $st = "not BEt";
            } else {
                $st = "On Bet";
                $bet = "Not Bet";
            }

            ?>
            <div class="col-lg-12">
                <div class="col-lg-4 pull-right" style="background-color: white">
                    <img src="<?php echo "images/" . $img[0] ?>" alt="" height="300" width="280">

                    <img src="<?php echo "images/".$img[0]?>" alt="" height="85" width="85" class="col-lg-4">
                    <img src="<?php echo "images/".$img[1]?>" alt="" height="85" width="85" class="col-lg-4">
                    <img src="<?php echo "images/".$img[2]?>" alt="" height="85" width="85" class="col-lg-4">
                </div>
                <div class="col-lg-8 pull-right" style="height: 400px;background-color:white">
                    <h3><?php echo strtoupper($row['p_name'] . "<hr>") ?></h3>
                    <h4>Price:<?php echo $row['price'] ?></h4>
                    <h4>Status:<?php echo $status ?></h4>

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
                    <h5>Description:<?php echo $des ?></h5>
                    <?php if ($row['sell_out'] != '1') { ?>
                        <select name="status" id="">
                            <option value=""> <?php echo $bet ?></option>
                            <option value=""> <?php echo $st ?></option>
                        </select>
                        <br><br>
                        <a href="function/function.php?update_pro=<?php echo $row['pid']?>" class="fa fa-eye fa-1x"> Update</a>
                        <a href="index.php?pid=<?php echo $pid?>" class="fa fa-edit fa-1x " id="edit">Edit</a>
                        <a href="function/function.php?re_pid=<?php echo $pid?>" onclick="return confirm('Are you sure?')" class="fa fa-times fa-1x " id="delete" style="color: red;">Remove</a>
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