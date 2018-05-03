<html>
	<head>
		<title>Manager Sign Up</title>
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
			<h2>Manager Sign Up</h2>
			<form id="manager_signup" action="manager_signup_submit.php" method="post">
			<fieldset>	
				<label for="manager_first_name_name"> Manager First Name: </label>
				<br>
				<input type="text" id="manager_first_name" name="manager_first_name" value="" maxlength="20"/>
				<br><br>			
				<label for="manager_last_name"> Manager Last Name: </label>
				<br>
				<input type="text" id="manager_last_name" name="manager_last_name" value="" maxlength="20"/>
				<br><br>
				<label for="manager_username"> Manager Username: </label>
				<br>
				<input type="text" id="manager_username" name="manager_username" value="" maxlength="20"/>
				<br><br>
				<label for="manager_password"> Manager Password: </label>
				<br>
				<input type="password" id="manager_password" name="manager_password" value="" maxlength="20"/>
				<br><br>
				<label for="contracted_hours"> Contracted hours: </label>
				<br>
				<input type="number" id="manager_contracted_hours" name="manager_contracted_hours" value="" min="0" max="100"/>
				<br><br>
				<select id="manager_rank" name="manager_rank" form="manager_signup">
                  <option value="senior">Senior</option>
                  <option value="junior">Junior</option>
                </select>
                <br><br>
				<input type="submit" id="submit2" name="submit2" value="&rarr; ManagerSignup" />
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
