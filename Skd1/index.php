<?php

session_start();
if($_SESSION['username']!="") {
    ?>
    <!DOCTYPE HTML>
    <head>
        <link href="bootstrap.min.css">
        <link href="bootstrap-theme.css">
    </head>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "test");
    ?>

    <body style="text-align: center">
    
    <a href=" logout.php">Logout</a>
    <form action="index.php" method="POST">
        Name:<input type="text" name="name" required><br><br>
        Class:<input type="text" name="class" required><br><br>
        <input type="submit" name="submit"><br>
    </form>

    <table table width="300" style="margin: 0 auto">
        <tr>
            <th>Name</th>
            <th>class</th>
        </tr>
        <?php

        if (isset($_POST['submit'])) {
            /*echo "<script>alert('Enter value is ')</script>";*/
            $name = $_POST['name'];
            $class = $_POST['class'];

            $sql = "insert into info(Name,Class) values ('$name','$class')";
            if ($conn->query($sql))
                echo "<script>alert('value stored')</script>";

        }
        $sql1 = "SELECT * FROM info";
        $result = mysqli_query($conn, $sql1);
        while ($row = mysqli_fetch_array($result)) {
            $name = $row['Name'];
            $roll = $row['Class'];

            ?>
            <tr>
                <td><?php echo $name ?></td>
                <td><?php echo $roll ?></td>
            </tr>
            <?php

        }
        ?>


    </table>
    </body>
    </html>
    <?php
}
else
{
    header("location:in.Partial");
}

?>