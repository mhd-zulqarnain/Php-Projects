<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap-theme.css" type="text/css">
    <link rel="stylesheet" href="css/custom.css" type="text/css">
</head>
<body>

<nav class="navbar navbar-inverse site-header">
    <div class="container-fluid site-header">
        <div class="navbar-header">
            <a class="navbar-brand fa fa-twitter fa-5x" href="#"></a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Sign Up</a></li>
            <li><a href="#">Login</a></li>
        </ul>
    </div>
</nav>

<wrapper class="col-lg-12">
    <form class=" col-lg-4 col-lg-offset-4 site-login ">
        <div class="form-group">
            <label class="control-label col-sm-12" for="email"><h4><b>Login</b></h4></label>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-12" for="email">Email:</label>
            <div class="col-sm-12">
                <input type="email" class="form-control" id="email" placeholder="Enter email">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-12" for="pwd">Password:</label>
            <div class="col-sm-12">
                <input type="password" class="form-control" id="pwd" placeholder="Enter password">
            </div>
        </div>
        <div class="form-group">
            <div class=" col-sm-10">
                <div class="checkbox">
                    <label><input type="checkbox"> Remember me</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-block btn-primary btn-login"><b>Log in</b></button>
            </div>
        </div>
    </form>
</wrapper>


</body>
</html>