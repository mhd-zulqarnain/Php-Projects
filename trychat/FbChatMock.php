<?php

class FbChatMockup{
    private $dbconnection;
    private $server='localhost';
    private $user='root';
    private $password='';
    private $db='fbchat';


    public function __construct(){
        $this->dbconnection= new mysqli($this->server,$this->user,$this->password,$this->db);
        if($this->dbconnection->connect_error){
            die('Connection error');
        }
    }
    
    public function conn(){
        return $this->dbconnection= new mysqli($this->server,$this->user,$this->password,$this->db);
    }

    public function getMessages(){
        
        $message=array();
        $sql="SELECT chat.message,chat.sent_on,users.id,users.username FROM users join chat on chat.user_id=users.id order by sent_on";
        $result=$this->dbconnection->query($sql);   
        while($row=mysqli_fetch_assoc($result))
        {
            array_push($message,$row) ;
        }
        return $message;
    }
    public function getName($id){

        $sql="SELECT username FROM users WHERE id='$id'";
        $result=$this->dbconnection->query($sql);
        $name=mysqli_fetch_assoc($result);
        return $name;
    }

    public function addmessage($uid,$msg){
        $addResult=false;
        $userID= (int)$uid;
        $mesg=$this->dbconnection->escape_string($msg);
        $sql="insert into chat(user_id,message,sent_on) VALUE ('$userID','$msg',UNIX_TIMESTAMP())";
        $res=$this->dbconnection->query($sql);
        if($res!==false){
            $addResult=$this->dbconnection->insert_id;
        }else {
            echo $this->dbConnection->error;
        }
        return $addResult;
    }


}
?>