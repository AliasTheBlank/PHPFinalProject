<?php 
include_once ('../controllers/functions.php'); 

if (session_status() !== PHP_SESSION_ACTIVE)
    session_start();

if (CheckSessionViews()) {

    switch ($_SESSION['level']) {
        case 1 : ?> <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../views/level1.php"> <?php break;
        case 2 : ?> <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../views/level2.php"> <?php break;
        case 3 : ?> <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../views/level3.php"> <?php break;
        case 4 : ?> <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../views/level4.php"> <?php break;
        case 5 : ?> <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../views/level5.php"> <?php break;
        case 6 : ?> <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../views/level6.php"> <?php break;
        case 7 : ?> <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../views/congratulations.php"> <?php break;
        default : ?> <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../views/login.php"> <?php break;
    }
}

?>