<?php
    // create connection
    $mysqli = new mysqli('localhost', 'root', 'root');
    
    // check connection
    if ($mysqli->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
?>
