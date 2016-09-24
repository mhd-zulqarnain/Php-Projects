<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="jquery-te-1.4.0.css" type="text/css">
    <link rel="stylesheet" href="demo.css" type="text/css">
    <script type="text/javascript" src="jquery.js" charset="utf-8"></script>
    <script type="text/javascript" src="jquery-te-1.4.0.js" charset="utf-8"></script>


</head>
<body style="text-align: center">
<input type="file" accept="image/*" onchange="loadFile(event)">
<img id="output"/>
<script>
    var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('output');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>

<textarea name="textarea" class="jqte_editor"></textarea>
<script type="text/javascript">
    $(document).ready(function () {
        $('.jqte_editor').jqte();

    })
</script>
</body>
</html>
<!--extract($_POST);
$error=array();
$extension=array("jpeg","jpg","png","gif");
foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name)
{
$file_name=$_FILES["files"]["name"][$key];
$file_tmp=$_FILES["files"]["tmp_name"][$key];
$ext=pathinfo($file_name,PATHINFO_EXTENSION);
if(in_array($ext,$extension))
{
if(!file_exists("photo_gallery/".$txtGalleryName."/".$file_name))
{
move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"photo_gallery/".$txtGalleryName."/".$file_name);
}
else
{
$filename=basename($file_name,$ext);
$newFileName=$filename.time().".".$ext;
move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"photo_gallery/".$txtGalleryName."/".$newFileName);
}
}
else
{
array_push($error,"$file_name, ");
}
}-->