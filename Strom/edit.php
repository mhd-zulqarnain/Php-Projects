<?php
$id = $_REQUEST['id'];
$name = $_REQUEST['name'];
$age = $_REQUEST['age'];
$country = $_REQUEST['country'];

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>edit</title>
</head>
<body>
<form action="update.php">
    <input type="text" name="name" value="<?php echo $name ?>"><br />
    <input type="text" name="age" value="<?php echo $age ?>"><br />
    <input type="text" name="country" value="<?php echo $country ?>"><br />
    <input type="hidden" value="<?php echo $id ?>"><br />
    <input type="submit" name="update" value="update">
</form>

</body>
</html>
