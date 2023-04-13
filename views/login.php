<?php require_once "../models/Db.php";?>
<!DOCTYPE html>
<html>
    <head><title>Final Project</title></head>

    <body>
        <h1>Welcome to our php final project</h1>
        <hr>

        <a href="./history.php">History</a>
        <?php 
        
        $message = isset($_GET['error']) && $_GET['error'] === "true" ? "User and password doesn't match" : null;
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
        <form action="login.php" method="post">
            <label>
                <p>Username:</p>
                <input type="text" required="require" name="username">
            </label>

            <label >
                <p>Password:</p>
                <input type="text" name="password" required="require">
            </label>

            <input type="submit" value="Login" name="send">
        </form>
        
        <a href="./register.php">Don't have an account? Sing up!</a> <br>
        <a href="./changePassword.php">Forgot your password? Change it!</a>

        <?php } else {


            $dbHandler = DataBaseHandler::Connection();
            $dbHandler->OpenConnection();
            $dbHandler->connectToDB("kidsGame");
            $connection = $dbHandler->getDataBase();

            $userName = $_POST['username'];
            $password = $_POST['password'];

            $result = $connection->query("Select count(*), registrationOrder from player where userName = '".$userName."' and password = '".$password."'");

            $each_row = $result->fetch_array(MYSQLI_ASSOC);
            
            if ($each_row['count(*)'] == 1) {
                session_start();

                $_SESSION['registrationOrder'] = $each_row["registrationOrder"];
                $_SESSION['livesUsed'] = 0;
                $_SESSION['level'] = 1;
                ?> <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=./level1.php"> <?php
            }
            else{
                ?> <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=login.php?error=true"> <?php
            }
            


        } ?>
    </body>
</html>