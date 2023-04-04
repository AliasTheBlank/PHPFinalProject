<?php
    include_once ("../header.php");
    include_once ("../functions.php"); 
    include_once ("../footer.php");

    if (session_status() !== PHP_SESSION_ACTIVE)
    session_start();

    CheckLost();
    
    //var_dump($_SESSION['livesUsed']);
?>

<!DOCTYPE html>
<html>
    <body>
        <?php DisplayHeader("Level 1"); ?>

        <div>
            <?php if (!isset($_POST['send'])) { ?>
                
                <?php $letters = GenerateLetter(); 
                foreach ($letters as $i) {
                    echo $i . " ";
                }
                ?>

                <form action="level1.php" method="post" id="form1">

                    <input type="text" name="answer" id="inputanswer" placeholder="Your answer">

                    <?php foreach ($letters as $i) { ?>
                        <input type="hidden" name="values[]" value="<?=$i?>">
                    <?php } ?>
                    
                    <input type="submit" value="Send it" name="send">
                    

                </form>
            

            <?php } else { ?>
                <?php $letters = $_POST['values'];
                sort($letters);
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
                    ?> <a href="level2.php">Go the Next Level</a> <?php
                }
                else {
                    echo "fail";
                    $_SESSION['livesUsed'] += 1;
                    ?> <a href="level1.php">Try again</a> <?php
                }
                ?>
                
            <?php } ?>
        </div>

        <?php DisplayFooterGames() ?>
    </body>
</html>

