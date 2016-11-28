<?php

class visitor{
    private  $vid;
    private $conn;

    function __construct()
    {
        $this->conn=mysqli_connect("localhost","u940906128_root","","oss");
    }

    function Run($sql){
        $this->conn->query($sql);
    }
    function allRemove($tbl){
        $sql="Delete from".$tbl;  ////remove all items 
        Run($sql);
    }
    
    
    function cusPro($vid){
        echo '<div class="col-lg-6 pull-left">

            <h2>Items for Sell</h2>
                <table class="table table-condensed">
                    <th>Product name</th>
                    <th>Price</th>
                    <th>status</th>
                    <th>Approved</th>';



        $sql="Select * from productdetails WHERE vid='$vid'";
        $res=Run($sql);
        while($row=mysqli_fetch_array($res)){
            $pid=$row['pid'];
            $name=$row['p_name'];
            $price=$row['price'];
            if($row['approved']=='1'){
                $approve="Yes";
            }
            else
                $approve="No";
            if($row['sell_out']=='1'){
                $status="Sell out";
            }
            else
                $status="Not sell";

            echo '<tr>
                        <td>
                            <a href="prodetails.php?p_id='.$pid.'">';
            echo $name.' </a>
                        </td>
                        <td> '.$price.'</td>
                        <td> '.$status.' </td>
                        <td> '.$approve .'</td>
                        <td>
                       
                        </td>';

        }
        echo '</tr>
                </table>
                </div>
';
    }
    
    
}

?>