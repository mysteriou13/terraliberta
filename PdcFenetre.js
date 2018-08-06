function CreerPdcFenetre( titre, largeur, hauteur, posLeft, posTop, contenu,url,ID,nb,name){
		
	//On créer un objet "Div" correspondant à notre fenetre
	var fenetre = document.createElement("div");   
        var iframe  = document.createElement("iframe");
        var f1 =  document.getElementById("c");
        var f2 =  document.createElement("div");
        var f3 =  document.getElementById("f");
        var f4 = document.createElement("span");
        var f5 = document.createElement("button");
        var f6 = document.createElement("span");
        var f7 = document.createElement("div");
        var f8 = document.createElement("button");  
        var f9 = document.createElement("div");
        var f10 = document.createElement("button");

        var length = document.getElementById('f').childNodes.length;
        f4.innerHTML = name;
        f5.innerHTML = "x";
        f6.innerHTML = "&nbsp;&nbsp; &nbsp;";
        f7.innerHTML = "envoyer ce lien pour partage le document";
        f7.style.display = "none";
        f8.innerHTML = "copier le lien dans le press papier";
        f9.innerHTML = url;
        f10.innerHTML = "partager";
     
        if(length >=1){
         f3.src = url; 

            }
         f3.style.display = "block";
         f2.id = ID;
         f2.className = "onglet_n onglet";

       if(f2.id == nb){
          f2.className = "onglet_y onglet";
       }

        f2.addEventListener("click",function ()changeclasse(nb,f2,url,iframe,f3));
        f4.addEventListener("click",function ()changeclasse(nb,f2,url,iframe,f3));
        f5.addEventListener("click",function () supelemet(f2,f4,url,ID,nb)); 
        f8.addEventListener("click", function () myFunction(f3.src)); 
        f10.addEventListener("click", function () block(f7) );
        f1.appendChild(f2);
        f2.appendChild(f4);
        f2.appendChild(f6);
        f2.appendChild(f5);
        f2.appendChild(f10);
        f2.appendChild(f7);
        f7.appendChild(f9);
        f7.appendChild(f8);

}

function block (a){

if(a.style.display == "none"){

a.style.display = "block";

}else{

 a.style.display = "none";
}

}

function myFunction(i) {

  var copyText = document.createElement("input");
   copyText.type = "text";  
   copyText.value  = i;
   copyText.id = "t";

   document.body.appendChild(copyText);
   var copyText = document.getElementById("t");
  copyText.select();
  document.execCommand("Copy");
  document.body.removeChild(copyText);

}

function changeclasse(a,b,c,d,e){

var a1 = 0;

while(a1 !=  a){

a1++;


if(a1 == b.id){

document.getElementById(a1).className = "onglet_y onglet";

e.src =c;

}else{
  document.getElementById(a1).className = "onglet_n onglet";
}

}



}


function supelemet(a,b,c,d,e){

var chaine = document.URL;

var chaineASupprimer="test";

var u = null;

var u2 = document.URL;

if(e != 0){
if(d == 0){


var elt = chaine.split("?");

var d1 = elt[1];

var q = d+1;

   u2 = c+"&"+q+"=";

var elt1 = chaine.split("&");

var d2 = elt1[1]; 


var elt2 = d2.split("=");

var d3 = elt2[0];


u2 = "="+c+"&"+d3;

 chaine = chaine.replace(u2, "");

}
}

if(d == 0){
if(e == 0){
var elt = chaine.split("?");

 var d1 = elt[1];


   u2 = "?"+d1;

  chaine = chaine.replace(u2, "");
}

}else{


var elt = chaine.split("&"); 


var d1 = elt[d];


u2 = "&"+d1;

chaine = chaine.replace(u2, "");


}



a.remove();

document.location = chaine;

}


function dc(c,b,q){

if(b == 1){


document.location = document.URL+"?&"+c+"="+q; 

}

if(b == 2){

c = c+1

 document.location = document.URL+"&"+c+"="+q;

}



}


