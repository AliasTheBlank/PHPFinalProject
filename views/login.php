<?php require_once "../models/Db.php";
require_once "../controllers/functions.php";

if (session_status() !== PHP_SESSION_ACTIVE)
    session_start();

if (isset($_SESSION['level'])) {
    ?> <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../views/main.php"> <?php
}
else {
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../public/css/style.css">
        <title>Final Project</title>
    </head>

    <body>
        <h1>Welcome to our php final project</h1>
        <hr>

        <a class = "history" href="./history.php" style=" top:20px ; position:absolute">History</a>
        <?php 
        
        $message = isset($_GET['error']) && $_GET['error'] === "true" ? "This user doesn't exist" : null;
        ?> <h2><?=$message?></h2> <?php

        $message = isset($_GET['password']) && $_GET['password'] === "true" ? "Forgot your password? <a href=\"./changePassword.php\">Change it!</a>" : null;
        ?> <h2><?=$message?></h2> <?php

        $usercreated = false;
        if (isset($_GET['usercreated'])) {
            $usercreated = $_GET['usercreated'];
        }

        $passwordchange = false;
        if (isset($_GET['passwordchange'])) {
            $passwordchange = $_GET['passwordchange'];
        }

        if (!isset($_POST['send'])) {

            if ($usercreated) {
            ?>  <h1>User created</h1> <?php
            }

            if ($passwordchange) {
                ?>  <h1>Password change</h1> <?php
            }
        ?>
        <div class="divs">
        <form class="forms" action="login.php" method="post">
            <label>
                <p>Username:</p>
                <input type="text" required="require" name="username">
            </label>

            <label >
                <p>Password:</p>
                <input type="password" name="password" required="require">
            </label>

            <input type="submit" value="Login" name="send">
        </form>
        </div>
        <div class="links">
        <a class="singUp" href="./register.php">Don't have an account? Sing up!</a> <br>
        <a class="passwordChange" href="./changePassword.php">Forgot your password? Change it!</a>
        </div>

        <?php } else {


            $dbHandler = DataBaseHandler::Connection();
            $dbHandler->OpenConnection();
            $dbHandler->connectToDB("kidsGame");
            $connection = $dbHandler->getDataBase();

            $userName = $_POST['username'];
            $password = $_POST['password'];

            $result = $connection->query("Select count(*), registrationOrder, password from player where userName = '".$userName."'");

            $each_row = $result->fetch_array(MYSQLI_ASSOC);
            
            if ($each_row['count(*)'] == 1 ) {

                if (password_verify($password, $each_row['password'])) {

                $_SESSION['registrationOrder'] = $each_row["registrationOrder"];
                $_SESSION['livesUsed'] = 0;
                $_SESSION['level'] = 1;
                ?> <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=./level1.php"> <?php

                }

                else {
                    ?> <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=login.php?password=true"> <?php
                }
            }
            else{
                ?> <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=login.php?error=true"> <?php
            }


        } }?>
    </body>
</html>