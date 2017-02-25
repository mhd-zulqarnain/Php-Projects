
<?php
 $con =mysqli_connect("localhost","root","","user");

    $name=$_POST['text'];
    $pass=$_POST['text2'];

    $sql="SELECT * FROM login WHERE username='$name' AND password='$pass'";
    

	if(mysqli_fetch_row($con->query($sql)))
    {
        
        header("location:home.php");
    }
    else
        header("location:index.php");

?>
