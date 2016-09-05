<?php
    ############################################################################
    # connect to mysql server
    ############################################################################
    include 'config.php';
    
    ############################################################################
    # GLOBAL variables
    ############################################################################
    $YEAR = 2016;
    
    ############################################################################
    # declaration of queries
    ############################################################################
    $createDB = "CREATE DATABASE day";
    $createDayTable = "CREATE TABLE day.".$YEAR."(
                        id int,
                        type varchar(255),
                        event varchar(255)
                        )";
    $createCounterTable = "CREATE TABLE day.counter(
                        id int,
                        hits int
                        )";
    
    ############################################################################
    # execution of queries
    ############################################################################
    if ($mysqli->query($createDB) === TRUE) {
        echo "Database created successfully. ";
    } else {
        echo "Error creating database: " . $mysqli->error;
    }
    if ($mysqli->query($createDayTable) === TRUE) {
        printf("Day Table successfully created.\n");
    } else {
        echo "Error creating table: " . $mysqli->error;
    }
    if ($mysqli->query($createCounterTable)) {
        printf("Counter Table successfully created.\n");
    } else {
        echo "Error creating table: " . $mysqli->error;
    }
    
    ############################################################################
    # close connection to database
    ############################################################################
    mysqli_close($mysqli);
?>