<?php include_once ("../header.php"); 
    include_once ("../functions.php"); ?>

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

                <form action="level2" method="post" id="form1">

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
    </body>
</html>


