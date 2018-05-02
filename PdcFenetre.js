function CreerPdcFenetre( titre, largeur, hauteur, posLeft, posTop, contenu,url,ID,nb){
		
	//On créer un objet "Div" correspondant à notre fenetre
	var fenetre = document.createElement("div");   
        var iframe  = document.createElement("iframe");
        var f1 =  document.getElementById("c");
        var f2 =  document.createElement("div");
        var f3 =  document.getElementById("f");
        var f4 = document.createElement("span");
        var f5 = document.createElement("button");
        var f6 = document.createElement("span");

        var length = document.getElementById('f').childNodes.length;
        f4.innerHTML = "test";
        f5.innerHTML = "x";
        f6.innerHTML = "&nbsp;&nbsp; &nbsp;";
        if(length >=1){
         f3.src = url; 

            }
         f3.style.display = "block";
         f2.id = ID;
         f2.className = "onglet_n onglet";

       if(f2.id == nb){
          f2.className = "onglet_y onglet";
       }

        f4.addEventListener("click",function ()changeclasse(nb,f2,url,iframe,f3));
        f5.addEventListener("click",function () supelemet(f2,f4,url,ID,nb));  
        f1.appendChild(f2);
        f2.appendChild(f4);
        f2.appendChild(f6);
        f2.appendChild(f5);

}


function changeclasse(a,b,c,d,e){

var a1 = -1;

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


if(d == 0){

u2 = "0="+c+"&";

  chaine = chaine.replace(u2, "");
  chaine = chaine.replace("1=", "0=");

if(e == 0){

  u2 = "?0="+c;
  chaine = chaine.replace(u2, "");

}

}else{

u2 = "&"+d+"="+c;

chaine = chaine.replace(u2, "");

}



a.remove();

document.location = chaine;

}


function dc(c,b,q){


if(b == 1){


document.location = document.URL+"?"+c+"="+q; 

}

if(b == 2){

c = c+1

 document.location = document.URL+"&"+c+"="+q;

}

}


