<?php
class  chat{
    private $conn;
    private $db="oss";
    private $pass="";
    private $username="root";
    private $server="localhost";

    function __construct()
    {
        $this->conn= new mysqli($this->server,$this->username,$this->pass,$this->db);
        if($this->conn->connect_error) {
            die('connection error');
        }
    }

    function addMessage($id,$msg){
        $message=$this->conn->escape_string($msg);
        $sql="inesert into chat(vid,message) values('$id','$message')";
        $this->conn->query($sql);
    }

    function getMessage(){
        $arr=array();
        $id;
        $sql="Select *from chat WHERE id='$id'";
    }

}

?>