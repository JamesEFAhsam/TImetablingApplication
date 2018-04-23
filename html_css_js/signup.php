<?php

/*** begin our session ***/
session_start();

/*** set a form token ***/
$form_token = md5( uniqid('auth', true) );

/*** set the session form token ***/
$_SESSION['form_token'] = $form_token;
?>


<html>

	<head>
		<title>Sign Up</title>
		<link rel="stylesheet" href="stylesheet.css" type="text/css"/>
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
	</head>

	<body>

	<div class = "tableStart">
	<div class = "tableBody">
	<div class = "tableTitle">
	<div class = "tableCell">
		<h1>SMARTROTA</h1>
	</div>
	</div>
		<div class = "tableCell2">
			<h2>Sign Up</h2>
			<form action="adduser_submit.php" method="post">
			<fieldset>	
				<label for="first_name"> First Name: </label>
				<br>
				<input type="text" id="first_name" name="first_name" value="" maxlength="20">
				<br><br>			
				<label for="last_name"> Last Name: </label>
				<br>
				<input type="text" id="last_name" name="last_name" value="" maxlength="20">
				<br><br>
				<label for="username"> Username: </label>
				<br>
				<input type="text" id="username" name="username" value="" maxlength="20">
				<br><br>
				<label for="password"> Password: <label>
				<br>
				<input type="password" id="password" name="password" value="" maxlength="20">
				<input type="hidden" name="form_token" value="<?php echo $form_token; ?>" />
				<br><br>
				<input type="submit" value="&rarr; Signup" />
				</fieldset>
				<!--<a id="signUp" value ="Create Account" class = "signUp">Sign Up<a/> GINO THIS MAY NEED REPLACING-->
			</form>
		</div>
	</div>
	<div class = "tableRow3">
		<div class = "tableCell4">
			<br>
		</div>
	</div>
	<div class = "tableRow4">
		<div class = "tableEnd">
			<h5>Uni of Liv - Group Project</h5>
		</div>
	</div>
	</div>
	</div>
	<script  src="main.js"></script>
	</body>
</html>
