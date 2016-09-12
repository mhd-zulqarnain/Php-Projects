
<?php include 'assets/partial/admHeader.php' ?>
<?php include 'assets/partial/admSidebar.php' ?>

        <div class="col-lg-10  admin-site-publish" style="background-color: #fff; ">


            <?php

            include "assets/partial/connection.php";
            $conn=myConnection();
            $sql = "SELECT * FROM post";
            $result=$conn->query($sql);
            ?>
            <table class="table table-condensed ">
                <thead class="well">
              
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Image</th>
                    <th>Publish Date</th>
                    <th>Editor</th>
                    <th>Catagory</th>
                    <th>Action</th>
                </tr>
                </thead>
                <?php
                while ($row=mysqli_fetch_array($result))
                {
                    $title=$row['title'];
                    $content=$row['content'];
                    $img=$row['image'];
                    $date=$row['publishDate'];
                    $editor=$row['editor'];
                    $category=$row['category'];
                    $pid=$row['Pid'];

                    ?>
                <tbody>
                <tr>
                    <td><?php echo $title?></td>
                    <td><?php echo substr($content,0,20)?></td>
                    <td><?php echo "image"?></td>
                    <td><?php echo $date?></td>
                    <td><?php echo $editor?></td>
                    <td><?php echo $category?></td>
                    <td>
                        <a href="admin.php?data=<?php echo $pid?>" class="fa fa-edit fa-1x" id="edit"></a>
                        <a href="function.php?del_id=<?php echo $pid?>" class="fa fa-times fa-1x" id="delete"></a>
                    </td>
                </tr>

                </tbody>
                <?php }?>
            </table>
        </div>

<?php include 'assets/partial/admFooter.php' ?>




