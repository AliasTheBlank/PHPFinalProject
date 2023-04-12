<?php
    include_once ("../header.php");
    include_once ("../functions.php"); 
    include_once ("../footer.php");

    session_start();
    CheckCorrectLevel(7);
    AddScore('success');
?>

<!DOCTYPE html>
<html>
    <body>
        <?php DisplayHeader("Congratulations"); ?>

        <div>

        <h1>You have won!</h1>
        <a href="./login">Log out?</a> <br>
        <a href="./restart.php">Try again?</a>


        </div>

        <?php DisplayFooterGames() ?>
    </body>
</html>