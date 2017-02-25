<?php
//now the data base connection
$con=new mysqli("localhost","root","","login") or die ("Connection failed");

if(isset($_POST['Submit']))
{
    $qw=$_POST['username'];
    $qe=$_POST['password'];

////Query to connect the database table
    $sql="SELECT * FROM `signin` WHERE `Username`='$qw' AND `Password`='$qe' ";


    if($conn->query($sql))
    {
        session_start();
        $_SESSION['username'] = $username;
        header("location:welcome.php");
    }

    else
        echo "Username And password are Incorrect. <br> click here to try again <a href='login.php'> try again</a>";


}
else{
    header("location:login.php");
}



?>



<?php


?>

<html>

<form id='login' action='next.php' method='post' accept-charset='UTF-8'>
    <fieldset >
        <legend>Login</legend>
        <input type='hidden' name='submitted' id='submitted' value='1'/>

        <label for='username' >UserName*:</label>
        <input type='text' name='username' id='username'  maxlength="50" />

        <label for='password' >Password*:</label>
        <input type='password' name='password' id='password' maxlength="50" />

        <input type='submit' name='Submit' value='Submit' />

    </fieldset>
</form>

</html>

<?php

$link=mysqli_connect("localhost","root","","chatbox");
if(!$link)
{die ("could not Connect" . mysqli_error());
}
if(isset($_POST['submit']))
{

    $qw=$_POST['Username'];
    $qe=$_POST['Password'];

    $query="SELECT * FROM `signup` ";
    /*where 'username'=$qw and 'password'=$qe ";*/
    $result=mysqli_query($link,$query);
    $row=mysqli_fetch_assoc($result);

    if($row['username']==$_POST['Username'] && $row['password']==$_POST['Password'])
    {   session_start();
        $_SESSION['username']=$qw;
        echo "Successfully Login";
        header("location: chatroom.php");
    }
    else
    {
        echo "username and password is incorrect";
    }
}
else{
    header("location: login.php");
}


//session_start();
//$_SESSION['username']=$_POST['username'];

?>








