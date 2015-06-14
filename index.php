<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>What Day Is It?</title>
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open%20Sans"/>
	</head>
	<body>
		<?php
			//Include the database configuration file
			include 'config.php';
			
			// Display current date
			echo '<h1 id="date">' . "Today is " . date("l\, F j Y") . '</h1>'; 
			
			$month = date('n');
			$day = date('j');
			//Initialize the queries
			$typequery="SELECT type FROM day.2015 WHERE month='$month' AND day='$day'";
			$eventquery="SELECT event FROM day.2015 WHERE month='$month' AND day='$day'";
			$idquery="SELECT id FROM day.2015 WHERE month='$month' AND day='$day'";

			if ($result=mysqli_query($mysqli,$typequery))
			{
				// Fetch the day type
				// This is a temporary fix
				while ($row=mysqli_fetch_row($result))
				{
					echo '<h1 id="day">' . $row[0] . '</h1>';
				}
				// Empty result
				mysqli_free_result($result);
				}

			if ($result=mysqli_query($mysqli,$eventquery))
			{
				// Fetch the events
				// Another temporary fix
				while ($row=mysqli_fetch_row($result))
				{
					echo '<h2 id="event">' . $row[0] . '</h2>';
				}
				// Empty result
				mysqli_free_result($result);
			}
			
			echo '<hr> <!-- Temporary Separator--> <br>';
			////////////////////////////////////////////////////////
			//Information on Tomorrow
			////////////////////////////////////////////////////////
			
			// Display tomorrow's date
			echo '<h1 id="date">' . "Tomorrow is " . date("l\, F j Y", time()+86400) . '</h1>'; 
			
			if ($result=mysqli_query($mysqli,$idquery))
			{
				// Fetch the day id of tomorrow
				// Another temporary fix (This is absolutely terrible)
				while ($row=mysqli_fetch_row($result))
				{
					$day_id = $row[0] + 1;
				}
				// Empty result
				mysqli_free_result($result);
			}
			
			// Initialize the queries for tomorrow based on the day id
			$newtypequery="SELECT type FROM day.2015 WHERE id='$day_id'";
			$neweventquery="SELECT event FROM day.2015 WHERE id='$day_id'";
			
			if ($result=mysqli_query($mysqli,$newtypequery))
			{
				// Fetch the day type
				// This is a temporary fix
				while ($row=mysqli_fetch_row($result))
				{
					echo '<h1 id="day">' . $row[0] . '</h1>';
				}
				// Empty result
				mysqli_free_result($result);
				}

			if ($result=mysqli_query($mysqli,$neweventquery))
			{
				// Fetch the events
				// Another temporary fix
				while ($row=mysqli_fetch_row($result))
				{
					echo '<h2 id="event">' . $row[0] . '</h2>';
				}
				// Empty result
				mysqli_free_result($result);
			}
			
			// Close the connection
			mysqli_close($mysqli);
		?> 
		<!--Temporary Counter-->
		<div align="center"><img src="http://simplehitcounter.com/hit.php?uid=1909861&f=0&b=16777215" border="0" height="18" width="83" alt="Hit Count"></div>
	</body>
</html>