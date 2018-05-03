<?php 
include 'login_test.php';
?>

<html>

	<head>
		<title>Manager Ratings</title>
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
	<div class = "menuList">
		<form action="" >
		<a href="managerhome.php" class = "menuButton" value = "rota">Rota</a>
				<a href="managerrequests.php" class = "menuButton" value = "request">Requests</a>
				<a href="managerpref.php" class = "menuButton" value = "preference">Preferences</a>
				<a href="managerratings.php" class = "presentButton" value = "rating">Ratings</a>
			<br><br>
		</form>
	</div>
	<div class = "tableRow2">
		<div class = "inputSection">
				<h2>Rate Your Shifts:</h2>
				<h5> Please rate your shifts. 5 - being excellent and 1 - being poor </h5>
				<form action = "">
					<h3> 	MON: </h3>
							<select>
								<option value ="">Select a Value</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
					<br>
					<h3> TUES: </h3>
							<select>
								<option value ="">Select a Value</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
					<br>
					<h3> WEDS: </h3>
							<select>
								<option value ="">Select a Value</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
					<br>
					<h3> THURS: </h3>
							<select>
								<option value ="">Select a Value</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
					<br>
					<h3> FRI: </h3>
							<select>
								<option value ="">Select a Value</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
					<br>
					<h3> SAT: </h3>
							<select>
								<option value ="">Select a Value</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
					<br>
					<h3> SUN: </h3>
							<select>
								<option value ="">Select a Value</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
					<br><br>
					<button id="submitRatings" class ="menuButton" type= "submit" value = "submitRatings">Submit Ratings</button>
				</form>
		</div>
	</div>
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
