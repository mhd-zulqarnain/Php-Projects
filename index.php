<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="visitors/style/bootstrap.min.css">
    <link rel="stylesheet" href="visitors/style/visitor.css">

</head>
<body>
<div  style="border-bottom:1px solid black;height: 40px;padding:0;margin:0;background-color: red ">
    <h1 class="login-header">Login </h1>
</div>

<div class="container  col-lg-12">
    <div>
        <div class="signin-form col-lg-3 col-lg-push-4 well">
            <form action="signup.php" method="post" >

                name:<input type="text" name="name" ><br><br>
                phonenumber:<input type="text" name="ph_number" ><br><br>
                email:<input type="text" name="email" required><br><br>
                nic:<input type="text" name="nic"><br><br>
                address:<input type="text" name="address"><br><br>
                city:<input type="text" name="city" ><br><br>

                username:<input type="text" name="user_name" required><br><br>
                password:<input type="password" name="pass" required><br><br>
                <input type="submit" name="submit" class=" btn btn-md" value="Login">
            </form>
        </div>

    </div>
</body>
</html>

<?php
include "function/function.php";

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $ph_number=$_POST['ph_number'];
    $email=$_POST['email'];
    $nic=$_POST['nic'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $user_name=$_POST['user_name'];
    $password=$_POST['pass'];
    $time=time();
    $sql="INSERT INTO visitor( name, ph_number, email, nic,address, city,user_name,password,login_activity)
           VALUES ('$name', '$ph_number', '$email', '$nic','$address', '$city','$user_name','$password','$time')";

    $userchk=Run("Select user_name from visitor where user_name='$user_name'");
    $usernamechk=mysqli_fetch_assoc($userchk);

    $ph=Run("Select ph_number from visitor where ph_number='$ph_number'");
    $phchk=mysqli_fetch_assoc($ph);


    if($_POST['user_name']!=$usernamechk['user_name'])
    {
        if($_POST['ph_number']!=$phchk['ph_number'])
        {
            if((ctype_digit($ph_number))) {
                if (Run($sql)) {

                    $query="Select vid from visitor where user_name='$user_name' AND password='$password'";
                    $id=Run($query);
                    $vid=mysqli_fetch_assoc($id);
                    $to = 'zuluparvi@gmail.com';

                    $subject = 'Website Change Reqest';

                    $headers = "From: " . strip_tags($_POST['req-email']) . "\r\n";
                    $headers .= "Reply-To: ". strip_tags($_POST['req-email']) . "\r\n";
                    $headers .= "CC: susan@example.com\r\n";
                    $headers .= "MIME-Version: 1.0\r\n";
                    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
                    $base_url= "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
                    $message = '<a href="">hi</a>';
                    /*$body='Hi, <br/> <br/> We need to make sure you are human. Please verify your email and get started using your Website account. <br/>
                                    <br/> <a href="'.$base_url.'activation">'.$base_url.'activation</a>';*/

                    mail($to, $subject, $message, $headers);
                    echo "
                    <script>
                      alert('$message');
                         window.location='login.php';
                    </script>";
                } else {
                    echo "<script>alert('Error')</script>";
                }
            }
            else
            {
                echo "<script>alert('Contain only number')</script>";
            }
        }
        else{
            echo "<script>alert('!PHONE NUMBER ALREADY REGISTOR')</script>";
        }
    }
    else
    {
        echo "<script>alert('Error!Select another username')</script>";
    }
}


?>