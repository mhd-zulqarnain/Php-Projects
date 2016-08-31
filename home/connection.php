<?php
function conn_DB(){
    $server="localhost";
    $username="root";
    $pwd="";
    $db="home";
    return mysqli_connect($server,$username,$pwd,$db);

}


?>