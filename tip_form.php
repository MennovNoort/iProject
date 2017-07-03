
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>iProject</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<style>
		
		#chooseLeague {
			display: block;
			margin: 0 auto;
			background-color: #ffffff;
			padding: 20px;
			width: 60%;
			margin-top: 60px;
		}
		
		#chooseLeague input[type=submit] {
			border: 2px solid transparent;
			border-radius: 5px;
			width: 80%;
			margin: 0 auto;
			margin-top: 20px;
			display: block;
		}
		
		select {
			display: block;
			margin: 0 auto;
			border: 1px solid black;
			margin-top: 20px;	
			
		}
		
	</style>
</head>
<?php

	include 'header.php';
	if ($_SESSION){
		if ($_SESSION['username']){
	
?>
	<div id="chooseLeague">
		<form method="POST" action="choose_game.php">
			<p style="text-align: center;">Choose league:</p>
			<select name="league">
				<option value="Eredivisie">Eredivisie</option>
				<option value="Premier League">Premier League</option>
				<option value="Ligue 1">Ligue 1</option>
				<option value="Bundesliga">Bundesliga</option>
				<option value="Primera Division">Primera Division</option>
				<option value="Calcio A">Calcio A</option>
			</select><br>
			<input type="submit" value="Next step"> 
		</form>
	</div>
<?php
	}
}
	else {
		echo " <script> location.replace('index.php'); </script>";
	}