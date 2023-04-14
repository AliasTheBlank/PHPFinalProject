<?php
    include_once ('./header.php');
    include_once ('../controllers/functions.php'); 
    include_once ('./footer.php');

    if (session_status() !== PHP_SESSION_ACTIVE)
      session_start();
      
    if (CheckSession() && CheckCorrectLevel(5)) {

    CheckLost();
?>

<!DOCTYPE html>
<html>
    <body>
        <?php DisplayHeader("Level 5"); ?>

        <div>
            <?php if (!isset($_POST['send'])) { ?>
                
                <h1>Sort the letter is alphabetic number, but just insert the first one and the last one.(Example: A Z)</h1>
                <?php $letters = GenerateLetter(); 
                foreach ($letters as $i) {
                    echo $i . " ";
                }
                ?>

                <form action="level5.php" method="post" id="form1">

                    <input type="text" name="answer" id="inputanswer" placeholder="Your answer">

                    <?php foreach ($letters as $i) { ?>
                        <input type="hidden" name="values[]" value="<?=$i?>">
                    <?php } ?>
                    
                    <input type="submit" value="Send it" name="send">
                    

                </form>
            

            <?php } else { ?>
                <?php $letters = $_POST['values'];
                sort($letters);
                echo "Expected: " . $letters[0] . " " . $letters[5];

                echo "<br>";
                $answer = trim($answer);
                $answer = str_replace(',', ' ', $answer);
                $answer = str_replace('  ', ' ', $answer);
                $arrayAnswer = explode(" ", $answer);

                echo "Inserted: ";
                for ($i = 0; $i < count($arrayAnswer); $i++) {
                    $arrayAnswer[$i] = str_replace(' ', '', $arrayAnswer[$i]);
                    echo $arrayAnswer[$i] . " ";
                }

                
                echo "<br>";
                if (count($arrayAnswer) == 2 && $arrayAnswer[0] == $letters[0] && $arrayAnswer[1] == $letters[5]) {
                    echo "congrats";
                    // add result to player

                    $_SESSION['level'] += 1;
                    ?> <a href="level6.php">Go the Next Level</a> <?php
                }
                else {
                    echo "fail";
                    // the player lies - 1 
                    $_SESSION['livesUsed'] += 1;

                    ?> <a href="level5.php">Try again</a> <?php
                }
                ?>
                
            <?php } ?>
        </div>
        <?php DisplayFooterGames(); } ?>

    </body>
</html>

