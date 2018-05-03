function conflictChecker(juniorNum){
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
  // var pplperShift = 2; How many employees needed for one week
  var workHours = 0;
  people.forEach(function(person){
      if(person.getConstraint(0).data == 0) {
          console.log(person.getConstraint(1).data);
          workHours += person.getConstraint(1).data;
      }
  });
  console.log(workHours);
  if(workHours/juniorNum < totalHours) return false;
  return true;
}