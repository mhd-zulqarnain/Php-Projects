<?php
$con=myConnection();
$sql1="SELECT DISTINCT category FROM post;";
$res=$con->query($sql1);

?>

<div class="col-lg-12  main-category ">
    <h3 class="text-primary label-header">Labels</h3>
    <div class="col-lg-12 pull-right well category-label">



            <?php

            while ($row=mysqli_fetch_array($res))
            {

                $category=$row['category'];

                ?>
                <div class="col-lg-6 col-lg-pull-0">
                <ul class="list-unstyled">

                    <li><a href="lable.php?&category=<?php echo $category?> "><?php echo $category?></a>



                    </li>
                </ul>

        </div>
        <?php } ?>
    </div>
</div>



