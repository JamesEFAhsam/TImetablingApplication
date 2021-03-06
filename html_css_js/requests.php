<?php 
include 'login_test.php';
?>

<html>
	<head>
		<title>Requests Page</title>
		<link rel="stylesheet" href="stylesheet.css" type="text/css"/>
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
	</head>

	<body>

	<div class = "tableStart">
	<div class = "tableBody">
	<div class = "tableTitle">
		<h1>SMARTROTA</h1>
	</div>
	<div>
		<div class = "menuList">
			<form action="" >
			<a href="home.php" class = "menuButton" value = "rota">Rota</a>
				<a href="requests.php" class = "presentButton" value = "request">Requests</a>
				<a href="pref.php" class = "menuButton" value = "preference">Preferences</a>
				<a href="ratings.php" class = "menuButton" value = "rating">Ratings</a>
			</form>
		</div>
	</div>
	<div class = "tableRow2">
		<div class = "inputSection">
			<h2> Holiday Request: </h2>
				<form action="requests_submit.php" method="post">
				<fieldset>
					<h3>Start Date:</h3>
					<input type="date" name="startDate"><br><br>
					<h3>End Date:</h3>
					<input type="date" name="endDate"><br><br>
					<!--<input id="submitHReq" type="submit" class = "menuButton" value="Submit Holiday Request">-->
				<br><br>
					<h2>Cover Request:</h2>
					<h3>Cover Date:</h3>
					<input type="date" name="coverDate"><br><br>
					<h3>Shift Chosen:</h3>
					<select name="coverTime">
						<option value ="">Select a Value</option>
						<option value="9am-4pm">9am-4pm</option>
						<option value="4pm-11pm">4pm-11pm</option>
					</select>
					<br><br>
					<input type="submit" id="submitHol" class ="signUp" name="submitHol" value="Submit Request" />
					<!--<input id="submitReq" type="submit" class="menuButton" value="Submit Cover Request">-->
				</fieldset>
				</form>
			</div>
	</div>
	<div class = "tableRow3">
		<div class = "submitSection">
		    <form>
		        <br>
                <button id="logOut" class="logOutButton" value="Log Out">Log Out</button>
                <br>
            </form>
		</div>
	</div>
	<div class = "tableRow4">
		<div class = "tableEnd">
			<h5>SMARTROTA</h5>
		</div>
	</div>
	</div>
	</div>
<script  src="main.js"></script>
	</body>
</html>
