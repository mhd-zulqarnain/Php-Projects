
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="login.css">

</head>
<body>
<div  style="border-bottom:1px solid black;height: 40px;padding:0;margin:0;background-color: red ">
    <h1 class="login-header">Blog </h1>
</div>
<?php include "function.php";
$obj= new testing();
?>
<div class="container  col-lg-12">
    <div>
        <div class="signin-form col-lg-4 col-lg-push-4 well">
            <form action="<?php $obj->save();?>" method="post" >
                <h3>Sign up</h3>
                <div class="form-group">
                    <input type="text" name="userName" placeholder="Enter your email" class="form-control" required >
                </div>
                <div class="form-group">
                    <input type="password" name="pass" placeholder="Password" class="form-control" required >
                </div>
                <div class="form-group">
                    <input type="text" name="phNumber" placeholder="Enter your Mobile Number" class="form-control" tip required >
                </div>
                <div class="form-group">
                    <textarea name="Address"cols="30" rows="3" class="form-control" placeholder="Enter your Address"></textarea>
                </div>
                <input type="submit" name="registor" class="col-lg-2 btn btn-md" value="Registor">
            </form>
        </div>
    </div>
    <p>respones:<?php echo $obj->respone()?></p>
</body>
</html>

