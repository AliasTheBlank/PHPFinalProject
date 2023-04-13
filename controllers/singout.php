<?php
include_once ("./functions.php");

if (session_status() !== PHP_SESSION_ACTIVE)
    session_start();

if (CheckTries())
    AddScore("incomplete");

session_destroy();

?>

<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../views/login.php"> 