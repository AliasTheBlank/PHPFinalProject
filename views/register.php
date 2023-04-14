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
        <title>Final Project</title>
        <link rel="stylesheet" href="../public/css/style.css">
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
                    ?> <h1>This username already exists</h1> <?php
                }
                ?>
            <div class="divs">
            <form class ="forms" action="register.php" method="post">
                <label >
                    <p>Name:</p>
                    <input type="text" name="fName" required="require">
                </label>    
            
                <label >
                    <p>Last name:</p>
                    <input type="text" name="lName" required="require">
                </label>
            
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

                <input type="submit" value="Register" name="send">
            </form>
            </div>
            <div class="links">
            <a href="./login.php">Already have an account? Log in!</a> <br>
            <a href="./changePassword.php">Forgot your password? Change it!</a>
            </div>

        <?php } else { 

            $password = $_POST['password'];
            $confirmPassword = $_POST['confirmpassword'];

            $passwordEncrypted = password_hash($password,PASSWORD_DEFAULT);

            if ( $password != $confirmPassword)
            {
                unset($_POST['send']);
                ?> <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=register.php?validation=true"> <?php
            }

            $dbHandler = DataBaseHandler::Connection();
            $dbHandler->OpenConnection();
            $dbHandler->connectToDB("kidsGame");
            $connection = $dbHandler->getDataBase();

            $username = $_POST['username'];

            //var_dump("Select count(*) from kidsgame.player where userName = '".$username."'"); 
        
            

            $result = $connection->query("Select count(*) from player where userName = '".$username."'");
            //exit();
            $each_row = $result->fetch_array(MYSQLI_ASSOC);

            if ($each_row['count(*)'] == 1) {
                unset($_POST['send']);
                ?> <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=register.php?userexist=true"> <?php
            }

            else {
            $fName = $_POST['fName'];
            $lName = $_POST['lName'];
            date_default_timezone_set('America/Toronto');
            $registrationTime = date("Y-m-d h:i:sa");

            $value = $connection->query("INSERT INTO player(fName, lName, userName, registrationTime, password)
            VALUES('".$fName."', '".$lName."', '".$username."', '".$registrationTime."', '".$passwordEncrypted."')");

            ?> <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=login.php?usercreated=true"> <?php
            }
        } }?>
    </body>
</html>