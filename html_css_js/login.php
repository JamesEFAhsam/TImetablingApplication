<html>
	<head>
		<title>Login</title>
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
	<form action="login_submit.php" method="post">
	<fieldset>
		<div class = "tableCell2">
			<label for="username">Username:</label> 
			<input type="text" id="username" name="username" maxlength="20" />
		</div>
	<div class = "tableRow2">
		<div class = "tableCell3">
			<br>
			<label for="password">Password:</label> 
			<input type="password" id="password" name="password" maxlength="20" />
		</div>
	</div>
	<div class = "tableRow3">
		<div class = "tableCell4">
			<br>
			<input type="submit" id="login1" name="login1" value="&rarr; Login" />
		</div>
	</div>
	</div>
	</fieldset>
	</form>
	<div class = "tableRow4">
		<div class = "tableCell4">
			<br>
			<form action="" >
				<a href="signup.php" class = "signUp" >SignUp<a/>
				<a href="managersignup.php" class = "login">ManagerSignUp<a/>
			</form>
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