<?php
class  chat{
    private $conn;
    private $db="oss1";
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

    function addMessage($pid,$id,$msg){
        $message=$this->conn->escape_string($msg);
        $time= date("Y-m-d h:i:s");
        $sql="insert into chat(vid,pid,message,time) values('$id','$pid','$message','$time')";
        $this->conn->query($sql);
    }

    function getMessage($pid){
        $msg=array();
        $sql="Select * from chat WHERE pid='$pid'";
        $sql="SELECT message,time,name FROM chat JOIN visitor WHERE chat.vid=visitor.vid AND chat.pid='$pid'";
        $res=$this->conn->query($sql);
        while ($row=mysqli_fetch_array($res)){
            array_push($msg,$row);
        }
        return $msg;
    }

}

?>