
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
                Mobile Number:<input type="text" name="ph_number" title="9200000000"  pattern="[7890][0-9]{9}"><br><br>
                email:<input type="text" name="email" required title="Enter email ****@gmail.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"><br><br>
                username:<input type="text" name="user_name" required><br><br>
                password:<input type="password" name="pass" required><br><br>
                <input type="submit" name="submit" class=" btn btn-md" value="Registor">
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
    $user_name=$_POST['user_name'];
    $password=$_POST['pass'];
    $time=time();
    $sql="INSERT INTO visitor( name, ph_number, email,user_name,password,login_activity)
           VALUES ('$name', '$ph_number', '$email','$user_name','$password','$time')";

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

                    /*$query="Select vid from visitor where user_name='$user_name' AND password='$password'";
                    //$id=Run($query);
                    $vid=mysqli_fetch_assoc($id);
                    $msg='<a href='.$_SERVER['https'].'"verify.php?vid='.$vid['vid'].'">click here to verify your account</a>';
                    mail($email,"Account verification",$msg);*/
                    echo "
                    <script>
                      alert('Wellcome!you successfully verify your email');
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


