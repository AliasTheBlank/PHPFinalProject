<?php
    include_once ("../Classes/Db.php");

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
            $number= rand(0, 100);
            array_push($myArray, $number);
        }

        return $myArray;
    }

    function LossGame() {
        
        AddScore('failure');
    }

    function IncompleteGame() {
        AddScore('incomplete');
        ?> <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=./access/login.php"> <?php
    }

    function WinGame() {
        AddScore('success');
        ?> <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=./access/congratulations.php"> <?php
    }

    function AddScore($result) {
        $dbHander = DataBaseHandler::Connection();
        $dbHander->OpenConection();
        $dbHander->ConnectToDB("Kidsgame");
        $connection = $dbHander->getDataBase();

        date_default_timezone_set('America/Toronto');
        $Time = date("Y-m-d h:i:sa");

        $lives = $_SESSION['livesUsed'];
        $registrationOrder = $_SESSION['registrationOrder'];
        $connection->query("INSERT INTO score VALUES ('".$Time."', '".$result."', '".$lives."', '".$registrationOrder."')");
    }

    function CheckTries() {
        if ($_SESSION['livesUsed'] < 6)
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
        LossGame();
        ?> <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../access/lost.php"> <?php
    }

    function CheckSession() {
        if (!isset($_SESSION['registrationOrder'])) {
            ?> <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../access/login.php"> <?php
        }
    }

    function CheckCorrectLevel(int $level) {
        if ($_SESSION['level'] != $level) {
            ?> <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../main.php"> <?php
        }
    }
?>