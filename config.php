<?php
// Create connection
$mysqli = new mysqli('HOSTNAME', 'USERNAME', 'PASSWORD', 'day');

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?> 