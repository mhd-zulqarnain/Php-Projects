<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
print_r($data);

?>
<h1>test index</h1>

<table>
    <?php
    foreach ($data as $users){


    ?>
    <tr>
        <?=$users['Firstname']?>
        <?=$users['Lastname']?>
    </tr>
    <?php } ?>
</table>
</body>
</html>