<?php
function connect_db()
{

    $server = "localhost";
    $username = "root";
    $pass = "";
    $db = "record";

    return mysqli_connect($server,$username,$pass,$db);
}
