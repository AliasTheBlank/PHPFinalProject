<?php require_once "../models/Db.php"; 

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

        <?php

        $validation = false;
        
        if (isset($_GET['validation']))
            $validation = $_GET['validation'];

        $userexist = false;
        if (isset($_GET['userexist']))
            $userexist = $_GET['userexist'];

        if (!isset($_POST['send'])) { ?>
            <?php if ($validation) {
                ?> <h1>Error passwords doesn't match</h1><?php
                }

                if ($userexist) {
                    ?> <h1>This username doesn't exists</h1> <?php
                }
                ?>
            <div class="divs">
            <form class="forms" action="changePassword.php" method="post">
                <label>
                    <p>Username:</p>
                    <input type="text" required="require" name="username">
                </label>

                <label >
                    <p>Password:</p>
                    <input type="password" name="password" required="require">
                </label>

                <label>
                    <p>Confirm Password</p>
                    <input type="password" name="confirmpassword" required="require">
                </label>
                <br>
                <input type="submit" value="Change password" name="send">
            </form>
            </div>
            <div class="links">
            <a href="./login.php">Already have an account? Log in!</a> <br>
            <a href="./register.php">Don't have an account? Sing up!</a>
            </div>

        <?php } else { 

            if ($_POST['password'] != $_POST['confirmpassword'])
            {
                unset($_POST['send']);
                ?> <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=register.php?validation=true"> <?php
            }

            $dbHandler = DataBaseHandler::Connection();
            $dbHandler->OpenConnection();
            $dbHandler->connectToDB("kidsGame");
            $connection = $dbHandler->getDataBase();

            $username = $_POST['username'];

            $result = $connection->query("Select count(*) from player where userName = '".$username."'");
            //exit();
            $each_row = $result->fetch_array(MYSQLI_ASSOC);

            if ($each_row['count(*)'] == 0) {
                unset($_POST['send']);
                ?> <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=register.php?userexist=true"> <?php
            }

            else {
            $password = $_POST['password'];
            $passwordEncrypted = password_hash($password,PASSWORD_DEFAULT);

            $value = $connection->query("UPDATE player SET password = '".$passwordEncrypted."' where userName = '".$username."'");

            ?> <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=login.php?passwordchange=true"> <?php
            }
        } }?>
    </body>
</html>