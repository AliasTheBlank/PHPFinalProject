<?php 

function DisplayHeader(string $message) {
    
    echo <<< _END
    
    <head>
        <title>$message</title>
    </head>

    <div>
        <h1>$message</h1>
    </div>
    <hr>
    _END;
}

?>