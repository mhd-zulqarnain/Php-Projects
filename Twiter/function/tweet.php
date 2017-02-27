<div>

    <?php
    $vid=$_SESSION['vid'];
    $sql="SELECT visitor.*,post.* FROM post JOIN visitor WHERE visitor.vid=post.vid AND visitor.vid='$vid' ORDER BY post.pid DESC ";
    $run=Run($sql);
    if($run->num_rows==0)
    {
        echo "<h3 class='danger'>No tweet to show</h3>";

    }
    while ($row=mysqli_fetch_array($run)) {
        $pic = $row['post_pic'];
        $prfpic = $row['prf_pic'];
        $text = $row['post_title'];
        $time = $row['time'];
        $uname = $row['uname'];
        $pid = $row['pid'];
        $vname = $row['vname'];

        $prfpic= (empty($prfpic)?$def:$prfpic);
        ?>
        <br>
        <div class="col-sm-12" >
            <div class="col-lg-12">
                <br class="clearfix">
            </div>
            <div class="col-md-12" style="background-color:#ffffff">
                <div class="col-sm-6 row">
                    <img src="<?php echo "images/".$prfpic?>" height="40" width="40"
                         class="img-thumbnail"
                         alt="">
                    <span ><?php echo ucwords($vname)?></span>
                    <span class="sm-font"><?php echo "@".ucwords($uname)?></span>
                </div>
                <br>
                <div class="col-sm-6 pull-right sm-font" ><?php echo $time ?>
                </div>
            </div>
            <div class="col-lg-12" style="background-color:#ffffff ">
                <br class="clearfix">
            </div>

            <div class="col-sm-12 " style="background-color:#ffffff">
                <?php echo ucfirst($text)?><br><br>
                <?php
                if(!empty($pic)){
                    echo '<img src=images/'.$pic.' class="img-responsive">';
                }
                ?>
            </div>
            <!----------------comment -->

            <div class="col-sm-12 "style="background-color: #ffffff">
                <h3 class="sm-font">Comments</h3>

                <div class="form-group" >
                    <input type="hidden" class="cmt_id" value="<?php echo $pid; ?>">
                    <input class="form-control cmt_content" type="text" >
                </div>
                <input type="hidden" value="<?php echo $vid?>" name="id"  id="cmt_id">
            </div>
            <div class="col-sm-12 "style="background-color: #ffffff">
                <?php
                $query="Select visitor.*,comment.c_text from visitor join comment where visitor.vid=comment.vid and comment.pid='$pid' ";
                $res=Run($query);
                while ($row=mysqli_fetch_array($res)) {
                    ?>

                    <div class="col-sm-12 null"  style="padding-bottom: 8px!important">
                        <div class="col-sm-2 null"><img src="images/<?php echo $row['prf_pic']?>" class=" null"
                                                        height="40" width="40"></div>
                        <div class="col-sm-10 null">
                            <span class="sm-font"><?php echo $row['vname'] ?></span>
                            <span class="sm-font"><?php echo '@'.$row['uname'] ?></span><br>
                            <span class="sm-med  text-success"><?php echo $row['c_text'] ?></span>
                        </div>
                    </div>

                    <?php
                }?>
            </div>

        </div>
        <?php
    }?>
</div>