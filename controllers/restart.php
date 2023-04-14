<?php
if (session_status() !== PHP_SESSION_ACTIVE)
session_start();

$_SESSION['livesUsed'] = 0;
$_SESSION['level'] = 1;

if (isset($_SESSION['recordedWin'])){
    unset($_SESSION['recordedWin']);
}

?>

<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../views/main.php">