<script>

function menu(pad,dis,id,c){

var p = document.getElementById(pad);

var d  = document.getElementById("d").innerHTML++;

var discalc = null;


if(id == "menupad"){

 document.getElementById(pad).style.display = "block";

 document.getElementById(c).style.display = "none";

 document.getElementById("menupad").className = "onglet_y onglet";

 document.getElementById("menucalc").className = "onglet_n onglet";  

}


if(id == "menucalc"){

 document.getElementById(pad).style.display = "none";

 document.getElementById(c).style.display = "block";

 document.getElementById("menucalc").className = "onglet_y onglet";

 document.getElementById("menupad").className = "onglet_n onglet";

}

}


</script>

