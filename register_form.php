<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>iProject</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<style>
	
		* {
			margin: 0;
			padding: 0;
			font-family: 'Roboto', sans-serif;
		}

		body {
			background-color: #ecf0f1;
		}
			
		#registerForm input[type=text], select {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}
		
		#registerForm input[type=email], select {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}
		
		#registerForm input[type=password], select {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}

		#registerForm input[type=submit] {
			width: 100%;
			background-color: #4CAF50;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}

		#registerForm input[type=submit]:hover {
			background-color: #2ecc71;
		}

		#registerForm {
			display: block;
			margin: 0 auto;
			width: 250px;
			border-radius: 5px;
			padding: 20px;
			padding-top: 0;
		}
		
		a {
			text-decoration: none;
			color: black;
		}
		
	</style>
	
</head>
	
<body>

	<div id="registerForm">
		<form action="scripts/register.php" method="POST"><br><br><br>
			<label>Firstname</label>
			<input type="text" name="firstname"><br>
			<label>Lastname</label>
			<input type="text" name="lastname"><br>
			<label>Email</label>
			<input type="email" name="email"><br>
			<label>Username</label>
			<input type="text" name="username"><br>
			<label>Password</label>
			<input type="password" name="password"><br>
			<label>Re-Password</label>
			<input type="password" name="password2"><br>
			<br>
			<input type="submit" value="Register"><br><br>
			<a href="index.php">Already an account?</a>
		</form>
	</div>
		
	</body>