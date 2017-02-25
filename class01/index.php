<?php


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<form action="index.php" method="post" >
    Number one<input type="text" name="num1"><br><br>
    Number two<input type="text" name="num2"><br><br>
    <input type="submit" name="submit"><br>

</form>
</body>
</html>

<?php
if(isset($_POST['submit'])){

    $a=$_POST['num1'];
    $b=$_POST['num2'];
    $res=$a+$b;
    echo "<h1>the Result is ".$res."</h1>";


}


?>
