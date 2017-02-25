<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User list</title>
</head>
<body>
<?php
print_r($data);
?>
<table>
    <?php foreach ($data as $users) { ?>
        <tr>
            <td><?=$users['Firstname'] ?></td>
        </tr>
        <?php
    }?>
</table>

</body>
</html>