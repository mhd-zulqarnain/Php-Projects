<?php 
$pageTitle = "Add a Book";
require 'inc/session.php';
include 'inc/header.php'; 
include 'inc/Connection.php';
?>
<div class="container">
	<form class="form-horizontal">

			<!-- Form Name -->
			<legend>Add New Book</legend>

			<!-- Text input-->
			<div class="form-group">
				<label class="col-md-4 control-label" for="title" >Book Title</label>  
				<div class="col-md-5">
					<input id="title" name="title" type="text" placeholder="Title" class="form-control input-md" required="">
				</div>
			</div>
			<!-- Text input-->
			<div class="form-group">
				<label class="col-md-4 control-label" for="author">Author</label>  
				<div class="col-md-5">
					<input id="author" name="author" type="text" placeholder="Author" class="form-control input-md" required="">
				</div>
			</div>

			<!-- Button -->
			<div class="form-group">
				<label class="col-md-4"></label>
				<div class="col-md-4">
					<button id="Fsubmit" name="Fsubmit" class="btn btn-primary">Submit</button>
				</div>
			</div>

	</form>

</div>
<?php include 'inc/footer.php'; ?>