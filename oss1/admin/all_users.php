<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <meta charset="UTF-8">
    <title>Document</title>
    <link href="style/admin.css" rel="stylesheet">
    <link href="../style/bootstrap.min.css" rel="stylesheet">
    <link href="../style/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/custom.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid" class="">
    <?php
    require_once 'function/function.php';
    headder();
    sideBar();

    ?>


    <div class="col-lg-10 heading">
        <h3 >All USERS INFO</h3>
    </div>
    <div class="col-lg-10 adm-show">
        <?php
        $sql="select * from visitor";
        $result=Run($sql);

        echo '<table class="tbl-adm">

          <th>Name</th>
          <th>Mobile</th>
          <th>City</th>
          <th>Username</th>
          <th>Action</th>';
        while ($row=mysqli_fetch_array($result)){

            $name=ucfirst($row['name']) ;
            $phnumber=$row['ph_number'];
            $city=strtoupper($row['city']);
            $u_name=$row['user_name'];
            $vid=$row['vid'];
            echo'

           <tr>
               <td><a href="u_details.php?&vid='.$vid.'">'.$name.'</a> </td>
               <td>'.$phnumber.'</td>
               <td>'.$city.'</td>
               <td>'.$u_name.'</td>
               <td><input type="button" onClick="delUser('.$vid.')" value="DELETE" class="btn btn-primary btnDel "></td>
           </tr>';
        }
        echo' </table>';
        ?>
        <div class="col-lg-6" style="margin: 20px 20px!important;">
            <a href="../Visitor_Report.php" class="btn btn-primary" >Generate Report</a>
        </div>
    </div>
</div>
</body>
</html>
<script>
    function delUser(vid) {
        confirm("Are you sure")
        {
            $obj = {
                data: 'del',
                value: vid
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