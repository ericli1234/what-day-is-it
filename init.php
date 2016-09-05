<?php
    ############################################################################
    # connect to mysql server
    ############################################################################
    include 'config.php';
    
    ############################################################################
    # global variables // MIGRATE TO CONFIG.PHP
    ############################################################################
    $YEAR = 2016;
    $TIMEZONE = 'America/Toronto';
    $FIRSTDAYOFSCHOOL = strtotime("6 September ".$year. ' '. $TIMEZONE);
    $FIRSTDAYOFSCHOOL = date("z", $FIRSTDAYOFSCHOOL) + 1;
    $PADAYS = array("foo" => "bar");
    $HOLIDAYS = array("foo" => "bar");
    $FIRST = 1;
    $COUNTER = 1;
    
    ############################################################################
    # declaration of queries -- all queries here
    ############################################################################
    $createDB = "CREATE DATABASE day";
    $createDayTable = "CREATE TABLE day.".$YEAR."(
                        id int PRIMARY KEY,
                        type varchar(255),
                        event varchar(255)
                        )";
    $createCounterTable = "CREATE TABLE day.counter(
                        id int PRIMARY KEY,
                        hits int
                        )";
    
    ############################################################################
    # execution of queries
    ############################################################################
    if ($mysqli->query($createDB)) {
        echo "Database created successfully.\n";
    } else {
        echo "Error creating database: " . $mysqli->error;
    }
    if ($mysqli->query($createDayTable)) {
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
    # initialize tables
    ############################################################################
    for ($i = 1; $i <= 365; $i++) {
        if ($mysqli->query("INSERT INTO day.".$YEAR."(id) VALUES ($i)")) {
            printf("Insert ".$i." complete.\n");
        } else {
            echo "Error inserting element: " . $mysqli->error;
        }
    }
    
    if ($mysqli->query("INSERT INTO day.counter (id, hits) VALUES (0, 0)")) {
            printf("Insert hit counter complete.\n");
        } else {
            echo "Error inserting counter: " . $mysqli->error;
        }
    
    ############################################################################
    # update tables
    ############################################################################
    
    if ($mysqli->query("UPDATE day.".$YEAR." SET type='Day ".$FIRST."' WHERE id=".$FIRSTDAYOFSCHOOL)) {
            printf("Update first day of school complete.\n");
        } else {
            echo "Error updating element: " . $mysqli->error;
    }
    
    for ($i = $FIRSTDAYOFSCHOOL + 1; $i <= 365; $i++) {
        if ((($i - 4)% 7) + 1 == 6) {
            if ($mysqli->query("UPDATE day.".$YEAR." SET type='Saturday' WHERE id=".$i)) {
                printf("Update ".$i." complete.\n");
            } else {
                echo "Error updating element: " . $mysqli->error;
            }
        }
        
        else if ((($i - 4)% 7) + 1 == 7) {
            if ($mysqli->query("UPDATE day.".$YEAR." SET type='Sunday' WHERE id=".$i)) {
                printf("Update ".$i." complete.\n");
            } else {
                echo "Error updating element: " . $mysqli->error;
            }
        }
        else {
            if ($mysqli->query("UPDATE day.".$YEAR." SET type='Day ".$COUNTER++."' WHERE id=".$i)) {
                printf("Update ".$i." complete.\n");
            } else {
                echo "Error updating element: " . $mysqli->error;
            }
        }
        $COUNTER = ($COUNTER % 4);
        if ($COUNTER == 0) { $COUNTER = 4; }
    }
    
    ############################################################################
    # close connection to database
    ############################################################################
    mysqli_close($mysqli);
?>