<!DOCTYPE html>
<html>
  <head>
    <title>Retrieve person information</title>
    <script>
      function person(name, constraints){
        this.constraints = constraints;
        this.name = name;
        this.constraintRating = 0;

        this.getConstraint = function(id){
          for (var i = 0; i < this.constraints.length; i++) {
            if(this.constraints[i].id == id){
              return this.constraints[i];
            }
          }
          return false;
        }
      }

      function constraint(id, data){
        this.id = id;
        this.data = data;
      }
      
      function sortPerson(){
        var hoursPerShift = 7; // Retrive from website
        // Change the array name to whatever will store the person objects
        people.forEach(function(person){
        // Adding up constraints
          if(typeof person.getConstraint(2).data !== "undefined") person.constraintRating += person.getConstraint(2).data.length;
          person.constraintRating += (person.getConstraint(1).data)/10;
          person.constraintRating += person.getConstraint(0).data;
          // Duplicate that person into array based on how many shifts he takes
          var n = Math.ceil(person.getConstraint(1).data / hoursPerShift);
          for(var i = 0; i<n-1; i++) people.push(person);
        });
        // Sort people based on their constraint rating
        people.sort(function(a, b){return b.constraintRating-a.constraintRating});
      }
      
      function conflictChecker(){
        //var numOfRanks = 0;
        var managerNum = 0;
        var employeeNum = 0;
        var managerCheck = [0,0,0,0,0,0,0];
        var employeeCheck = [0,0,0,0,0,0,0];

        people.forEach(function(person){
            if(person.getConstraint(0).data == 1) {
                managerNum += 1;
                if(typeof person.getConstraint(2).data !== "undefined"){
                    for(var i=0; i<person.getConstraint(2).data.length; i++){
                        managerCheck[person.getConstraint(2).data[i]] += 1;
                    }
                }
            }else if(person.getConstraint(0).data == 0){
                employeeNum += 1;
                if(typeof person.getConstraint(2).data !== "undefined"){
                    for(var i=0; i<person.getConstraint(2).data.length; i++){
                        employeeCheck[person.getConstraint(2).data[i]] += 1;
                    }
                }
            }
        });

        managerCheck.forEach(function(day){
            if(day == managerNum) return false;
        });
        employeeCheck.forEach(function(day){
            if(day == employeeNum) return false;
        });
  
        // Similar check for working hours
        var totalHours = 98; // Decided by the client (We'll do 2 shifts per day, 7 hours per shift for now)
        var pplperShift = 2; // How many employees needed for one week
        var workHours = 0;
        people.forEach(function(person){
            if(person.getConstraint(0).data == 0) {
                console.log(person.getConstraint(1).data);
                workHours += person.getConstraint(1).data;
            }    
        });
        console.log(workHours);
        if(workHours/pplperShift < totalHours) return false;
        return true;
    }
      
      
      var days = {
        Monday: 0,
        Tuesday: 1,
        Wednesday: 2,
        Thursday: 3,
        Friday: 4,
        Saturday: 5,
        Sunday: 6
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
      reqes.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
          jsArr = JSON.parse(this.responseText);
          console.log(jsArr);
          jsArr.forEach(function(item){
            var guy =new person(item.name, [new constraint(0, ranks[item.rank]), new constraint(1, item.hours), new constraint(2, [days[item.dayoff]])]);
            people.push(guy);
          });
          if(conflictChecker() == true) sortPerson();
          else console.log("there is a conflict!");
          console.log(people);
        }
      }
      reqes.open("get","getPerson.php",true);
      reqes.send();

    </script>
  </body>
</html>
