<?php 

function DisplayHeader(string $message) {
    
    ?>
    
    <head>
        <title><?=$message?></title>
    </head>

    <div>
        <h1><?=$message?></h1>
    </div>
    <hr>

    <?php
}

?>