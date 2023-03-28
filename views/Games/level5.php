<?php
    include_once ("../header.php");
    include_once ("../functions.php"); 
?>

<!DOCTYPE html>
<html>
    <body>
        <?php DisplayHeader("Level 5"); ?>

        <div>
            <?php if (!isset($_POST['send'])) { ?>
                
                <?php $letters = GenerateLetter(); 
                foreach ($letters as $i) {
                    echo $i . " ";
                }
                ?>

                <form action="level5" method="post" id="form1">

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
                if (count($arrayAnswer) == 2 && $arrayAnswer[0] == $letters[0] && $arrayAnswer[1] == $letters[5])
                    echo "congrats";
                else 
                    echo "fail";
                ?>
                
            <?php } ?>
        </div>
    </body>
</html>

