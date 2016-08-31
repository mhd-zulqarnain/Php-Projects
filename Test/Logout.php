<?php
session_start();

if(!isset($_SESSION['userSession']))
{
    header("Location: index.Partial");
}
else if(isset($_SESSION['userSession'])!="")
{
    header("Location: home.Partial");
}

if(isset($_GET['logout']))
{
    session_destroy();
    unset($_SESSION['userSession']);
    header("Location: index.Partial");
}
?>