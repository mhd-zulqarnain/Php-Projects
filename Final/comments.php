<?php include 'assets/partial/admHeader.php' ?>
<?php include 'assets/partial/admSidebar.php' ?>
<?php
include "assets/partial/connection.php";
$conn=myConnection();
$sql="Select * from comment";

$res=$conn->query($sql)
?>
<div class="col-lg-10 " style="background-color:#FFFFF0">
<h1 class="text-primary  red">Comment Bar</h1>
    <table class="table">
        <th class="well"><div class="fa fa-comment fa-1x  "></div>Comments</th>
        <th class="well sm-fonts text-center"><div class="fa  fa-edit fa-1x"></div>Action</th>
        <?php
        while ($row=mysqli_fetch_array($res))
        {
            $content=$row['description'];
            $del_id=$row['id'];

            ?>
            <tr >
                <td><?php echo substr($content,0,150)?></td>
                <td class="text-center"><a href="function.php?delid=<?php echo $del_id?>" class="fa fa-times fa-1x"style="color: red"></a></td>
            </tr>
        <?php }?>
    </table>

</div>

<?php include 'assets/partial/admFooter.php' ?>

