<?php
$con=myConnection();
$sql1="SELECT * FROM post";
$res=$con->query($sql1);

?>
<div class="well">
    <h4>Blog Categories</h4><div class="row">
        <div class="col-lg-6">


<?php

while ($row=mysqli_fetch_array($res))
{
    $category=$row['category'];

    ?>
            <ul class="list-unstyled">

                <li><a href="categorySearch.php?&category=<?php echo $category?> "><?php echo $category?></a>
<!--            </li>
            </ul>
        <!-- /.col-lg-6 -->
    </div>
<?php } ?>

    <!-- /.row -->
</div>
