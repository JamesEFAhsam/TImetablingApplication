<script>
    var shifts = {
        0: "moM",
        1: "moE",
        2: "tuM",
        3: "tuE",
        4: "weM",
        5: "weE",
        6: "thM",
        7: "thE",
        8: "frM",
        9: "frE",
        10: "saM",
        11: "saE",
        12: "suM",
        13: "suE"
    }
    var jsArr;
    var reqes = new XMLHttpRequest();
    reqes.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            jsArr = JSON.parse(this.responseText);
            for(var i=0; i<jsArr.length; i++){
                var people = "";
                jsArr[i].forEach(function(employee){
                    people += employee[0]+" "+employee[1]+"<br>";
                });
                document.getElementById(shifts[i]).innerHTML = people;
            }
        }
    }
    reqes.open("get","generateTimetable.php",true);
    reqes.send();
    
</script>
<html>
	<head>
		<title>Manager Home Page</title>
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
				<a href="managerhome.php" class = "presentButton" value = "rota">Rota</a>
				<a href="managerrequests.php" class = "menuButton" value = "request">Requests</a>
				<a href="managerpref.php" class = "menuButton" value = "preference">Preferences</a>
				<a href="managerratings.php" class = "menuButton" value = "rating">Ratings</a>
			</form>
		</div>
	</div>
	<br>
	<div class = "tableRow2">
		<div class = "rotaSection">
			<table id="rotaTable">
			<tr>
				<th> MON </th>
				<th> TUES </th>
				<th> WEDS </th>
				<th> THURS </th>
				<th> FRI </th>
				<th> SAT </th>
				<th> SUN </th>
			</tr>
			<tr>
				<td id ="moM"></td>
				<td id ="tuM"></td>
				<td id ="weM"></td>
				<td id ="thM"></td>
				<td id ="frM"></td>
				<td id ="saM"></td>
				<td id ="suM"></td>
			</tr>
			<tr>
				<td id ="moE"></td>
				<td id ="tuE"></td>
				<td id ="weE"></td>
				<td id ="thE"></td>
				<td id ="frE"></td>
				<td id ="saE"></td>
				<td id ="suE"></td>
			</tr>
			<tr>
		    </tr>
			</table>
		</div>
	</div>
	<div class = "commentSection">
		<div class = "comments">
			<br><br>
			<form action="" method="post">
				<h2>Manager's Comments:</h2>
				<input type="" id="comment" class="comments" value="Insert Comments here" name="managerComment">
				<br><br>
				<input type="submit" class="signUp" value="Comment" name="managerCommentSubmit">
				<br>
		        <button id="logOut" class="logOutButton" value="Log Out">Log Out</button>
			</form>
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
