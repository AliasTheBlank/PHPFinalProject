<?php 
    include_once ('./header.php');
    include_once ('../controllers/functions.php'); 
    include_once ('./footer.php');

    if (session_status() !== PHP_SESSION_ACTIVE)
    session_start();
    
    CheckSession();
    CheckCorrectLevel(2);
    CheckLost();
    //var_dump($_SESSION['livesUsed']);
    ?>

<!DOCTYPE html>
<html>
    <?php DisplayHeader("Level 2"); ?>

    <div>
            <?php if (!isset($_POST['send'])) { ?>
                
                <?php $letters = GenerateLetter(); 
                foreach ($letters as $i) {
                    echo $i . " ";
                }
                ?>

                <form action="level2.php" method="post" id="form1">

                    <input type="text" name="answer" id="inputanswer" placeholder="Your answer">

                    <?php foreach ($letters as $i) { ?>
                        <input type="hidden" name="values[]" value="<?=$i?>">
                    <?php } ?>
                    
                    <input type="submit" value="Send it" name="send">
                    

                </form>
            

            <?php } else { ?>
                <?php $letters = $_POST['values'];
                rsort($letters);
                foreach ($letters as $i) {
                    echo $i;
                }

                echo "<br>";
                $answer = $_POST['answer'];
                $arrayAnswer = explode(" ", $answer);

                for ($i = 0; $i < count($arrayAnswer); $i++) {
                    $arrayAnswer[$i] = str_replace(' ', '', $arrayAnswer[$i]);
                    echo $arrayAnswer[$i];
                }

                
                echo "<br>";
                if ($letters === $arrayAnswer) {
                    echo "congrats";
                    $_SESSION['level'] += 1;
                    ?> <a href="main.php">Go the Next Level</a> <?php
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

        <?php DisplayFooterGames() ?>

    </body>
</html>


