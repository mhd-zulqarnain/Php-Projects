
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <meta charset="UTF-8">
    <title>Document</title>
    <link href="style/admin.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/custom.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid" class="">
    <?php
    require_once 'function/function.php';
    sideBar()?>

    <div class="col-lg-10 header" style="height: 40px;background-color: #a94a42">
        <?php getNoti()?>
    </div>

    <div class="col-lg-10 heading">
        <h3 >Details</h3>
    </div>
    <div class="col-lg-8 col-lg-push-1 user-show ">
        <?php
        $vid=$_REQUEST['vid'];
        cusPro($vid);
        ?>
    </div>
    </div>

</body>
</html>
<script>
    function delProd(pid) {
        confirm("Are you sure?")
        {
            $obj = {
                data: 'delpro',
                value: pid
            }
            $.ajax({
                url: 'function/function.php',
                data: $obj,
                type: 'POST',
                success: function (success) {
                    window.location.reload()

                },
                error: function (error) {
                    alert('error');
                }

            })
        }
    }
</script>