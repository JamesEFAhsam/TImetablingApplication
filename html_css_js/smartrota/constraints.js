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
  1,
  2,
  3,
  4,
  5,
  6,
  7
];

/*

Constraint types and data;
  0 - Rank
  1 - Hours
  2 - Days Off
*/

var people =
[
  new person(12, [new constraint(0, 1), new constraint(1, 12)]),
  new person(13, [new constraint(0, 1), new constraint(1, 24)]),
  new person(14, [new constraint(0, 0), new constraint(1, 8)]),
  new person(15, [new constraint(0, 0), new constraint(1, 12)]),
  new person(16, [new constraint(0, 0), new constraint(1, 18)]),
  new person(17, [new constraint(0, 0), new constraint(1, 16)]),
  new person(62, [new constraint(0, 0), new constraint(1, 24)]),
  new person(71, [new constraint(0, 0), new constraint(1, 16)]),
  new person(73, [new constraint(0, 0), new constraint(1, 12)]),
  new person(75, [new constraint(0, 0), new constraint(1, 20)])
];

var shiftdata = 2;

var beforeTime = new Date().getTime();

var timetable = new table(weekday, shuffle(multiplyPeople(people)), shiftdata);

//printTable(timetable);

document.body.innerHTML = JSON.stringify(timetable.getShifts());


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

function person(id, constraints){
  this.constraints = constraints;
  this.id = id;
  this.constraintRanking = 0;

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

  this.outed = false;

  this.shifts = [];

  for (var i = 0; i < weekday.length; i++) {
    for (var x = 0; x < shiftdata; x++) {
      this.shifts.push(new shift(weekday[i], x, [1, 0, 0, 0, 0]));
    }
  }

  this.shiftcopy = shuffle(this.shifts);
  this.finalshift = [];

  var a = 0;

  pout:
  while(people.length > 0 && a < 200){
    a++;
    var chosenPerson = people[0];

    if(this.shiftcopy.length <= 0){
        break pout;
    }

    console.log(chosenPerson);
    console.log(people);

    bshift:
    for (var s = 0; s < this.shiftcopy.length; s++) {
      var assigned = false;

        //console.log("Shift " + s + ": " + this.shifts[s].isFull());
        if(this.shiftcopy[s].isFull()){
          //console.log(this.shifts[s]);
          continue;
        }

        var rank = chosenPerson.getConstraint(0);

        if (rank != false) {
          if(this.shiftcopy[s].assignment.includes(rank.data)){
            for (var i = 0; i < this.shiftcopy[s].assignment.length; i++) {
              if(typeof this.shiftcopy[s].assignment[i] != "number"){
                if(this.shiftcopy[s].assignment[i].id == chosenPerson.id){
                  continue bshift;
                }
              }
            }


            var index = this.shiftcopy[s].assignment.indexOf(rank.data);
            this.shiftcopy[s].assignment[index] = chosenPerson;
            console.log("Assigned " + chosenPerson.id + ", will be removed.");
            people.shift();
            assigned = true;
            break bshift;
          }
        }
    }


    for (var i = 0; i < this.shiftcopy.length; i++) {
      if(this.shiftcopy[i].isFull()){
        this.finalshift.push(this.shiftcopy[i]);
        this.shiftcopy.splice(i, 1);
        console.log("Removing: ");
        console.log(this.shiftcopy);
      }
    }

    //i need to get it so that people can be removed from the algorithm
    console.log("Assigned " + assigned);
    if(!assigned){
      console.log("Not Assigned " + chosenPerson.id + ", will be removed.");
      people.shift();
    }
  }

  this.outshifts = [];

  this.getShifts = function(){
    if(this.outshifts.length <= 0){
      this.outshifts = sortShifts(this.finalshift);
    }
    this.outed = true;
    return this.outshifts;
  }
}

function printTable(table){

  var orderedShifts = table.getShifts();

  var nTable = document.createElement("TABLE");
  for (var i = 0; i < orderedShifts.length; i++) {
    var nTR = document.createElement("TR");
    var nTD = document.createElement("TD");
    nTD.innerHTML = orderedShifts[i].day + orderedShifts[i].time;
    nTR.appendChild(nTD);


    for (var b = 0; b < orderedShifts[i].assignment.length; b++) {
      var nTD = document.createElement("TD");
      if(typeof orderedShifts[i].assignment[b] == "number"){
        nTD.innerHTML = orderedShifts[i].assignment[b];
      } else {
        nTD.innerHTML = orderedShifts[i].assignment[b].id;
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

function shuffle(array) {
  var currentIndex = array.length, temporaryValue, randomIndex;

  // While there remain elements to shuffle...
  while (0 !== currentIndex) {

    // Pick a remaining element...
    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex -= 1;

    // And swap it with the current element.
    temporaryValue = array[currentIndex];
    array[currentIndex] = array[randomIndex];
    array[randomIndex] = temporaryValue;
  }

  return array;
}

function sortShifts(shifts){
  var newArray = [];
  var oldArray = shifts;
  for (var i = 0; i < weekday.length; i++) {
    for (var s = 0; s < shiftdata; s++) {
      found:
      for (var b = 0; b < oldArray.length; b++) {
        if(oldArray[b].day == weekday[i] && oldArray[b].time == s){
          newArray.push(oldArray[b]);
          oldArray.splice(b, 1);
          break found;
        }
      }
    }
  }
  return newArray;
}

