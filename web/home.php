<?php 
include 'login_test.php';
?>

<html>
	<head>
		<title>Home Page</title>
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
				<a href="home.html" class = "presentButton" value = "rota">Rota</a>
				<a href="requests.html" class = "menuButton" value = "request">Requests</a>
				<a href="pref.html" class = "menuButton" value = "preference">Preferences</a>
				<a href="ratings.html" class = "menuButton" value = "rating">Ratings</a>
			</form>
		</div>
	</div>
	<br>
	<div class = "tableRow2">
		<div class = "rotaSection">
			<table id="rotaTable">
			<tr>
				<th> STAFF </th>
				<th> MON </th>
				<th> TUES </th>
				<th> WEDS </th>
				<th> THURS </th>
				<th> FRI </th>
				<th> SAT </th>
				<th> SUN </th>
			</tr>
			<tr>
				<td> Florence Picciuto </td>
				<td> </td>
				<td> </td>
				<td> </td>
				<td> </td>
				<td> </td>
				<td> </td>
				<td> </td>
			</tr>
			<tr>
				<td> Edward Barker</td>
				<td> </td>
				<td> </td>
				<td> </td>
				<td> </td>
				<td> </td>
				<td> </td>
				<td> </td>
			</tr>
			<tr>
				<td> Gino Zambelli</td>
				<td> </td>
				<td> </td>
				<td> </td>
				<td> </td>
				<td> </td>
				<td> </td>
				<td> </td>
			</tr>
			<tr>
				<td> Xixuan Zhu</td>
				<td> </td>
				<td> </td>
				<td> </td>
				<td> </td>
				<td> </td>
				<td> </td>
				<td> </td>
			</tr>
			<tr>
				<td> Whizzy Long </td>
				<td> </td>
				<td> </td>
				<td> </td>
				<td> </td>
				<td> </td>
				<td> </td>
				<td> </td>
			</tr>
			<tr>
				<td> James Ahsam </td>
				<td> </td>
				<td> </td>
				<td> </td>
				<td> </td>
				<td> </td>
				<td> </td>
				<td> </td>
			</tr>
			</table>
		</div>
	</div>
	<div class = "commentSection">
		<div class = "comments">
			<br><br>
			<form action="">
				<h2>Manager's Comments:</h2>
				<textarea id="comments" type="" class="comments" value="Sales have been up this week!" readonly></textarea>
				<br><br>
			</form>
			<br><br>
		</div>
	</div>
	<div class = "tableRow4">
		<div class = "tableEnd">
			<h5>SmartRota</h5>
		</div>
	</div>
	</div>
	</div>
<script  src="main.js"></script>
	</body>
</html>