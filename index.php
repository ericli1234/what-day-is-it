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
		$date = 1;
		echo '<h1 id="date">' . date("F j Y") . '</h1>'; 
		echo '<h1 id="time">' . date("g:i A T") . '</h1>'; 
		echo '<h1 id="day">' . 'Day ' . $date . '</h1>'; 
		?> 
	</body>
</html>