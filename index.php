<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>iProject</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<style>
		
		html, body {
			max-width: 100%;
			overflow-x: hidden;
		}
	
		h1 {
			margin-left: 5%;
			font-size: 20px;
			font-weight: 100;
			color: #2b2b2b;
			margin-top: 5px;
			margin-bottom:5px;
		}
		
		
		table {
			display:inline-block; 
			width: 83%; 
			border-top:2px solid #e74c3c; 
			margin-left: 5%; 
			margin-top: 10px;
			background-color: #ffffff;
			padding: 15px;
			margin-right: 5%;
		}
	
		#banner { 
			width: 100%;
		    height: 405px;
			margin-top: 15%;
			margin-bottom: 15%;
			display: none;
		}
		
		.tableRecent a {
			text-decoration: none;
			color: #fed700;
		}
		
		.tableRecent a:hover {
			color: #e74c3c;
		}
		
		.tableBest {
			border-top: 2px solid #fed700; 
		}
		
		@media screen and (min-width: 600px) {
			table {
				width: 43%;
				display: inline-table;
				margin: 0;
				margin-left: 5%;
				margin-top: 10px;
			}
			
			#recentH1 {
				margin-top: 75px;
			}
			
		}
		
		@media screen and (min-width: 950px) {
			
			
			#banner {
				display: block;
			}
		}
	
		
	</style>
</head>
	
<body>
	<?php include 'header.php';?><br>
	
		<h1 id="recentH1"><i>Recent Tips</i></h1>
		
				<?php

					$select_bet = "SELECT * FROM bets ORDER BY date DESC LIMIT 4";
					$do_select = $connect->query($select_bet);    

					while($row = $do_select->fetch_assoc()){
						echo 
								"<table class='tableRecent'><tr><td>League: <b>".$row['league']."</b></tr></td>".
								"<tr><td>Game:<b> ".$row['teams']."</b></tr></td>".
								"<tr><td>Prediction:<b> ".$row['prediction']."</b></tr></td>".
								"<tr><td>Date:<b> ".$row['date']."</b></tr></td>".
								"<tr><td><a href='bet.php?bet=".$row['id']."'>More info</a></tr></td></table>";
							}
					?>
		
		
		<br><br><br><br><h1><i>Best tips</i></h1>
		<?php

					$select_bet = "SELECT * FROM bets ORDER BY date DESC LIMIT 4";
					$do_select = $connect->query($select_bet);    

					while($row = $do_select->fetch_assoc()){
						echo 
								"<table class='tableBest'><tr><td>League: <b>".$row['league']."</b></tr></td>".
								"<tr><td>Game:<b> ".$row['teams']."</b></tr></td>".
								"<tr><td>Prediction:<b> ".$row['prediction']."</b></tr></td>".
								"<tr><td>Date:<b> ".$row['date']."</b></tr></td>".
								"<tr><td><a href='bet.php?bet=".$row['id']."'>More info</a></tr></td></table>";
							}
					?>
	
		<img id="banner" alt="banner" src="images/banner.png">
	
	<?php include 'footer.php';?>
		
</body>