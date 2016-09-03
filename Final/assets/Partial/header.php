<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="assets/lib/bootstrap.min.css">
    <link rel="stylesheet" href="assets/js/jquery-3.1.0.min.js">
    <link rel="stylesheet" href="assets/style/custom.css">
</head>
<body>
<header class="site-header ">

    <div class="site-nav-wrap">
        <div class="container">
            <div class="site-header">
                <div class="header-row col-lg-12">
                    <div class="row">
                        <div class="header col-lg-9 ">
                            <h1>Travel Blog</h1>
                        </div>

                    </div>
                </div>
                <div class="site-nav col-lg-8 ">
                    <ul class=" navbar-nav nav navbar-left">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 ">
                    <form action="search.php" class="navbar-form navbar-left site-search" method=post >
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search" name="postname">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
<!--                        <input type="submit" style="position: absolute; left: -9999px"/>-->

                    </form>
                </div>
            </div>

        </div>

    </div>
</header>