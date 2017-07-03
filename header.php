<?PHP
	session_start();
	include 'includes/db.php';
    include 'includes/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>iProject</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<style>
	
	html, body {
		max-width: 100%;
		overflow-x: hidden;
	}	
		
	* {
		margin: 0;
		padding: 0;
		font-family: 'Roboto', sans-serif;
	}

	body {
		background-color: #ecf0f1;
	}

	header {
		height: 140px;
		width: 100vw;
		background-color: #2ecc71;
	}

	#logo {
		max-width: 40%;
		min-width: 10%;
		margin-left: 5%;
		display: none;
		margin-top: -40px;
	}

	.topnav {
		background-color: transparent;
		overflow: hidden;
		margin-right: 2;
	}

	.topnav a {
		float: right;
		display: block;
		color: #ffffff;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
		font-size: 17px;
		transition: color .4s ease-out;
	}

	.topnav a:hover {
		background-color: transparent;
		color: #e74c3c;
	}

	.topnav .icon {
		display: none;
	}
		
	input[type=text] {
		width: 35%;
		padding: 12px 20px;
		margin: 8px 0;
		font-size: 15px;
		margin-left: 5%;
		box-sizing: border-box;
		border-radius: 5px;
		border: 1px solid transparent;
		color: #ffffff;
		background-color: #27ae60;
	}
		
	input[type=password] {
		width: 35%;
		font-size: 15px;
		padding: 12px 20px;
		margin: 8px 0;
		box-sizing: border-box;
		border-radius: 5px;
		border: 1px solid transparent;
		color: #ffffff;
		background-color: #27ae60;
	}
		
	input[type=submit] {
		width: 20%;
		font-size: 15px;
		padding: 12px 20px;
		margin: 8px 0;
		margin-left: -6px;
		box-sizing: border-box;
		border-radius: 5px;
		background-color: #e74c3c;
		border: 1px solid transparent;
		border-top-left-radius: 0;
		border-bottom-left-radius: 0;
		color: #ffffff;
	}
		
	#noAccount {
		float: right;
		margin-right: 5%;
		text-decoration: none;
		color: #ffffff;
	}
		
	#logOut {
		border-radius: 5px;
		padding: 6px 10px;
		float: right;
		margin-right: 5%;
		font-size: 15px;
		text-decoration: none;
		color: #ffffff;
		background-color: #27ae60;
		border: 1px solid transparent;
		margin-top: 20px;
	}
	#makeTip {
		border-radius: 5px;
		padding: 6px 10px;
		float: right;
		margin-right: 5%;
		font-size: 15px;
		text-decoration: none;
		color: #ffffff;
		background-color: #e74c3c;
		border: 1px solid transparent;
		margin-top: 20px;
	}
		
	@media screen and (min-width: 600px) {
		#logo{
			display: none;		}
	}

	@media screen and (min-width: 1000px) {
		
		#logo {
			display: inline-block;	
		}
		
		header {
			height: 135px;
		}
		
		.topnav {
			margin-right: 4.25%;
		}
		
		input[type=text] {
			width: 35%;
		}
		
		input[type=password] {
			width: 35%;
		}
		
		input[type=submit] {
			width: 20%;
		}
		
		#loginForm {
			float: right;
			width: 40%;
			margin-right: 3.3%;
		}
		
		#logOut {
			margin-top: -40px;
			margin-right: 5.4%;
		}
		
		#makeTip {
			margin-top: -40px;
			margin-right: 13.4%;
		}
	}
	
	</style>
</head>
	
<body>
	<header>
		 
		<div class="topnav" id="myTopnav">
		  <a href="contact.php">Contact</a>
		  <a href="about.php">About</a>
		  <a href="index.php">Home</a>	
		</div>
		
		<img id="logo" alt="Logo" src="images/logo.png">
		
		 <?php 

			

    		if ($_SESSION){
				if ($_SESSION['username']){
				echo "<p style='float:right; margin-right: 10%;'>Welcome, ".$_SESSION['username']."</p><br>";
				echo "<a id='logOut' href='scripts/logout.php'>Log out</a>
				      <a id='makeTip' href='tip_form.php'>Make tip</a>";
				}
			}
    
			else{
				?>
		
				<form id="loginForm" action="scripts/login.php" method="POST">
					  <label for="Username">
						<input type="text" name="username" placeholder="Username" required>
					  </label>
					  <label for="Password">
						<input type="password" name="password" placeholder="Password" required>
					  </label>
					
					<input type="submit" value="Log in"><br>
					<?php
					if (isset($_GET['fout'])){
						$fout = $_GET['fout'];
						switch ($fout){
						case "fout":
							echo "<h5 style='margin-left: 5%; display: inline-block;'>Username or Password is wrong!</h5>";
							break;
						default:
								echo"";
								break;
						}
							}
						else{}
					?>
					<a id="noAccount" href="register_form.php">No account?</a>
				</form>
		
			<?php
			}
    		
    		?>
		
		<script src="menu.js"></script>
	</header>