<?php
    include_once ("../header.php");
    include_once ("../functions.php"); 
    include_once ("../footer.php");
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

                <form action="level1" method="post" id="form1">

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
                $arrayAnswer = explode(",", $answer);

                for ($i = 0; $i < count($arrayAnswer); $i++) {
                    $arrayAnswer[$i] = str_replace(' ', '', $arrayAnswer[$i]);
                    echo $arrayAnswer[$i];
                }

                
                echo "<br>";
                if ($letters === $arrayAnswer)
                    echo "congrats";
                else 
                    echo "fail";
                ?>
                
            <?php } ?>
        </div>

        <?php DisplayFooterGames() ?>
    </body>
</html>
