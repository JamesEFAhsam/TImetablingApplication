<?php 
include 'login_test.php';
?>

<html>
	<head>
		<title>Manager Preferences Page</title>
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
				<a class = "menuButton" href="managerhome.php" value = "rota">Rota</a>
				<a href="managerrequests.php" class = "menuButton" value = "request">Requests</a>
				<a href="managerpref.php" class = "presentButton" value = "preference">Preferences</a>
				<a href="managerratings.php" class = "menuButton" value = "rating">Ratings</a>
				<br><br>
			</form>
		</div>
	</div>
	<div class = "tableRow2">
		<div class = "mangInputSection">
		<h2> How many Senior Staff is desired on each shift?</h2>
			<form action="managerpref_submit.php" method="post">
					<select name="seniorNum">
							<option value ="">Select a Number</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
					</select>
					<br>
					<h2>How many junior staff is desired on each shift?</h2>
					<select name="juniorNum">
							<option value ="">Select a Number</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
					</select>
			</h2>
			<br>
			<h2> Days wanting to work: </h2>
							<h3>
							<input type="checkbox" name="MON" disabled>MON
							<input type="checkbox" name="TUES" disabled>TUES
							<input type="checkbox" name="WED" disabled>WED
							<input type="checkbox" name="THURS" disabled>THURS
							<input type="checkbox" name="FRI" disabled>FRI
							<input type="checkbox" name="SAT" disabled>SAT
							<input type="checkbox" name="SUN" disabled>SUN
							</h3>
				<h2> Shift Times </h2>
							<h3>
							<input type="checkbox" name="early" disabled>9AM-4PM
							<input type="checkbox" name="late" disabled>4PM-11PM
							</h3>
				<h2> Particular Day Off: </h2>
						<h3>
						<input type="radio" id="Monday" name="mday" value="Monday">
						<label for="Monday">Monday</label>
						
						<input type="radio" id="Tuesday" name="mday" value="Tuesday">
						<label for="Tuesday">Tuesday</label>
						
						<input type="radio" id="Wednesday" name="mday" value="Wednesday">
						<label for="Wednesday">Wednesday</label>
						
						<input type="radio" id="Thursday" name="mday" value="Thursday">
						<label for="Thursday">Thursday</label>
						
						<input type="radio" id="Friday" name="mday" value="Friday">
						<label for="Friday">Friday</label>
						
						<input type="radio" id="Saturday" name="mday" value="Saturday">
						<label for="Saturday">Saturday</label>
						
						<input type="radio" id="Sunday" name="mday" value="Sunday">
						<label for="Sunday">Sunday</label>
						</h3>
					<h2> Who would you like to work with? </h2>
					<select disabled>
						<option value ="">Select a Colleague</option>
						<option value="Ed">Ed</option>
						<option value="Flo">Flo</option>
						<option value="Richard">Richard</option>
						<option value="James">James</option>
						<option value="Gino">Gino</option>
						<option value="Whizzy">Whizzy</option>
					</select>
					<h2> Who would you not like to work with? </h2>
					<select disabled>
						<option value ="">Select a Colleague</option>
						<option value="Ed">Ed</option>
						<option value="Flo">Flo</option>
						<option value="Richard">Richard</option>
						<option value="James">James</option>
						<option value="Gino">Gino</option>
						<option value="Whizzy">Whizzy</option>
					</select>
					<br><br>
					<button id="submitPref" class = "menuButton" type= "submit" value = "Submit Preferences">Submit Preferences</button>
			</form>
		</div>
			    <form>
	        <br>
            <button id="logOut" class="logOutButton" value="Log Out">Log Out</button>
            <br>
        </form>
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
