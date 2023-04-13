<?php 

function DisplayHeader(string $message) {
    
    ?>
    
    <head>
        <title><?=$message?></title>
    </head>

    <div>
        <h1><?=$message?></h1>
        <a href="./access/singout.php">Sing Out</a>
    </div>
    <hr>

    <?php
}

?>