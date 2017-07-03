<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>iProject</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<style>
		
		#makePrediction {
			display: block;
			margin: 0 auto;
			background-color: #ffffff;
			padding: 20px;
			width: 60%;
			margin-top: 60px;
		}
		
		#makePrediction input[type=submit] {
			border: 2px solid transparent;
			border-radius: 5px;
			width: 80%;
			margin: 0 auto;
			margin-top: 20px;
			display: block;
		}
		
		textarea {
			display: block;
			margin: 0 auto;
			border: 1px solid black;
			margin-top: 20px;	
			padding: 10px;
			
		}
		
</style>
	<?php 
		include 'header.php';
		if ($_SESSION){
		if ($_SESSION['username']){
		$league = $_GET['league'];
		$match = $_POST['match'];
		echo"<div id='makePrediction'><p style='text-align: center;'>".$league."<br><br>". $match . "</p><br>";
		?>
		<form method="POST" action="post_prediction.php?league=<?php echo $league."&match=".$match; ?>">
			<p style="text-align: center;"><b>Prediction: </b></p>
		<textarea autofocus name="prediction">

		</textarea><br><br>
			<p style="text-align: center;"><b>Description: </b></p>
		<textarea name="description">
		</textarea>
			<br>
			<input type="submit" value="Make prediction!"></div>
	</form>
	<?php
	}
}
	else {
		echo " <script> location.replace('index.php'); </script>";
	}
	
	