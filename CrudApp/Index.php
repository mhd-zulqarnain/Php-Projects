<!---->
<!---->
<?php
//session_start();
//
//
//if($_SESSION['name']!="")
//{
//    ?>
<!---->

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <link href="styl.css" type="text/css" rel="stylesheet">
    </head>

    <body>
    <div class="wrapper">
        <div class="header">
            <div id="logo"><h1>HOUSE RENTEL SYSTEM</h1></div>
            <div class="list">
                <ul>
                    <li><a href="Index.php">Submit</a></li>
                    <li><a href="update.php">Update</a></li>
                    <li><a href="show.php">view</a></li>
                    <!--            <li> <a href="#"></a></li>-->
                </ul>
            </div>
        </div>
        <br><br>
        <div class="form" style="text-align: center">
            <form action="index.php" method="post">
                Name:<input type="text" name="name" placeholder="Your name" required><br><br>
                Age:<input type="text" name="age" placeholder="Your Age" required><br><br>
                <input type="submit" name="submit" value="Submit"><br>
            </form>

        </div>
        <a style="float: right;" href="logout.php">Logout</a>

    </div>
    <!--php submit section-->

    <?php

    include 'Connection.php';
    $conn = connect_db();

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $class = $_POST['age'];
        $sql = "INSERT INTO student(Name,Class) VALUES('$name','$class')";
        if ($conn->query($sql)) {
            echo " <script> alert('Data Stored')</script>";
        } else
            echo " <script> alert('Error')</script>";
    }
    ?>


    <!--php section ends-->
    </body>
    </html>

<!--    --><?php
//}
//else
//    header("location:login.Partial");
//    ?>