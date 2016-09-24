<?php
include("function/function.php");
session_start();
if($_SESSION['vid']!="")
{?>

<?php title();?>
<div class="col-lg-12 wrapper">
    <?php sideBar();?>

    <div class="col-lg-10 cus-action">
        <div class="col-lg-12 pull-right">
            <form>
                <table class="table table-condensed">
                    <th>Product name</th>
                    <th>Price</th>
                    <th>status</th>
                    <th>Action</th>
                    <tr>
                        <td>S4 </td>
                        <td>RS 3000</td>
                        <td>Approved </td>
                        <td>sell </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    </div>








 <?php
}else{
    header("location:login.php");
}
?>