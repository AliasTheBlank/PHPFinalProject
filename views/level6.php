<?php 
    include_once ('./header.php');
    include_once ('../controllers/functions.php'); 
    include_once ('./footer.php');

    if (session_status() !== PHP_SESSION_ACTIVE)
    session_start();
    

    CheckSession();
    CheckCorrectLevel(6);

    CheckLost();
    
    ?>

<!DOCTYPE html>
<html>
    <?php DisplayHeader("Level 6"); ?>

    <div>
            <?php if (!isset($_POST['send'])) { ?>
                
                <?php $letters = GenerateNumbers(); 
                foreach ($letters as $i) {
                    echo $i . " ";
                }
                ?>

                <form action="level6.php" method="post" id="form1">

                    <input type="text" name="answer" id="inputanswer" placeholder="Your answer please">

                    <?php foreach ($letters as $i) { ?>
                        <input type="hidden" name="values[]" value="<?=$i?>">
                    <?php } ?>
                    
                    <input type="submit" value="Send it" name="send">
                    

                </form>
            

            <?php } else { ?>
                <?php $number = $_POST['values'];
                sort($number);
                foreach ($number as $i) {
                    echo $i . " ";
                }

                echo "<br>";
                $arrayAnswer = explode(" ", $_POST['answer']);
                $arrayAnswerNumber = array();

                for ($i = 0; $i < count($arrayAnswer); $i++) {
                    array_push($arrayAnswerNumber, intval($arrayAnswer[$i]));
                    echo $arrayAnswerNumber[$i] . " ";
                }

                
                echo "<br>";
                if (count($arrayAnswerNumber) == 2 && $arrayAnswerNumber[0] == $number[0] && $arrayAnswerNumber[1] == $number[5]) { 
                    $_SESSION['level'] += 1;
                    WinGame();
                    ?> <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=./main.php"> <?php
                    // sing out
                }
                else {
                    echo "fail";
                    // the player lies - 1;
                    $_SESSION['livesUsed'] += 1;
                    ?> <a href="main.php">Try again?</a> <?php
                }
                ?>
                
            <?php } ?>
        </div>
        <?php DisplayFooterGames() ?>

    </body>
</html>

