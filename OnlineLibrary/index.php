<?php 
$pageTitle = "Online Book Library";
$section = null;

include 'inc/header.php'; 
include 'inc/Connection.php';
?>

	<div class="col-sm-2">
		<?php include 'inc/categories.php'; ?>
	</div>
	<div class="col-sm-10">
		<?php include 'Books.php';?>
	</div>

<?php include 'inc/footer.php'; ?>