<?php
    include_once ("../header.php");
    include_once ("../functions.php"); 
    include_once ("../footer.php");

    if (session_status() !== PHP_SESSION_ACTIVE)
    session_start();

    WinGame();
?>

<!DOCTYPE html>
<html>
    <body>
        <?php DisplayHeader("Congratulations"); ?>

        <div>

        <h1>You have won!</h1>
        <a href="./login">Log out?</a> <br>
        <a href="../Games/level1.php">Try again?</a>


        </div>

        <?php DisplayFooterGames() ?>
    </body>
</html>