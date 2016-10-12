<?php
$con=mysqli_connect("localhost","root","","24");

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<?php
$sql="select * from pic ";
$res=$con->query($sql);
while($row=mysqli_fetch_array($res))
{

    ?>

   <?php
}
?>
<div class="chk">
    <input id="$row[id]" type="CHECKBOX">Approve<br>
    <input id="$row[id]" type="CHECKBOX">Approve<br>
    <input id="$row[id]" type="CHECKBOX">Approve<br>
    <input id="$row[id]" type="CHECKBOX">
</div>
<script src="../Final/assets/js/jquery.js"></script>

    <form id="myform">
        <input class="chk1" type="checkbox"  name="check" value="check1">
        <input class="chk1" type="checkbox"  name="check" value="check2">
        <input class="chk1" type="checkbox"  name="check" value="check3">
        <input class="chk1" type="checkbox"  name="check" value="check4">
        </form>




        <script>
        $('#myform :checkbox').change(function() {
            // this will contain a reference to the checkbox
                if (this.checked) {
                    if (confirm("are you sure")) {
                        var $value = $(this).val();
                        var $obj = {
                            data: "access",
                            value: $value
                        };
                        $.ajax({
                            type: "POST",
                            url: "function.php",
                            data: $obj,
                            success: function (result) {
                                alert('updated');
                            },
                            error: function (error) {
                                alert('error');
                            }
                        });
                    } else {
                        $(this).prop("checked", false)
                    }
                } else {
                    $(this).prop("checked", false)
                    // the checkbox is now no longer checked
                }
        });

        </script>

</body>
</html>
