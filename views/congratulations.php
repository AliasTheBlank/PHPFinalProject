<?php
    include_once ("./header.php");
    include_once ("../controllers/functions.php"); 
    include_once ("./footer.php");

    if (session_status() !== PHP_SESSION_ACTIVE)
        session_start();

    if (CheckSession() && CheckCorrectLevel(7)) {
    
    if (!isset($_SESSION['recordedWin'])) {
        AddScore('success');
    }

?>

<!DOCTYPE html>
<html>
    <body>
        <?php DisplayHeader("Congratulations"); ?>

        <div>

        <h1>You have won!</h1>
        <a href="../controllers/singout.php">Log out?</a> <br>
        <a href="../controllers/restart.php">Try again?</a>


        </div>

        <?php DisplayFooterGames(); } ?>
    </body>
</html>