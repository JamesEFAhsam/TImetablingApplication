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
			<form action="signup_submit.php" method="post" id="signup_form">
			<fieldset>	
				<label for="first_name"> First Name: </label>
				<br>
				<input type="text" id="first_name" name="first_name" value="" maxlength="20"/>
				<br><br>			
				<label for="last_name"> Last Name: </label>
				<br>
				<input type="text" id="last_name" name="last_name" value="" maxlength="20"/>
				<br><br>
				<label for="username"> Username: </label>
				<br>
				<input type="text" id="username" name="username" value="" maxlength="20"/>
				<br><br>
				<label for="password"> Password: </label>
				<br>
				<input type="password" id="password" name="password" value="" maxlength="20"/>
				<br><br>
				<label for="contracted_hours"> Contracted hours: </label>
				<br>
				<input type="number" id="contracted_hours" name="contracted_hours" value="" min="0" max="100"/>
				<br><br>
				<label for="rank"> Rank: </label>
				<br>
				<select id="rank" name="rank" form="signup_form">
                  <option value="senior">Senior</option>
                  <option value="junior">Junior</option>
                </select>
                <br><br>
				<input type="submit" id="submit1" name="submit1" class="signUp"value="&rarr; Signup" />
				</fieldset>
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