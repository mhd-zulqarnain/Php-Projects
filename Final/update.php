
<?php include 'assets/partial/admHeader.php' ?>
<?php include 'assets/partial/admSidebar.php' ?>

<div class="col-lg-10" >
    <h2 class="text-primary post-header" ">POSTS<?= uniqid(); ?></h2>
</div>
<div class="col-lg-10  admin-site-publish" >


    <?php

    include "assets/partial/connection.php";
    $conn=myConnection();
    $sql = "Select post.*,post_view.count from post LEFT JOIN post_view ON post.Pid=post_view.Pid ORDER BY `publishDate` DESC";
    $result=$conn->query($sql);
    ?>
    <table class="table table-condensed" >

        <?php
        while ($row=mysqli_fetch_array($result))
        {
            $id=$row['Pid'];
            $title=$row['title'];
            $content=$row['content'];
            $img=$row['image'];
            $date=$row['publishDate'];
            $editor=$row['editor'];
            $category=$row['category'];
            $pid=$row['Pid'];
            $count=$row['count'];
            if($count=='')
                $count=0;
            ?>
            <tbody>
            <tr>
                <td style=" bold;"><?php echo substr( $title,0,32).".."?></td>
                <td ><a href="#"><?php echo $category?></a></td>
                <td ><?php echo $editor?></td>
                <td  class="fa fa-eye fa-1px large-2"><?php echo " ".$count?></td>
                <td><?php echo $date?></td>
                <td>
                    <a href="postBody.php?id=<?php echo $pid?>" class="fa fa-eye fa-1x " id="edit">view</a>
                    <a href="admin.php?data=<?php echo $pid?>" class="fa fa-edit fa-1x " id="edit">Edit</a>
                    <a href="function.php?del_id=<?php echo $pid?>" class="fa fa-times fa-1x " id="delete" style="color: red;">Delete</a>
                </td>
            </tr>

            </tbody>
        <?php }?>
    </table>

</div>

<?php include 'assets/partial/admFooter.php' ?>




