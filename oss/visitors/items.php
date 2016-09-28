<?php
include("function/function.php");
session_start();
if($_SESSION['vid']!="")
{
    $vid=$_SESSION['vid'];?>

<?php headder();?>
        <div class="col-lg-12 pull-right">
            <form>
                <table class="table table-condensed">
                    <th>Product name</th>
                    <th>Price</th>
                    <th>status</th>
                    <th>Approved</th>
                    <th>Action</th>


                        <?php
                        $sql="Select * from productdetails WHERE vid='$vid'";
                        $res=Run($sql);
                        while($row=mysqli_fetch_array($res)){
                            $pid=$row['pid'];
                            $name=$row['p_name'];
                            $price=$row['price'];
                        if($row['approved']=='1'){
                            $approve="Yes";
                        }
                        else
                            $approve="No";
                            if($row['sell_out']=='1'){
                                $status="Sell out";
                            }
                            else
                                $status="Not sell";
                        ?>
                        <tr>
                        <td>
                            <a href="prodetails.php?p_id=<?php echo $pid?>">
                            <?php echo $name?> </a>
                        </td>
                        <td><?php echo $price?> </td>
                        <td><?php echo $status?> </td>
                        <td><?php echo $approve?> </td>
                        <td>
                            <a href="index.php?pid=<?php echo $pid?>" class="fa fa-edit fa-1x " id="edit">Edit</a>
                            <a href="function/function.php?re_pid=<?php echo $pid?>" class="fa fa-times fa-1x " id="delete" style="color: red;">Remove</a>
                        </td>

                            <?php }?>
                    </tr>
                </table>
            </form>
        </div>
 <?php
    footer();
}else{
    header("location:login.php");
}
?>