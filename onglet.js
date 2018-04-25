

function onglet(){

document.getElementById("div1").className= "onglet_y onglet"; 


}

function changeclass(i){

document.getElementById(i).className= "onglet_y onglet"; 


var a = 0;

var b = 3;

while(a < b){
a++;

var e = "div"+a;

document.getElementById(e).className= "onglet_n onglet"; 

}

if(a == b){

document.getElementById(i).className= "onglet_y onglet"; 

}

}


