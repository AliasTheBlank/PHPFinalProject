<!DOCTYPE html>
<html>
    <head><title>Final Project</title></head>

    <body>
        <h1>Welcome to our php final project</h1>
        <hr>

        <?php 
        
        $usercreated = false;
        if (isset($_GET['usercreated'])) {
            $usercreated = $_GET['usercreated'];
        }

        if (!isset($_POST['send'])) {

            if ($usercreated) {
            ?>  <h1>User created</h1> <?php
        }
        ?>
        <form action="main.php" method="post">
            <label>
                <p>Username:</p>
                <input type="text" required="require" name="username">
            </label>

            <label >
                <p>Password:</p>
                <input type="text" name="password" required="require">
            </label>

            <input type="submit" value="Register" name="send">
        </form>
        
        <a href="./register.php">Don't have an account? Sing up!</a>

        <?php } else {} ?>
    </body>
</html>