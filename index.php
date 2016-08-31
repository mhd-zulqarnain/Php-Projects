<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="index.php" method="post">
        <input type="text" placeholder="Name" name="name"><br><br>
        <input type="PASSWORD" placeholder="Password" name="password"><br><br>

        <input type="submit" value="submit" name="submit">
    <?php

   $conn = mysqli_connect("localhost", "root", "", "student");

    if(!$conn){
        echo "connection failed";
    }else{
        $name = $_POST['name'];
        $pwd = $_POST['password'];


        $sql = "INSERT INTO std(name,password) VALUES('$name','$pwd')";
        $sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com')";

        if(! mysqli_query($conn,$sql) ) {
            print_r('Could not enter data: ');
        }
        else{
            echo "you are successfully submitted";

            echo "your name is  =" .$name. "<br/>";
            echo "your password is  =" .$pwd. "<br/>";
        }

    }

    ?>
    </form>
</body>
</html>