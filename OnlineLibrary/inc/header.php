<html>
<head>
	<title><?php echo $pageTitle; ?></title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
</head>
<body>

	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" id="brand" href="index.php"></a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
					<li><a href="contact-us.php">Contact Us</a></li>

				</ul>
				<form class="navbar-form navbar-right" action="booksearch.php" method="POST">
					<div class="form-group">
						<input type="text" name="searchtitle" class="form-control" placeholder="Title">
						<input type="text" name="searchauthor" class="form-control" placeholder="Author">
						<button type="submit" class="btn btn-default">Search</button>
					</form>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>

	<div class="row">


