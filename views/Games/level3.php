<?php include_once ("../header.php"); 
    include_once ("../functions.php"); ?>

<!DOCTYPE html>
<html>
    <?php DisplayHeader("Level 3"); ?>

    <div>
            <?php if (!isset($_POST['send'])) { ?>
                
                <?php $letters = GenerateNumbers(); 
                foreach ($letters as $i) {
                    echo $i . " ";
                }
                ?>

                <form action="level3" method="post" id="form1">

                    <input type="text" name="answer" id="inputanswer" placeholder="Your answer please">

                    <?php foreach ($letters as $i) { ?>
                        <input type="hidden" name="values[]" value="<?=$i?>">
                    <?php } ?>
                    
                    <input type="submit" value="Send it" name="send">
                    

                </form>
            

            <?php } else { ?>
                <?php $numbers = $_POST['values'];
                sort($numbers);
                for ($i = 0; $i < count($numbers); $i++) {
                    $numbers[$i] = intval($numbers[$i]);
                    echo $numbers[$i] . " ";
                }
                echo "<br>";
                $arrayAnswer = explode(",", $_POST['answer']);
                $arrayAnswerNumber = array();

                for ($i = 0; $i < count($arrayAnswer); $i++) {
                    array_push($arrayAnswerNumber, intval($arrayAnswer[$i]));
                    echo $arrayAnswerNumber[$i] . " ";
                }

                echo "<br>";
                if ($numbers === $arrayAnswerNumber)
                    echo "congrats";
                else 
                    echo "fail";
                ?>
                
            <?php } ?>
        </div>
    </body>
</html>


