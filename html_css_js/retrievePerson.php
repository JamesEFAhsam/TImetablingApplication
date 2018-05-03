<!DOCTYPE html>
<html>
  <head>
    <title>Retrieve person information</title>
    <script src="smartrota/constraints.js" type="text/javascript"></script>
    <script src="smartrota/sortPerson.js" type="text/javascript"></script>
    <script src="smartrota/conflictChecker.js" type="text/javascript"></script>
    <script src="smartrota/submit.js" type="text/javascript"></script>
    <script>



      var days = {
        Monday: 1,
        Tuesday: 2,
        Wednesday: 3,
        Thursday: 4,
        Friday: 5,
        Saturday: 6,
        Sunday: 7
      }
      var ranks = {
          junior: 0,
          senior: 1
      }
    </script>
  </head>
  <body>
    <script>
      var jsArr;
      var people = [];
      var reqes = new XMLHttpRequest();
      var numOfJunior = 2;
      reqes.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
          jsArr = JSON.parse(this.responseText);
          console.log(jsArr);
          jsArr.forEach(function(item){
            if(typeof item === 'object'){
              /*var guy =new person(item.name, [new constraint(0, ranks[item.rank]), new constraint(1, item.hours), new constraint(2, [days[item.dayoff]])]);
              people.push(guy);*/

              var guy =new person(item.name, [new constraint(0, ranks[item.rank]), new constraint(1, item.hours)]);
              people.push(guy);
            }else if(typeof item === 'number') numOfJunior = item;
          });
          console.log(numOfJunior);
          if(conflictChecker(numOfJunior) == true) sortPerson();
          else console.log("there is a conflict!");
          console.log(people);

          var timetable = new table(weekday, shuffle(multiplyPeople(people)), shiftdata); //creates the timetable
          sendTimetable(timetable); //sends the new timetable to the db
        }
      }
      reqes.open("get","getPerson.php",true);
      reqes.send();

    </script>
  </body>
</html>
