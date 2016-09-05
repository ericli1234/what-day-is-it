<?php
    ############################################################################
    # connect to mysql server
    ############################################################################
    include 'config.php';
    
    ############################################################################
    # declaration of ids and queries
    ############################################################################
    $todayID = date('z') + 1;
    $tomorrowID = date('z') + 2;
    $todayTypeQuery = "SELECT type FROM day.2016 WHERE id = '$todayID'";
    $todayEventQuery = "SELECT event FROM day.2016 WHERE id = '$todayID'";
    $tomorrowTypeQuery = "SELECT type FROM day.2016 WHERE id = '$tomorrowID'";
    $tomorrowEventQuery = "SELECT event FROM day.2016 WHERE id = '$tomorrowID'";
    $counterQuery = "SELECT hits FROM day.counter WHERE id = 0";
    $counterUpdateQuery = "UPDATE day.counter SET hits = hits + 1 WHERE id = 0";
    
    ############################################################################
    # today
    ############################################################################
    $todayDate = date("l, F j, Y");
    $todayType = '';
    $todayEvent = '';
    
    // day type
    if ($result = mysqli_query($mysqli, $todayTypeQuery))
    {
        while ($row = mysqli_fetch_row($result))
        {
            if ($row[0] != "")
            {
                $todayType = $row[0];
            }
        }
        mysqli_free_result($result);
    }
    
    // event
    if ($result=mysqli_query($mysqli,$todayEventQuery))
    {
        while ($row = mysqli_fetch_row($result))
        {
            if ($row[0] != "")
            {
                $todayEvent = $row[0];
            }
        }
        mysqli_free_result($result);
    }
    
    ############################################################################
    # tomorrow
    ############################################################################
    $tomorrowDate = date("l\, F j, Y", time()+86400);
    $tomorrowType = '';
    $tomorrowEvent = '';
    
    // day type
    if ($result = mysqli_query($mysqli, $tomorrowTypeQuery))
    {
        while ($row = mysqli_fetch_row($result))
        {
            if ($row[0] != "")
            {
                $tomorrowType = $row[0];
            }
        }
        mysqli_free_result($result);
    }
    
    // event
    if ($result=mysqli_query($mysqli,$tomorrowEventQuery))
    {
        while ($row = mysqli_fetch_row($result))
        {
            if ($row[0] != "")
            {
                $tomorrowEvent = $row[0];
            }
        }
        mysqli_free_result($result);
    }
    
    ############################################################################
    # hit counter
    ############################################################################
    $hits = 0;
    if (mysqli_query($mysqli,$counterUpdateQuery))
    {
        if ($result=mysqli_query($mysqli,$counterQuery))
        {
            while ($row = mysqli_fetch_row($result))
            {
                $hits = $row[0]; 
            }
            mysqli_free_result($result);
        }   
    }
    
    ############################################################################
    # close connection to database
    ############################################################################
    mysqli_close($mysqli);
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>What Day Is It?</title>
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/style.css"/>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
        <link rel="apple-touch-icon" href="favicon.ico" type="image/x-icon"/>
    </head>
    <body class="center">
        <div>
            <h1 class="date">Today is <?php echo $todayDate; ?></h1>
            <p class="type"><?php echo $todayType; ?></p>
            <p class="event"><?php echo $todayEvent; ?></p>
        </div>
        <hr>
        <div>
            <h1 class="date">Tomorrow is <?php echo $tomorrowDate; ?></h1>
            <p class="type"><?php echo $tomorrowType; ?></p>
            <p class="event"><?php echo $tomorrowEvent; ?></p>
        </div>
        <hr>
        <h1 class="notice"><?php echo $hits; ?> hits</h1>
    </body>
</html>
