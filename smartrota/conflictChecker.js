function conflictChecker(){
  var numOfRanks = 0;
  var managerNum = 0;
  var employeeNum = 0;
  var managerCheck = [0,0,0,0,0,0,0];
  var employeeCheck = [0,0,0,0,0,0,0];

  people.forEach(function(person){
    if(person.getConstraint(0).data > numOfRanks) numOfRanks = person.getConstraint(0).data;
  });
  numOfRanks += 1;

  console.log(numOfRanks);

/*
     Iterating through the array, add up the number of managers and employees.
     And add up the days that they can't work.
     If there exists one day that all employees or managers can't work, return false.
*/
  people.forEach(function(person){
    if(person.getConstraint(0).data == 1) {
      managerNum += 1;
      if(typeof person.getConstraint(2).data !== "undefined"){
        for(var i=0; i<person.getConstraint(2).data.length; i++){
          managerCheck[person.getConstraint(2)[i]-1] += 1;
        }
      }
    }else if(person.getConstraint(0) == 0){
      employeeNum += 1;
      if(typeof person.getConstraint(2).data !== "undefined"){
        for(var i=0; i<person.getConstraint(2).length; i++){
          employeeCheck[person.getConstraint(2)[i]-1] += 1;
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
  var totalHours; // Decided by the client (We'll do 2 shifts per day, 7 hours per shift for now)
  var pplperShift; // How many employees needed for one week
  var workHours = 0;
  people.forEach(function(person){
    if(person.getConstraint(0).data == 0) workHours += person.getConstraint(1).data;
  });
  if(workHours/pplperShift < totalHours) return false;
}
