<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>friendy</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= ACC_SCRIPTROOT ?>../css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?= SCRIPTROOT ?>">FLASH <span class="glyphicon glyphicon-flash" aria-hidden="true"></span></a>
        </div>
        <ul class="nav navbar-nav">
          <li><a href="<?= ACC_SCRIPTROOT ?>profile.php?username=<?php echo $_SESSION['auth']['username'] ?>"><?php echo $_SESSION["auth"]["username"] ?></a></li>
          <li><a href="<?php SCRIPTROOT ?>index.php">Time line</a></li>
          <li><a href="<?php SCRIPTROOT ?>friends.php">Friends</a></li>
        </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?= ACC_SCRIPTROOT ?>edit_profile.php">update profile</a></li>
            <li><a href="<?= SCRIPTROOT ?>logout.php">Logout</a></li>
            <form action="search.php" method="get" class="navbar-form navbar-left">
              <div class="form-group">
                <input type="text" placeholder="meet new friends" name="q" class="form-control">
              </div>
              <button type="submit" class="btn btn-default">Search</button>
            </form>
        </ul>
      </div>
    </nav>
    <div class="container">
