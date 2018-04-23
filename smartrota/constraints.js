/*

How to do this;
1.
2.
3.

Structure;
Nodes :- Are slots?


Print the array of nodes
*/

var weekday = [
  "MON",
  "TUE",
  "WED",
  "THU",
  "FRI",
  "SAT",
  "SUN"
];

/*

Constraint types and data;
  0 - Rank
  1 - Hours
  2 - Days Off
*/

var people =
[
  new person("BOB", [new constraint(0, 1), new constraint(1, 12)]),
  new person("ADRIAN", [new constraint(0, 1), new constraint(1, 24)]),
  new person("JOHN", [new constraint(0, 0), new constraint(1, 8)]),
  new person("ALEX", [new constraint(0, 0), new constraint(1, 12)]),
  new person("FRED", [new constraint(0, 0), new constraint(1, 18)]),
  new person("LEWIS", [new constraint(0, 0), new constraint(1, 16)]),
  new person("AMBER", [new constraint(0, 0), new constraint(1, 24)]),
  new person("EMMA", [new constraint(0, 0), new constraint(1, 16)]),
  new person("JOANNE", [new constraint(0, 0), new constraint(1, 12)]),
  new person("OLIVER", [new constraint(0, 0), new constraint(1, 20)])
];

var shiftdata = 4;

var beforeTime = new Date().getTime();

var timetable = new table(weekday, multiplyPeople(people), shiftdata);

printTable(timetable);

function multiplyPeople(people){
  var nPeople = [];
  for (var i = 0; i < people.length; i++) {
    var hours = people[i].getConstraint(1);
    if(hours != false){
      for (var d = 0; d < hours.data; d++) {
        nPeople.push(people[i]);
      }
    }
  }
  return nPeople;
}

function person(name, constraints){
  this.constraints = constraints;
  this.name = name;

  this.getConstraint = function(id){
    for (var i = 0; i < this.constraints.length; i++) {
      if(this.constraints[i].id == id){
        return this.constraints[i];
      }
    }
    return false;
  }
}

function shift(day, time, assignment){
  this.day = day;
  this.time = time;

  this.assignment = assignment;

  this.full;

  this.isFull = function(){
    if(this.full){
      return true;
    }

    for (var i = 0; i < this.assignment.length; i++) {
      if(typeof this.assignment[i] == "number"){
        return false;
      }
    }
    return true;
  }
}

function table(weekday, people, shiftdata){

  this.shifts = [];

  for (var i = 0; i < weekday.length; i++) {
    for (var x = 0; x < shiftdata; x++) {
      this.shifts.push(new shift(weekday[i], x, [1,0,0,0,0]));
    }
  }

  this.shiftcopy = this.shifts;


  pout:
  while(people.length > 0){
    var chosenPerson = people[0];

    var override = true;
    for (var i = 0; i < this.shifts.length; i++) {
      if(!this.shifts[i].isFull){
        override = false;
      }
    }

    if(override){
      break pout;
    }

    console.log(chosenPerson);
    console.log(people);

    bshift:
    for (var s = 0; s < this.shifts.length; s++) {
        if(this.shifts[s].isFull){
          continue;
        }

        var rank = chosenPerson.getConstraint(0);

        if (rank != false) {
          if(this.shifts[s].assignment.includes(rank.data)){
            for (var i = 0; i < this.shifts[s].assignment.length; i++) {
              if(typeof this.shifts[s].assignment[i] != "number"){
                if(this.shifts[s].assignment[i].name == chosenPerson.name){
                  continue bshift;
                }
              }
            }

            var index = this.shifts[s].assignment.indexOf(rank.data);
            this.shifts[s].assignment[index] = chosenPerson;
            people.shift();
            break bshift;
          }
        }
    }
  }

}

function printTable(table){

  var nTable = document.createElement("TABLE");
  for (var i = 0; i < table.shifts.length; i++) {
    var nTR = document.createElement("TR");
    for (var b = 0; b < table.shifts[i].assignment.length; b++) {
      var nTD = document.createElement("TD");
      if(typeof table.shifts[i].assignment[b] == "number"){
        nTD.innerHTML = table.shifts[i].assignment[b];
      } else {
        nTD.innerHTML = table.shifts[i].assignment[b].name;
      }
      nTR.appendChild(nTD);
    }
    nTable.appendChild(nTR);
  }
  document.body.appendChild(nTable);
}

function constraint(id, data){
  this.id = id;
  this.data = data;
}



