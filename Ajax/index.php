<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.js"></script>
</head>
<body>

<h3> The chunch Bucket</h3>
Enter the food you like to other:
<input type="text" class="userInput" >
<input type="text" class="test" value="testing">

<div id ="underInput"/>


</body>
</html>

<script>

    $(".userInput").on('keyup', function (e) {
        var value = $(".test").val();
        $obj={
            data:"link",
            text:value,
        };
        $.ajax({
            type:"post",
            url:"function/function.php",
            data:$obj,
            success:function (response) {
                $.get("data.php",function (data) {
                    $("#underInput").html(data);    
                })
            }
        });

    });

</script>