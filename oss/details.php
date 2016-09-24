<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="style/bootstrap.min.css" rel="stylesheet">
    <link href="style/main.css" rel="stylesheet">
    <?php include("function/function.php");?>
</head>
<body>
<div class="container main">
    <div class="col-lg-12">
        <div class="col-lg-4 logo">
            <a href="#"> <img src="../Final/assets/images/avatar.png"></a>
        </div>

        <div class="col-lg-12 header">
            <div class="col-lg-4 country"></div>
            <div class="col-lg-4 pull-right status"></div>
        </div>
    </div>

    <div class="col-lg-12 wrapper">
        <div class="col-lg-2 cat">
            <ul>
                <?php getCat()?>

            </ul>
        </div>
        <div class="col-lg-8 product">
            <?php getProDetails()?>
        </div>
        <div class="col-lg-2 bet"></div>
    </div>

</div>
</body>
</html>