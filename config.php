<?php
    // create connection
    $mysqli = new mysqli('HOSTNAME', 'USERNAME', 'PASSWORD', 'day');
    
    // check connection
    if ($mysqli->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
?>
