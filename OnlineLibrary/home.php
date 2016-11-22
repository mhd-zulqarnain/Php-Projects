<?php 
$pageTitle = "Online Book Library";

require 'inc/session.php';
include 'inc/header.php'; 
include 'inc/Connection.php';


$query = "Select * from `categories`";
$result = $db->query($query);

while ($row = $result->fetch_assoc())
{ 
	$cat = $row["cat_name"]; ?>
	<div class=" col-sm-12 col-xs-12">
		<h3><?php echo $cat; ?></h3> <hr>
		<?php
		$query = "SELECT b.`book_img` , b.`book_title`, b.`book_ID` FROM books AS b ,categories AS c WHERE c.`cat_id` = b.`cat_ID` AND c.`cat_name` = \"$cat\"";
		$result1 = $db->query($query);
		$imgs = array();
		$title = array();
		$ids = array();
		while ($row = $result1->fetch_assoc()) {
			$imgs[] = $row["book_img"] ;
			$title[] = $row["book_title"] ;
			$ids[] = $row["book_ID"];
		}
		$Ran = array_rand($imgs, 4);

		for($a=0; $a<4; $a++){ 
			$id =  $ids[$Ran[$a]]; ?>

			<div class=" col-md-3 col-sm-6 col-xs-6 " >
				<div class="thumbnail">
					<img class = "img" src= <?php echo $imgs[$Ran[$a]]; ?> alt="My Image" />
					<div class="caption ">
						<h4 text-align = "center"><?php echo $title[$Ran[$a]]; ?></h4>
						<p><a href= <?php echo "details.php?id=$id"; ?> class="btn btn-primary btn-block">View Details</a>
						</div>
					</div>
				</div>


				<?php }
				?>
			</div>
<?php }
include 'inc/footer.php';
?>



