<?php 
$pageTitle = "search result";

include 'inc/header.php'; 
include 'inc/Connection.php';
include 'inc/pagination.php';
?>

<?php

$searchtitle = trim($_POST['searchtitle']);
$searchauthor = trim($_POST['searchauthor']);

if (!$searchtitle && !$searchauthor) {
  printf ("You must specify either a title or an author");
  exit();
}

$searchtitle = addslashes($searchtitle);
$searchauthor = addslashes($searchauthor);


$query = " select * from books";
if ($searchtitle && !$searchauthor) { // Title search only
  $query = $query . " where book_title like '%" . $searchtitle . "%'"; 
}
if (!$searchtitle && $searchauthor) { // Author search only
  $query = $query . " where book_author like '%" . $searchauthor . "%'";
}
if ($searchtitle && $searchauthor) { // Title and Author search
  $query = $query . " where book_title like '%" . $searchtitle . "%' and book_author like '%" . $searchauthor . "%'"; 
}

$result = $db->query($query);

?>
<div class="row">
  <div class="col-sm-2">
    
  </div>
  <div class="col-sm-9">
    <table class="table">
      <thead>
        <tr>
          <th>Book ID</th>
          <th>Title</th>
          <th>Author</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
        while($row = $result->fetch_assoc())
        {

          printf("
            <tr> 
              <td> %s </td>
              <td> %s </td>
              <td> %s </td>
              <td> 
                <a href ='details.php'><input type='button' name='details' value='View Details' class='btn'></a>
              </td>
            </tr>",
            htmlentities($row["book_ID"]),
            htmlentities($row["book_title"]),
            htmlentities($row["book_author"])
            );
        }
        ?>

      </tbody>
    </table>
  </div>

</div>

<?php include 'inc/footer.php'; ?>
