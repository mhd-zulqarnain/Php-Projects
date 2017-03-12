<?php $auth = 0 ?>
<?php include "control/includes.php" ?>
<?php include "control/db.php" ?>

<?php
	$connected = null;
	if(isset($_SESSION["auth"]["id"])){
	 	header("location:".ACC_SCRIPTROOT."account");
	 die();
 	}
	if(isset($_POST["username"]) && isset($_POST["password"])){
		$username = $db->quote($_POST['username']);
		$select = $db->query("SELECT * FROM users WHERE username=$username");
		if($select->rowCount() > 0){
			$user = $select->fetch();
			if (password_verify($_POST["password"], $user["password"])){
				$_SESSION["auth"] = $user;
				header("location: ".ACC_SCRIPTROOT."account");
				die();
			}else {
				$connected = false;
			}
		}else{
			$connected = false;
		}
	}
?>

<?php include "partials/header.php" ?>
	<h3 class="text-center">Login</h3>
	<?php if ($connected === false): ?>
		<div class="alert alert-danger">
			wrong username or password
		</div>
		<?php $connected = null; ?>
	<?php endif; ?>
	<form action="" method="post">
			<div class="form-group col-sm-12">
				<label for="username">username</label>
				<?= input("username", "text") ?>
			</div>
			<div class="form-group col-sm-12">
				<label for="password">password</label>
				<?= input("password", "password") ?>
			</div>
			<div class="form-group col-sm-12">
				<button value="submit" type="submit" class="btn btn-default">Log in</button>
			</div>
	</form>
<?php include "partials/footer.php" ?>
