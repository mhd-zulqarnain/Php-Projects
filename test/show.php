<?php
$conn = new mysqli("localhost", "root", "", "24");
$sql="select * from pic";
if($conn->connect_error)
{
    echo "error";
    exit;
}
$re=$conn->query($sql);
while ($row=mysqli_fetch_array($re))
{
    $url=$row['image'];
    $ext=$row['ext'];
    ?>
<div>
    <img src="<?php echo "images/".$url?> ">
</div>

<?php
}
?>