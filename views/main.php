<?php 
include_once ("../functions.php"); 

CheckSession();

switch ($_SESSION['level']) {
    case 1 : ?> <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=./Games/level1.php"> <?php
    case 2 : ?> <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=./Games/level2.php"> <?php
    case 3 : ?> <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=./Games/level3.php"> <?php
    case 4 : ?> <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=./Games/level4.php"> <?php
    case 5 : ?> <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=./Games/level5.php"> <?php
    case 6 : ?> <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=./Games/level6.php"> <?php
    case 7 : ?> <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=./access/congratulations.php"> <?php
}

?>