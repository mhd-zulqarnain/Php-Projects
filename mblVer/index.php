
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<form action="index.php" method="post" enctype="multipart/form-data">
    <input type="text" name="number">
    <input type="submit" name="submit">
</form>

</body>
</html>



<?php
if(isset($_POST['submit'])){

    $number="92".$_POST['number'];
    $appID = 'b068886097b841a993fd8a0';
    $accessToken ='516153235c64fe3472dab553e92cb82f76557805';
    $request = "https://www.cognalys.com/api/v1/otp/?access_token=".$accessToken."&app_id=".$appID."&mobile=".$number;
    $json = file_get_contents($request);
    echo $json;
}

?>