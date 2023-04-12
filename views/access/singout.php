<?php
include_once ("../functions.php");

if (session_status() !== PHP_SESSION_ACTIVE)
    session_start();

AddScore("incomplete");

session_destroy();

?>

<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=./login.php"> 