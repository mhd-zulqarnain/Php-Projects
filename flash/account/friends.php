<?php include "../control/includes.php" ?>
<?php include "../partials/header_account.php" ?>
<div class="row">
  <h4 class="text-center">friends requests</h4>
          <?php
            $id = $db->quote($_SESSION["auth"]["id"]);
            $friend_id = null;
            $sender_id = null;
            $reciever_id = null;
            //showing friends requests
            $requests_info = $db->query("SELECT * FROM friends_control WHERE req_rec_id = $id OR req_sen_id = $id");
            if ($requests_info->rowCount() >= 1) { ?>
              <?php
              $requests_info = $requests_info->fetchAll();
              foreach ($requests_info as $request_info) {
                if (!$request_info["status"]) {
                  $sender_id = $request_info["req_sen_id"];
                  $reciever_id = $request_info["req_rec_id"];
                  ?>
                  <div class="thumbnail col-sm-3">
                    <?php if ($sender_id != $_SESSION["auth"]["id"]): ?>
                    <?php $request_owner = get_by_id($db, $sender_id); ?>
                        <img style="width:100%;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTkyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDE5MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MjAwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTU2MDliOTViZDAgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNTYwOWI5NWJkMCI+PHJlY3Qgd2lkdGg9IjE5MiIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI3MS41IiB5PSIxMDQuNSI+MTkyeDIwMDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" alt="...">
                        <div class="caption">
                          <h5><a href="profile.php?username=<?php echo $request_owner['username'] ?>">
                          <?php if(empty($request_owner["first_name"]) && !empty($request_owner["last_name"])){
                            echo $request_owner["username"];
                            }else {
                            echo $request_owner["first_name"]." ".$request_owner["last_name"];
                            } ?></a></h5>
                          <p>
                            <?php echo $request_owner["location"] ?>
                          </p>
                            <p>
                              <div class="row">
                                <form class="col-sm-6" action="cancel_request.php" method="post"><!--if the the status is pending show the cancel request button-->
                                  <button type="submit" class="btn btn-danger col-sm-12" value="<?php echo $request_owner['id'] ?>" name="remove_request">cancel</button>
                                </form>
                                <form class="col-sm-6" action="accept_request.php" method="post"><!--if the the status is pending show the accept request button-->
                                  <button type="submit" class="btn btn-primary col-sm-12" value="<?php echo $request_owner['id'] ?>" name="accept_friend">accept</button>
                                </form>
                              </div>
                            </p>
                          <?php endif; ?>
                          <?php if ($sender_id === $_SESSION["auth"]["id"]): ?>
                          <?php $request_owner = get_by_id($db, $reciever_id); ?>
                            <img style="width:100%;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTkyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDE5MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MjAwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTU2MDliOTViZDAgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNTYwOWI5NWJkMCI+PHJlY3Qgd2lkdGg9IjE5MiIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI3MS41IiB5PSIxMDQuNSI+MTkyeDIwMDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" alt="...">
                            <div class="caption">
                              <h5><a href="profile.php?username=<?php echo $request_owner['username'] ?>">
                              <?php if(empty($request_owner["first_name"]) && !empty($request_owner["last_name"])){
                                echo $request_owner["username"];
                              }else {
                                echo $request_owner["first_name"]." ".$request_owner["last_name"];
                              } ?></a></h5>
                              <p>
                                <?php echo $request_owner["location"] ?>
                              </p>
                            <p>
                            <div class="row">
                              <form class="col-sm-12" action="cancel_request.php" method="post"><!--if the the status is pending show the cancel request button-->
                                <button type="submit" class="btn btn-default col-sm-12" value="<?php echo $request_owner['id'] ?>" name="remove_request"> cancel request </button>
                              </form>
                          </div>
                          </p>
                          <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-sm-1"></div><!--styling div-->
                  <?php
                }
              }
              ?>
              </div>
            <?php
            }else {
              ?>
              <p class="text-center">
                you have no friends requests
              </p>
              <?php
            }
           ?>
           <div class="row">
             <h4 class="text-center">your friends</h4>
           <?php
            //showing friends
            $friends_info = $db->query("SELECT * FROM friends_control WHERE (req_rec_id = $id OR req_sen_id = $id) AND status = 1");
            if ($friends_info->rowCount() >= 1) {
              $friends_info = $friends_info->fetchAll();
              ?>
              <?php
              foreach ($friends_info as $friend_info) {
                if ($_SESSION["auth"]["id"] === $friend_info["req_sen_id"]) {
                    $friend_id = $friend_info["req_rec_id"];
                }else {
                    $friend_id = $friend_info["req_sen_id"];
                }
                $friend = get_by_id($db, $friend_id);
                ?>
                  <div class="thumbnail col-sm-3">
                        <img style="width:100%;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTkyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDE5MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MjAwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTU2MDliOTViZDAgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNTYwOWI5NWJkMCI+PHJlY3Qgd2lkdGg9IjE5MiIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI3MS41IiB5PSIxMDQuNSI+MTkyeDIwMDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" alt="...">
                        <div class="caption">
                          <h5><a href="profile.php?username=<?php echo $friend['username'] ?>">
                          <?php if(empty($friend["first_name"]) && !empty($friend["last_name"])){
                            echo $friend["username"];
                          }else {
                            echo $friend["first_name"]." ".$friend["last_name"];
                          } ?></a></h5>
                          <p>
                            <?php echo $friend["location"] ?>
                          </p>
                          <p>
                            <div class="row">
                              <form role="button" class="col-sm-12" action="delete_friend.php" method="post">
                                <button role="button" type="submit" class="btn btn-danger col-sm-12" name="delete_friend" value="<?php echo $friend['id'] ?>">delete</button>
                              </form>
                            </div>
                          </p>
                        </div>
                    </div>
                    <div class="col-sm-1"></div><!--styling div-->
                      <?php
                    }
                    ?>
                  </div>
              <?php
            }else {
              ?>
                <p class="text-center">
                  you have no friends
                </p>
              <?php
            }
           ?>
<?php include "../partials/footer.php" ?>
