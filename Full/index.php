<?php

include 'connect.php';
$conn = connect_db();

?>
<?php

if (!$conn) {
    echo 'connection error';
} else {
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        if ((!preg_match("/^[a-zA-Z ]*$/",$name))) {
            $error = "Name is required";
            exit;
        }
        else {
            $name ="";
        }
        $pwd = $_POST['pwd'];
        $sql = "INSERT INTO info(Name, password) VALUES('$name','$pwd')";
        if (mysqli_query($conn, $sql)) {

        } else {
            echo "error in insert" . mysqli_errno($conn);
        };
    };
}
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
    </head>
    <body style="text-align: center">
    <a href="logout.php">Logout</a>
    <form action="index.php" method="post">
        <input type="text" placeholder="insert name" name="name" required>
        <span><?php echo $error?></span>
        <br/><br/>
        <input type="password" placeholder="insert password" name="pwd" required><br/><br/>
        <input type="submit" value="submit" name="submit">
    </form>


    <table width="300" style="margin: 0 auto">
        <tr>
            <th width="90">s. no</th>
            <th width="90">name</th>
            <th width="90">password</th>
        </tr>
        <?php
        $sql2 = "SELECT * FROM info";
        $result = mysqli_query($conn, $sql2);
        //$result=mysqli_store_result($res);
        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            $name = $row['Name'];
            $pwd = $row['password'];
            ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $name; ?></td>
                <td><?php echo $pwd; ?></td>
            </tr>
            <?php
        }
        ?>
    </table>

    </body>
    </html>

