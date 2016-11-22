<?php 
$pageTitle = "Online Book Library";

require 'inc/session.php';
include 'inc/header.php'; 
include 'inc/Connection.php';
?>

<div class="col-sm-2">
	<?php include 'inc/categories.php'; ?>
</div>

<div class="col-sm-8 col-sm-offset-1">
	<?php 
	if($_SERVER["REQUEST_METHOD"] == "POST")
		include 'inc/search.php';
	else 
		include 'inc/Books.php';
	?>

</div>
<?php include 'inc/footer.php'; ?>