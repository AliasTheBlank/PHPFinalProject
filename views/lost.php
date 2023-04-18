<?php
    include_once ("./header.php");
    include_once ("../controllers/functions.php"); 
    include_once ("./footer.php");
?>

<!DOCTYPE html>
<html>
    <body>
        <?php DisplayHeader("You have lost"); ?>

        <div>

        <a href="../controllers/singout.php">Log out?</a> <br>
        <a href="../controllers/restart.php">Try again?</a>


        </div>

        <?php DisplayFooterGames() ?>
    </body>
</html>