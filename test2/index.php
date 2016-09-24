
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="../Final/assets/js/jquery.js"></script>
</head>
<body>

<form action="index.php" method="Post" enctype="multipart/form-data">
    <input type="file" name="file" onchange="preview()" id="file">
    <input type="file" name="file" onchange="preview1()" id="file1">
    <input type="submit" name="submit" >
    <img src="" height="300px" width="200px" class="imag" >
    <img src="" height="300px" width="200px" class="imag1" >
</form>
<p></p>

</body>
</html>





<script>
    
    function preview(){
        var preview=document.querySelector('.imag');
        var file=document.querySelector('input[type=file]').files[0];
        var reader=new FileReader();
        reader.addEventListener("load",function () {
            preview.src=reader.result;
        });
        if (file) {
            reader.readAsDataURL(file);
        }
        
    } function preview1(){
        var preview1=document.querySelector('.imag1');
        var file1=document.querySelector('input[type=file]').files[0];
        var reader=new FileReader();
        reader1.addEventListener("load",function () {
            preview1.src=reader1.result;
        });
        if (file1) {
            reader.readAsDataURL(file1);
        }

    }
</script>



