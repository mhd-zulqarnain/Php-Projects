<?php

class Usermodel extends  CI_Controller{
    
    function getUser(){
        return [
          ['Firstname'=>'firstuser','Lastname'=>'lastnmae'], 
            ['Firstname'=>'Seconduser','Lastname'=>'lastnmae'],

        ];
    }
}

?>