<!DOCTYPE html>
<html>
	<head>
		<title>Manager Requests Page</title>
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
			<a href="managerhome.html" class = "menuButton" value = "rota">Rota</a>
				<a href="managerrequests.html" class = "presentButton" value = "request">Requests</a>
				<a href="managerpref.html" class = "menuButton" value = "preference">Preferences</a>
				<a href="managerratings.html" class = "menuButton" value = "rating">Ratings</a>
				<br><br>
			</form>
		</div>
	</div>
	<div class = "tableRow2">
		<div class = "rotaSection">
			<h2>Holiday Request:</h2>
					<table id="rotaTable">
					<tr>
							<th>Employee Name</th>
							<th>Start Date</th>
							<th>End Date</th>
							<th>Granted</th>
					</tr>
					<tr>
							<td>NAME</td>
							<td>DATE</td>
							<td>DATE</td>
							<td>Y/N</td>
					</tr>
					<tr>
						<td>NAME</td>
						<td>DATE</td>
						<td>DATE</td>
						<td>Y/N</td>
					</tr>
				</table>
				<br><br>
				<h2> Cover Request: </h2>
				<table id="rotaTable">
				<tr>
						<th>Employee Name</th>
						<th>Cover Date</th>
						<th>Shift</th>
						<th>Granted</th>
				</tr>
				<tr>
						<td>NAME</td>
						<td>DATE</td>
						<td>SHIFT</td>
						<td>Y/N</td>
				</tr>
				<tr>
					<td>NAME</td>
					<td>DATE</td>
					<td>SHIFT</td>
					<td>Y/N</td>
				</tr>
			</table>
				<br><br>
				<h2>Employee:</h2>
				<select name="employeeName">
					<option value ="">Select an Employee</option>
					<option value="edward">Edward Barker</option>
					<option value="james">James Ahsam</option>
					<option value="flo">Florence Picciuto</option>
					<option value="gino">Gino Zambelli</option>
					<option value="whizzy">Wanghao Long</option>
					<option value="richard">Xixuan Zhu</option>	
				</select>
				<br>
				<h3>
				<br>
				Employee:
				<br>
				Shift Selected:
				</h3>
				<br><br>
				<input id="grantRequest" type="submit" class="menuButton" value="Grant Request">
				</form>
			</div>
	</div>
	<div class = "tableRow3">
		<div class = "submitSection">
		<form>
			<br>
			<button class="logOutButton" value="Log Out">Log Out</button>
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
