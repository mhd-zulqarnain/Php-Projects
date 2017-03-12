<?php include "../control/includes.php" ?>
<?php include "../partials/header_account.php" ?>
<div class="row">
  <div class="col-sm-8">
    <div class="page-header">
    <form class="" action="posts.php" method="post">
      <div class="form-group">
        <textarea name="post_content" rows="4" cols="20" style="resize:none;" class="form-control" placeholder="how was your day <?php echo $_SESSION['auth']['username'] ?> ?"></textarea>
      </div>
      <div class="form-group">
        <button type="submit" name="submit" class="btn btn-default">Post status</button>
      </div>
    </form>
    </div>
    <!-- showing the posting messages -->
    <?php if (isset($_SESSION["post_error"])): ?>
      <div class="alert alert-danger">
        invalide post content
      </div>
      <?php unset($_SESSION["post_error"]) ?>
    <?php endif; ?>
    <?php if (isset($_SESSION["post_success"])): ?>
      <div class="alert alert-success">
        status successfully posted
      </div>
      <?php unset($_SESSION["post_success"]) ?>
    <?php endif; ?>
    <!-- showing the deleting messages -->
    <?php if (isset($_SESSION["delete_error"])): ?>
      <div class="alert alert-danger">
        some thing went wrong while deleting the status
      </div>
      <?php unset($_SESSION["delete_error"]) ?>
    <?php endif; ?>
    <?php if (isset($_SESSION["delete_success"])): ?>
      <div class="alert alert-success">
        status successfully deleted
      </div>
      <?php unset($_SESSION["delete_success"]) ?>
    <?php endif; ?>
      <!-- showing the posts -->
      <?php
        $user_id = $_SESSION["auth"]["id"];
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
            if (is_friends($db, $post["owner_id"], $user_id) === 1 || $post["owner_id"] === $user_id) {
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
            <h5>no posts in your time line !!!</h5>
          <?php
        }
    ?>
  </div>
</div>
<?php include "../partials/footer.php" ?>
