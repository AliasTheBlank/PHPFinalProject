<!DOCTYPE html>
<html>
    <head><title>Final Project</title></head>

    <body>
        <h1>Welcome to out php final project</h1>
        <hr>

        <form action="main.php">
            <label>
                <p>Username:</p>
                <input type="text" required="require" name="username">
            </label>

            <label >
                <p>Password:</p>
                <input type="text" name="password" required="require">
            </label>

            <label>
                <p>Comfirm Password</p>
                <input type="text" name="confirmpassword" required="require">
            </label>

            <input type="submit" value="Register" name="send">
        </form>
        
        <a href="./login.php">Already have an account? Sing in!</a>
    </body>
</html>