<link rel="stylesheet" href="../public/css/style.css">
<?php 

function DisplayHeader(string $message) {
    
    ?>
    
    <head>
        <title><?=$message?></title>
    </head>

    <div>
        <h1><?=$message?></h1>
        <h2><a href="../controllers/singout.php" style="right: 5px; top:20px ; position:absolute">Sing Out</a></h2>
       
    </div>
    <hr>

    <?php
}

?>