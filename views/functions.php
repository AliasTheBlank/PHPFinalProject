<?php


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

?>