<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>iProject</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<style>
		
		#chooseGame {
			display: block;
			margin: 0 auto;
			background-color: #ffffff;
			padding: 20px;
			width: 60%;
			margin-top: 60px;
		}
		
		#chooseGame input[type=submit] {
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
	
	<?php
		include 'header.php';
		if ($_SESSION){
		if ($_SESSION['username']){

		$league = $_POST['league'];
		echo "<div id='chooseGame'><p style='text-align: center;'>Choose a game (".$league.")</p><br>";
		$select_matches = "SELECT * FROM matches WHERE league = '$league'";
		$result_select = $connect->query($select_matches);
		?>
		<form method="post" action="make_prediction.php?league=<?php echo $league; ?>">
		<p style="text-align: center;">Choose match: </p>
		<select name="match">
			<?php 
				while($row = $result_select->fetch_assoc()){
					echo "<option value='". $row['home_team']. " - " .$row['away_team']."'>"
						. $row['home_team']." - " .$row['away_team']."</option>";
				}
			?>
    
			</select>
			<input type="submit" value="Next step"></div>
</form>
	<?php
	}
}
	else {
		echo " <script> location.replace('index.php'); </script>";
	}