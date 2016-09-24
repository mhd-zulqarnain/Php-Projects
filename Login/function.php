<?php
include 'connection.php';

class testing{
    public $response;
    public function save()
    {

        if(isset($_REQUEST['registor']))
        {
            $conn=myConnection();
            $name = $_REQUEST['userName'];
            $pass = $_REQUEST['pass'];
            $ph = $_REQUEST['phNumber'];
            $address = $_REQUEST['Address'];
            $sql = "INSERT INTO login(userName, pass,phNumber,address) VALUES ('$name','$pass','$ph','$address')";
            if($conn->query($sql)){
                $this->response="<script>alert('running')</script>";
                respone();
                header("location:Registor.php");
            }
            else
            {
                $this->response="<script>alert('error')</script>";
                respone();
                header("location:Registor.php");
            }}
    }
    public function respone(){
        echo $this->response;
    }
}
?>