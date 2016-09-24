<?php
include 'connect.php';
$conn = connect_db();

function validate()
{
    if ($_POST['submit']) {
        global $conn;
        $name = $_POST['name'];
        $pwd = $_POST['pwd'];

        if (empty($_POST["name"])) {
            $nameError = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
        }

        $sql = "INSERT INTO info(Name, password) VALUES('$name','$pwd')";
        if (mysqli_query($conn, $sql)) {
            header("location:index.php");
        } else {
            echo "error in insert" . mysqli_errno($conn);
        };

    }
    else{
        return;
    }
}
?>