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
			echo '<h1 id="date">' . date("l\, F j Y") . '</h1>'; 
			
			$month = date('n');
			$day = date('j');
			//Initialize the queries
			$typequery="SELECT type FROM day.2015 WHERE month='$month' AND day='$day'";
			$eventquery="SELECT event FROM day.2015 WHERE month='$month' AND day='$day'";

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
			
			// Close the connection
			mysqli_close($mysqli);

		?> 
	</body>
</html>