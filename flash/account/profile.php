<?php include "../control/includes.php" ?>
<?php include "../partials/header_account.php" ?>
<?php if(empty($_GET["username"]) || !valid_username($db, $_GET["username"])){
  ?>
    <div class="alert alert-danger">
      profile not found
    </div>
  <?php
  die();
}
?>
<div class="jumbotron" style="background : #EEEEEE url('') center center no-repeat; background-size: cover;">
        <div class="media">
          <div class="media-left">
              <img class="media-object" style="border:5px solid #999;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCA2NCA2NCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PCEtLQpTb3VyY2UgVVJMOiBob2xkZXIuanMvNjR4NjQKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTYwM2JjNTk1MyB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1NjAzYmM1OTUzIj48cmVjdCB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSIxNC41IiB5PSIzNi41Ij42NHg2NDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" alt="<?php echo $_GET['username'] ?>">
          </div>
          <div class="media-body">
            <h4 class="media-heading">
              <?php
                $profile_owner = get_by_username($db, $_GET["username"]);
                    if(!empty($profile_owner["first_name"]) && !empty($profile_owner["last_name"])){
                      echo $profile_owner["first_name"]." ".$profile_owner["last_name"];
                    }else {
                      echo $profile_owner["username"];
                    }
             ?></h4>
                <?php
                  echo $profile_owner["location"];
                 ?>
          </div>
        </div>
</div>
  <div class="row"><!-- friendship buttons settings-->
      <button type="hidden" class="hidden" name="button">hidden button</button>
        <?php
          $is_friends = false; //asigning the is friend variable to false
          $prof_id = $db->quote($profile_owner["id"]); // quoting the profile id
          $cone_id = $db->quote($_SESSION["auth"]["id"]); // quoting the session id
         $select = $db->query("SELECT * FROM friends_control WHERE
           req_rec_id=$prof_id AND req_sen_id=$cone_id
           OR
           req_rec_id=$cone_id AND req_sen_id=$prof_id
           "); // grabing the relation bfetween the profile owner and the connected user
          if ($select->rowCount() >= 1) { //if there is a relation
            $select = $select->fetch(); // fetch it
            if($select["status"]){ // if the status of the relation is true
              $is_friends = true; // assign the is friend variable to tru
            }else { //if the request already sent
              $is_friends = "pending";//set is friend variable to pending
            }
          }
           ?>
        <?php if ($profile_owner["id"] != $_SESSION["auth"]["id"] && $is_friends != true){ ?> <!--if the user is not in his own profile and the profile owner is not friend with the connected user-->
          <div class="col-sm-4"></div><!--styling divs-->
          <div class="col-sm-4">
          <form class="col-sm-12"  action="add_friend.php" method="post"> <!--show the add friend button-->
            <button type="submit" class="btn btn-default btn-lg col-sm-12" style="height: 52px;" name="add_request" value="<?php echo $profile_owner['id'] ?>">add <?php echo $profile_owner["first_name"] ?> as friend</button>
          </form>
          </div>
        <?php } elseif ($profile_owner["id"] != $_SESSION["auth"]["id"] && $is_friends == "pending") { ?>
          <?php
          $select_sen = $select["req_sen_id"];
          $select_rec = $select["req_rec_id"];
          if ($_SESSION["auth"]["id"] === $select_rec && !$select["status"] ) {// if the connected user id equals to the reciever id
            ?>
            <div class="col-sm-4">
              <div class="alert alert-info col-sm-12">
                <p class="text-left">request recieved from <?php echo get_by_id($db,$select_sen)["first_name"]." ".get_by_id($db,$select_sen)["last_name"]?></p>
              </div>
            </div>
            <div class="col-sm-4">
              <form class="col-sm-12" action="accept_request.php" method="post"><!--if the the status is pending show the accept request button-->
                <button type="submit" class="btn btn-default btn-lg col-sm-12" style="height: 52px;" value="<?php echo $profile_owner['id'] ?>" name="accept_friend"> accept request </button>
              </form>
            </div>
            <!--here-->
            <div class="col-sm-4"> <!-- cancel the request from the reciever-->
            <form class="col-sm-12" action="cancel_request.php" method="post"><!--if the the status is pending show the cancel request button-->
              <button type="submit" class="btn btn-default btn-lg col-sm-12" style="height: 52px;" value="<?php echo $profile_owner['id'] ?>" name="remove_request"> cancel request </button>
            </form>
          </div>
            <?php
          }elseif($_SESSION["auth"]["id"] === $select_sen && !$select["status"]) {
            ?>
            <div class="col-sm-4">
              <div class="alert alert-info col-sm-12">
                <p class="text-left">request sent to <?php echo $profile_owner["first_name"] ?></p>
              </div>
              </div>
              <div class="col-sm-4">
              <form class="col-sm-12" action="cancel_request.php" method="post"><!--if the the status is pending show the cancel request button-->
                <button type="submit" class="btn btn-default btn-lg col-sm-12" style="height: 52px;" value="<?php echo $profile_owner['id'] ?>" name="remove_request"> cancel request </button>
              </form>
            </div>
      <?php } ?>
        <?php } ?>
  </div><!--end add button-->
  <div class="row">
  <div class="col-sm-8"><!-- showing the posts -->
      <h4><?php
        if(empty($profile_owner["first_name"])){
          echo $profile_owner["username"];
        }else {
          echo $profile_owner["first_name"];
        }
      ?>'s posts</h4> <!-- end of posts headline -->
    <?php  $user_id = $_SESSION["auth"]["id"]; //showing the profile owner's post
           // adding the replies
           if (isset($_POST["reply"]) && !empty($_POST["reply"])) {
               $post_to_reply = $db->quote($_POST["submit_reply"]);
               $reply_content = $db->quote($_POST["reply"]);
               $db->query("INSERT INTO replies SET owner_id=$user_id, post_reply_id=$post_to_reply, reply_content=$reply_content");
               header("location: index.php?");
           }
           $select = $db->query("SELECT posts.content, posts.created_at, posts.owner_id,posts.id AS post_id,
                                       users.first_name, users.last_name, users.username
                           FROM posts INNER JOIN users ON
                           posts.owner_id = users.id ORDER BY posts.created_at DESC
                           ");
          $replies = $db->query("SELECT replies.owner_id, replies.post_reply_id, replies.reply_content,replies.created_at,
                             users.first_name, users.last_name, users.username
                              FROM replies LEFT JOIN users ON
                              replies.owner_id = users.id ORDER BY replies.created_at DESC
                              ");
          $count_likes = $db->query("SELECT * FROM likes_control");
          if ($select->rowCount() >= 1) {
              $posts = $select->fetchAll();
          if ($count_likes->rowCount() >= 1) {
            $count_likes = $count_likes->fetchAll();
          }
          if ($replies->rowCount() >= 1) {
            $replies = $replies->fetchAll();
          }
            foreach ($posts as $post) {
              if ($post["owner_id"] === $profile_owner["id"]) {
                ?>
                <div class="media">
                  <div class="media-left">
                    <img class="media-object" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCA2NCA2NCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PCEtLQpTb3VyY2UgVVJMOiBob2xkZXIuanMvNjR4NjQKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTYxZDZkYTgyZSB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1NjFkNmRhODJlIj48cmVjdCB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSIxNC41IiB5PSIzNi41Ij42NHg2NDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" alt="...">
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading"><a href="profile.php?username=<?php echo $post['username'] ?>"><?php
                    if(!empty($post["first_name"]) && !empty($post["last_name"])){
                      echo $post["first_name"]." ".$post["last_name"];
                    }else {
                      echo $post["username"];
                    }?>
                  </a></h4>
                  <blockquote>
                    <p><?php echo $post["content"] ?></p>
                    <footer>posted : <?php echo $post["created_at"] ?></footer>
                  </blockquote>
                  <div class="media">
                      <div class="media-body">
                        <p class="media-heading">
                             <?php if ($post["owner_id"] === $user_id): ?>
                              <a class="text-center" href="status.php?stri=<?php echo $post['post_id'] ?>">Remove</span></a> /
                             <?php endif; ?>
                             <?php if ($post["owner_id"] != $user_id && !is_liked($db , $user_id, $post["post_id"])): ?>
                               <a class="text-center" href="status.php?stli=<?php echo $post['post_id'] ?>">Like</a> /
                             <?php endif; ?> <?php
                             $like_count = 0;
                              foreach ($count_likes as $like) {
                                if ($post["post_id"] === $like["like_post_id"]) {
                                  $like_count += 1;
                                }
                              }
                              echo "$like_count : likes / ";
                                $reply_count = 0;
                                foreach ($replies as $reply) {
                                  if ($post["post_id"] === $reply["post_reply_id"] ) {
                                    $reply_count += 1;
                                  }
                                }
                                echo "$reply_count : replies";
                              ?>
                       </p>
                       <!-- showing the replies -->
                        <?php
                            foreach ($replies as $reply) {
                              if ($post["post_id"] === $reply["post_reply_id"]) {
                                ?>
                                <div class="media">
                                  <div class="media-left">
                                        <a href="#">
                                          <img class="media-object" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCA2NCA2NCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PCEtLQpTb3VyY2UgVVJMOiBob2xkZXIuanMvNjR4NjQKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTYxZDZkYTgyZSB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1NjFkNmRhODJlIj48cmVjdCB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSIxNC41IiB5PSIzNi41Ij42NHg2NDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" alt="...">
                                        </a>
                                  </div>
                                  <div class="media-body">
                                    <p class="media-heading"><a href="profile.php?username=<?php echo $reply['username'] ?>"><?php
                                    if(!empty($reply["first_name"]) && !empty($reply["last_name"])){
                                      echo $reply["first_name"]." ".$reply["last_name"];
                                    }else {
                                      echo $reply["username"];
                                    }?>
                                  </a></p>
                                    <?php echo $reply["reply_content"] ?>
                                  </div>
                                </div>
                                <div class="" style="height : 10px;"></div>
                                <?php
                              }
                            }
                         ?>
                          <form class="rpl-form" action="" method="post">
                            <div class="form-group">
                              <textarea name="reply" style="resize:none;" class="form-control" rows="2" cols="40" placeholder="reply the status"></textarea>
                            </div>
                            <div class="form-goup">
                              <button type="submit" class="btn btn-default" name="submit_reply" value="<?php echo $post["post_id"] ?>">Reply</button>
                            </div>
                          </form>
                      </div>
                  </div>
                </div>
              </div>
              <?php
              }
            }
          }else {
            ?>
              <h5>no posts in this profile !!!</h5>
            <?php
          }
  ?>
  </div>
  <div class="col-sm-4"><!-- showing the friends -->
      <h4><?php
        if(empty($profile_owner["first_name"])){
          echo $profile_owner["username"];
        }else {
          echo $profile_owner["first_name"];
        }
      ?>'s friends</h4> <!-- ende of the friends headline -->
      <?php
        $id = $profile_owner['id']; //the profile owner id
        //grabin just the friends
        $friends_rel = $db->query("SELECT * FROM friends_control WHERE status='1' AND (req_rec_id=$id OR req_sen_id=$id)");
        if ($friends_rel->rowCount() < 1) {
          ?>
            <p>
              <?php echo $profile_owner["first_name"] ?> has no friends
            </p>
          <?php
        }else{
          $friends_rel =$friends_rel->fetchAll();
        ?>
        <ul class="list-group">
        <?php
        foreach ($friends_rel as $frship) {
          if ($frship["req_rec_id"] === $id) {
            $friend_id = $frship["req_sen_id"];
          }else{
            $friend_id = $frship["req_rec_id"];
          }
          $friend = get_by_id($db, $friend_id);
          ?>
                <li class="list-group-item">
                  <div class="media">
                    <div class="media-left">
                      <img class="media-object" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCA2NCA2NCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PCEtLQpTb3VyY2UgVVJMOiBob2xkZXIuanMvNjR4NjQKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTYwM2JjNTk1MyB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1NjAzYmM1OTUzIj48cmVjdCB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSIxNC41IiB5PSIzNi41Ij42NHg2NDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" alt="...">
                    </div>
                    <div class="media-body">
                      <a href="profile.php?username=<?php echo $friend['username'] ?>"><h4 class="media-heading"><?php if(!empty($friend["first_name"]) && !empty($friend["last_name"])){
                        echo $friend["first_name"]." ".$friend["last_name"];
                      }else {
                        echo $friend["username"];
                      } ?></h4></a>
                      <?php echo $friend["location"]; ?>
                    </div>
                  </div>
                </li>
          <?php
          }
          ?>
          </ul>
        <?php
        }
       ?>
  </div> <!-- end of the col-sm-4 div -->
</div>
<?php include "../partials/footer.php" ?>
