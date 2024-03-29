<?php
    require_once("../models/Db.php");

    function GenerateLetter() {
        $myArray = array();
        for ($i = 0; $i < 6; $i++) {

            $number = rand(0, 25);
            $number = $number + 65;
            array_push($myArray, chr($number));
            
        }

        return $myArray;
    }

    function GenerateNumbers() {
        $myArray = array();

        for ($i = 0; $i < 6; $i++) {
            $number= rand(0, 101);
            array_push($myArray, $number);
        }

        return $myArray;
    }

    function IncompleteGame() {
        AddScore('incomplete');
        ?> <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../views/login.php"> <?php
    }

    function WinGame() {
        AddScore('success');
    }

    function AddScore($result) {
        $dbHander = DataBaseHandler::Connection();
        $dbHander->OpenConnection();
        $dbHander->ConnectToDB("Kidsgame");
        $connection = $dbHander->getDataBase();

        date_default_timezone_set('America/Toronto');
        $Time = date("Y-m-d H:i:s");

        $lives = $_SESSION['livesUsed'];
        $registrationOrder = $_SESSION['registrationOrder'];
        $connection->query("INSERT INTO score VALUES ('".$Time."', '".$result."', '".$lives."', '".$registrationOrder."')");

        if ($result == 'success') {
            $_SESSION['recordedWin']= true;
        }
    }

    function ResetStats() {
        $_SESSION['livesUsed'] = 0;
        $_SESSION['level'] = 1;
    }

    function CheckTries() {


        if (session_status() === PHP_SESSION_ACTIVE && $_SESSION['livesUsed'] < 6)
            return true;
        
        else 
            return false;

    }

    function CheckLost() {
        if (!CheckTries()) {
            LostCase();
        }

    }

    function LostCase() {
        AddScore('failure');
        ?> <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../views/lost.php"> <?php
    }

    function CheckSession() {
        if (!isset($_SESSION['registrationOrder'])) {
            ?> <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../views/login.php"> <?php
            return false;
        }

        return true;
    }

    function CheckSessionViews() {
        if (!isset($_SESSION['registrationOrder'])) {
            ?> <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../views/login.php"> <?php
            return false;
        }

        return true;
    }

    function CheckCorrectLevel(int $level) {
        if (!isset($_SESSION['level']) || $_SESSION['level'] != $level) {
            ?> <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../views/main.php"> <?php
            return false;
        }

        return true;
    }
?>