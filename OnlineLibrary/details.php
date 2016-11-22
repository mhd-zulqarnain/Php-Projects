<?php 
$pageTitle = "Details";

require 'inc/session.php';
include 'inc/header.php'; 
include 'inc/Connection.php'; ?>

<?php
if(isset($_GET{"id"})){
	$id = $_GET{"id"};
	$query = "select b.book_ID,b.book_title,b.book_author,b.book_img, b.book_address, c.cat_name from books as b ,categories as c where b.cat_ID=c.cat_id and b.book_ID=$id";

	$result = $db->query($query);
	$row = $result->fetch_assoc();
	$url = $row["book_address"];
	?>

	<div class=" col-xs-12 col-sm-6 col-md-6" align="center">
		<img src="<?php echo $row["book_img"];?>" alt="<?php echo $row["book_title"];?>" class = "img-responsive thumbnail" width="380"/>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6" style="width:375px">
			
			<h1 align="center"><?php echo $row["book_title"]; ?></h1>
			<table class="table">

				<tr>
					<th>Author</th>
					<td><?php echo $row["book_author"]; ?></td>
				</tr>
				<tr>
					<th>Publisher</th>
					<td>Sang-e-Meel Publications</td>
				</tr>
				<tr>
					<th>Year Of Publish</th>
					<td>03-January-2007</td>
				</tr>
				<tr>
					<th>ISBN</th>
					<td>968-23783-5793-90</td>
				</tr>
				<tr>
					<th>Category</th>
					<td><?php echo $row["cat_name"]; ?></td>
				</tr>
			</table>

			<div>
				<a href= <?php echo $url ;?> > <input type="button" name="download" value="Download" class="btn"> </a>
			</div>
	</div>

	<?php } ?>

	<?php include 'inc/footer.php'; ?>