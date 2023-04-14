<?php 

include_once ('./header.php');
include_once ('../controllers/functions.php'); 
include_once ('./footer.php');
    
    if (session_status() !== PHP_SESSION_ACTIVE)
    session_start();
    
    if (CheckSession() && CheckCorrectLevel(3)) {

    CheckLost();
    ?>

<!DOCTYPE html>
<html>
    <?php DisplayHeader("Level 3"); ?>

    <div>
            <?php if (!isset($_POST['send'])) { ?>
                
                <h1>Sort the numbers.(Example: 1 2 3 4 5 6)</h1>
                <?php $letters = GenerateNumbers(); 
                foreach ($letters as $i) {
                    echo $i . " ";
                }
                ?>

                <form action="level3.php" method="post" id="form1">

                    <input type="text" name="answer" id="inputanswer" placeholder="Your answer please">

                    <?php foreach ($letters as $i) { ?>
                        <input type="hidden" name="values[]" value="<?=$i?>">
                    <?php } ?>
                    
                    <input type="submit" value="Send it" name="send">
                    

                </form>
            

            <?php } else { ?>
                <?php $numbers = $_POST['values'];
                sort($numbers);
                echo "Expected: ";
                for ($i = 0; $i < count($numbers); $i++) {
                    $numbers[$i] = intval($numbers[$i]);
                    echo $numbers[$i] . " ";
                }
                echo "<br>";
                $answer = trim($answer);
                $answer = str_replace(',', ' ', $answer);
                $answer = str_replace('  ', ' ', $answer);
                $arrayAnswer = explode(" ", $answer);
                $arrayAnswerNumber = array();

                echo "Inserted: ";
                for ($i = 0; $i < count($arrayAnswer); $i++) {
                    array_push($arrayAnswerNumber, intval($arrayAnswer[$i]));
                    echo $arrayAnswerNumber[$i] . " ";
                }

                echo "<br>";
                if ($numbers === $arrayAnswerNumber) {
                    echo "congrats";
                    $_SESSION['level'] += 1;
                    ?> <a href="./main.php">Go the Next Level</a> <?php
                }
                else {
                    echo "fail";
                    // the player lies - 1;
                    $_SESSION['livesUsed'] += 1;

                    ?> <a href="main.php">Try again</a> <?php

                }
                ?>
                
            <?php } ?>
        </div>
        <?php DisplayFooterGames(); } ?>

    </body>
</html>


