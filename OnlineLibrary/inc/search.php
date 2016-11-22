<?php 
$pageTitle = "search result";


$searchtitle = trim($_POST['searchtitle']);
$searchauthor = trim($_POST['searchauthor']);

if (!$searchtitle && !$searchauthor) { ?>
<div class="alert alert-warning">
  <p><strong>Warning!</strong> You must specify either a title or an author </p>
</div> 
<?php exit();
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
$num_rows = $result->num_rows;
if($num_rows > 0){
  ?>

  <table class="table">
    <thead>
      <tr>
        <th></th>
        <th>Title</th>
        <th>Author</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
      while($row = $result->fetch_assoc())
      {
        $id = $row["book_ID"];
        printf("
          <tr> 
            <td>  </td>
            <td> %s </td>
            <td> %s </td>
            <td> 
              <a href ='details.php?id=$id'><input type='button' name='details' value='View Details' class='btn'></a>
            </td>
          </tr>",
          htmlentities($row["book_title"]),
          htmlentities($row["book_author"])
          );
      }
      ?>

    </tbody>
  </table>
  <?php 
} else { 
  ?>
  <div class="alert alert-danger">
    <p><strong>Oopss!</strong> No result found for this search</p>
  </div>   

  <?php } ?>

</div> 

