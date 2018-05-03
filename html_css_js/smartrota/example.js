
var vari = new n_class("0");
vari.nFunction();

function n_class(invar){
  this.localVariable = invar;

  this.nFunction = function(){
    console.log("a function");
  }
}

