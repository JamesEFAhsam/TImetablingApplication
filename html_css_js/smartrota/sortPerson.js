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