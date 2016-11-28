
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="visitors/style/bootstrap.min.css">
        <link rel="stylesheet" href="visitors/style/visitor.css">

    </head>
    <body>
    <div  style="border-bottom:1px solid black;height: 40px;padding:0;margin:0;background-color: red ">
        <h1 class="login-header">Sign up</h1>
    </div>

    <div class="container  col-lg-12">
        <div>
            <div class="signin-form col-sm-5 col-lg-push-3 ">
                <form action="signup.php" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-sm-2">Name:</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" required class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Mobile:</label>
                        <div class="col-sm-10">
                            <input type="text" name="ph_number" required class="form-control" placeholder="03********" title="Pattern 03********"  pattern="03[0-9]{2}(?!1234567)(?!1111111)(?!7654321)[0-9]{7}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Email:</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" class="form-control "placeholder="xyz@yourmail.com" required title="Enter email ****@gmail.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Username:</label>
                        <div class="col-sm-10">
                            <input type="text" name="user_name" required class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button  type="submit" name="submit" class=" btn btn-md" value="Registor">Registor</button>
                        </div>
                    </div>
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
        $pass=$user_name.rand();
        $password=$pass;
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

                        $to =$email;

// Your subject
                        $subject="Your Password is here";

// From
                        $header="from: OSS <your oss>";

// Your message
                        $message="Password: \r\n";
                        $message.="$password";

// send email
                        mail($to,$subject,$message,$header);
                        echo "
                        <script>
                          alert('Wellcome!you successfully For Password Visit your email');
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


