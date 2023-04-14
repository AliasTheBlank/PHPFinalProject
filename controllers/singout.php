<?php
include_once ("./functions.php");

if (session_status() !== PHP_SESSION_ACTIVE)
    session_start();

if (CheckTries() && $_SESSION['level'] != 7)
    AddScore("incomplete");

session_destroy();

?>

<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../views/login.php"> 