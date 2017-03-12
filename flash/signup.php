<?php $auth = 0 ?>
<?php include "control/includes.php" ?>
<?php include "control/db.php" ?>
<?php
	$created = false;
	if(isset($_SESSION["auth"]["id"])){
	 header("location:".ACC_SCRIPTROOT."account");
	 die();
 }
	if(!empty($_POST)){
		$errors = [];
		if(isset($_POST["username"])){
			if(!empty($_POST["username"]) && preg_match(('/^[a-zA-Z\-0-9_]+$/'), $_POST["username"])){
				$username = $db->quote($_POST["username"]);
				$select = $db->query("SELECT username FROM users WHERE username=$username");
				if($select->rowCount() >= 1){
					$errors["username"] = "username is already taken";
				}
			}else{
				$errors["username"] = "invalide username";
			}
		}
		if(isset($_POST["email"])){
			if (!empty($_POST["email"]) && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
				$email = $db->quote($_POST["email"]);
				$select = $db->query("SELECT email FROM users WHERE email=$email");
				if($select->rowCount() >= 1){
					$errors["email"] = "email  is already taken";
				}
			}else{
				$errors["email"] = "invalide email";
			}
		}

		if(isset($_POST["password"])){
			if(!empty($_POST['password']) && $_POST["password"] != $_POST["confirm"]){
				$errors["password"] = "password doesn't match";
			}else if(empty($_POST["password"])){
				$errors["password"] = "invalide password";
			}
		}

		if(empty($errors)){
			$create = $db->prepare("INSERT INTO users SET username=?, password=?, email=?");
			$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
			$create->execute([$_POST["username"], $password, $_POST['email']]);
			$created = true;
		}

	}
?>
<?php include "partials/header.php" ?>
	<h3 class="text-center">Sign up</h3>
	<?php if(!empty($errors)): ?>
		<div class="alert alert-danger">
			<ul>
				<?php foreach ($errors as $value) : ?>
					<li><?= $value ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
	<?php endif;?>
	<?php if ($created): ?>
		<div class="alert alert-success">your account is succefully created, you can login now</div>
		<?php $created = false; ?>
	<?php endif ?>
	<form action="" method="post">
			<div class="form-group col-sm-12">
				<label for="username">Username</label>
				<?= input("username", "text") ?>
			</div>
			<div class="form-group col-sm-12">
				<label for="email">email</label>
				<?= input("email", "text") ?>
			</div>
			<div class="form-group col-sm-12">
				<label for="password">password</label>
				<?= input("password", "password") ?>
			</div>
			<div class="form-group col-sm-12">
				<label for="confirm">confirm password</label>
				<?= input("confirm", "password") ?>
			</div>
			<div class="form-group col-sm-12">
				<button value="submit" type="submit" class="btn btn-default">Sign up</button>
			</div>
	</form>
<?php include "partials/footer.php" ?>
