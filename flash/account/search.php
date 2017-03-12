<?php include "../control/includes.php" ?>
<?php
  if(isset($_GET["q"]) && !empty($_GET["q"])){
      $search_data_ent = trim(addslashes($_GET['q']));
      $search_data_ent = preg_split("/[\s]+/",$search_data_ent);
      foreach ($search_data_ent as $search_data) {
        $search_data = $db->quote($search_data);
        $users = $db->query("SELECT * FROM users WHERE username=$search_data OR first_name=$search_data OR last_name=$search_data ORDER BY first_name ASC");
      }
  }else {
    $users = $db->query("SELECT * FROM users");
  }
 ?>
 <?php include "../partials/header_account.php" ?>
 <?php if ($users->rowCount() <= 0): ?>
   <div class="alert alert-danger">
      user  " <strong><?php echo $_GET["q"] ?></strong>" not found
   </div>
 <?php endif; ?>
 <div class="row">
 <?php foreach ($users as $key => $user): ?>
  <div class="thumbnail col-sm-3">
     <img style="width:100%;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTkyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDE5MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MjAwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTU2MDliOTViZDAgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNTYwOWI5NWJkMCI+PHJlY3Qgd2lkdGg9IjE5MiIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI3MS41IiB5PSIxMDQuNSI+MTkyeDIwMDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" alt="<?php echo $user['username'] ?>">
<div class="caption">
  <h5><a href="profile.php?username=<?php echo $user['username'] ?>"><?php
  $id= $user['id'];
   if(!empty($user["first_name"]))
     {
       echo $user['first_name']." ".$user['last_name']; ;
     } else {
       echo $user['username'];
    }
  ?></a>
  <?php if (is_friends($db,$user["id"],$_SESSION["auth"]["id"]) === 1){ ?>
    <span class="label label-primary pull-right">Friend</span>
  <?php } elseif (is_friends($db,$user["id"],$_SESSION["auth"]["id"]) != 1 && is_friends($db,$user["id"],$_SESSION["auth"]["id"]) != 0 ) { ?>
    <span class="label label-warning pull-right">Pending</span>
  <?php } ?>
</h5>
  <?php echo $user["location"] ?>
</div>
 </div>
 <div class="col-sm-1"></div>
 <?php endforeach; ?>
 </div>
<?php include "../partials/footer.php" ?>
