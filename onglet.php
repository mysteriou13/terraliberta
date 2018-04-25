<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Un syst&egrave;me d'onglet en html</title>
    <link type="text/css" rel="stylesheet" media="all" title="CSS" href="style.css" />

<script>

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


</script>

</head>

<div onload = "onglet()">

       <div class="onglets_html">
        <div class="onglets">
            <div onclick = "changeclass(this.id)"  id = "div1" class="onglet_n onglet">Quoi</div>
            <div  onclick = "changeclass(this.id)" id = "div2" class ="onglet_n onglet">Qui</div>
            <div onclick = "changeclass(this.id)"  id = "div3" class="onglet_n onglet"> Pourquoi</div>
        </div>
        <div class="contenu">
            <h1>Quoi?</h1>
            Un simple syst&egrave;me d'onglet utilisant les technologies:<br />
            <ul>
                <li>(X)html</li>
                <li>CSS</li>
            </ul>
        </div>
    </div>


 </div>


