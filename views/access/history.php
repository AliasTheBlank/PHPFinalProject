<?php require_once("../../Classes/Db.php"); ?>
<!DOCTYPE html>
<html>
    <head>
    <style>
        table, th, td {
        border:1px solid black;
        }
    </style>
        <title>Final Project</title>
    </head>

    <body>
        <?php
        $dbHandler = DataBaseHandler::Connection();
        $dbHandler->OpenConnection();
        $dbHandler->connectToDB("kidsGame");
        $connection = $dbHandler->getDataBase();

        $result = $connection->query("Select * from history");

        ?>
        <a href="./login.php">Go back to login</a>

        <table>
            <tr>
                <th>Time</th>
                <th>id</th>
                <th>Name</th>
                <th>Last Name</th>
                <th>Result</th>
                <th>Lives Used</th>
            </tr>

            <?php while($row = $result->fetch_assoc()) { ?>
            
                <tr>
                    <td><?=$row["scoreTime"]?></td>
                    <td><?=$row["id"]?></td>
                    <td><?=$row["fName"]?></td>
                    <td><?=$row["lName"]?></td>
                    <td><?=$row["result"]?></td>
                    <td><?=$row["livesUsed"]?></td>
                </tr>
            <?php }?>
        </table>

    </body>
</html>