<?php include "../control/includes.php" ?>
<?php
$updated = false;
$id = $_SESSION["auth"]["id"];
$user_info = $db->query("SELECT * FROM users WHERE id=$id")->fetch();
$errors =  [];
if (!empty($_POST)) {
  if(isset($_POST["first_name"]) && !empty($_POST)){
    $first_name = trim($_POST["first_name"]);
    if(!preg_match('/^[a-zA-Z ,.\'-]+$/i', $first_name)){
      $errors["first_name"] = "invalide first name";
    }
  }

  if(isset($_POST["last_name"]) && !empty($_POST)){
    $last_name = trim($_POST["last_name"]);
    if(!preg_match('/^[a-zA-Z ,.\'-]+$/', $last_name)){
      $errors["last_name"] = "invalide last name";
    }
  }

  if(isset($_POST["location"]) && !empty($_POST)){
    $location = trim($_POST["location"]);
    if(!preg_match('/^[a-zA-Z ,.\'-]+$/', $location)){
      $errors["location"] = "invalide location";
    }
  }
  if(empty($errors)){
    $que = $db->prepare("UPDATE users SET first_name=?, last_name=?, location=? WHERE id=$id");
    $que->execute([$_POST['first_name'], $_POST['last_name'], $_POST['location']]);
    $updated = true;
  }
}
?>
<?php include "../partials/header_account.php" ?>
<?php if (!empty($errors)): ?>
  <div class="alert alert-danger">
  <ul>
    <?php foreach ($errors as $value): ?>
        <li><?= $value ?></li>
    <?php endforeach; ?>
</ul>
</div>
<?php endif; ?>
<?php if ($updated): ?>
  <div class="alert alert-success">
    profile updated successfully
  </div>
  <?php $updated = false ?>
<?php endif; ?>
  <h4>Editing <strong><?= $_SESSION["auth"]["username"] ?></strong>'s profile</h4>
<form class="" action="" method="post">
  <div class="row">
    <div class="form-group col-sm-6">
      <label for="first_name">First name</label>
      <input type="text" name="first_name" value="<?= $user_info["first_name"] ?>" id="first_name" class="form-control">
    </div>
    <div class="form-group col-sm-6">
      <label for="last_name">Last name</label>
      <input type="last_name" name="last_name" value="<?= $user_info["last_name"] ?>" id="last_name" class="form-control">
    </div>
    <div class="form-group col-sm-12">
      <label for="location">location</label>
      <input type="text" name="location" value="<?= $user_info["location"] ?>" id="location" class="form-control">
    </div>
    <div class="form-group col-sm-12">
      <button type="submit" name="submit" class="btn btn-default">Update profile</button>
    </div>
  </div>
</form>
<?php include "../partials/footer.php" ?>
