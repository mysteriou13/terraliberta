<?php


if(!isset($_SESSION['pseudo'])){

header("Location:index.php");

}


include_once("../admin/connect.php");

include_once("./connect.php");

 $url = "$_SERVER[REQUEST_URI]";

 $nburl = substr_count($url,"?");

$p = explode("?",$url);

if($nburl == 1){

$p1 = $p[1];
 
}else{

$p1 = "x";

}

$p2 = explode('&',$p1);

$nburl1 = substr_count($url,"&"); 

$p3 = count($p2);

$p4 = $p3-1;

if($nburl1 >= 1){

$p2a = $p2[1];

}else{

$p2a = "x";

}
$p5 = $p2a;

$p6 = explode("=",$p5);

$p7 = 0;

$p8 = $p3-1;

$p9  = -1;

$p5 = $p2[$p7];

$p6 = explode("=",$p5);


$id = $p6[0];
$id1 =  $p6[$p7];

$titre = "pad".$id;

$findme   = '?';

$findme1 = '?';

$titre = "pad".$id;

$pos = strpos($url, $findme);

$pos1 = strpos($url, $findme1); 

$pseudo = $mysqli->real_escape_string($_SESSION['pseudo']);

$c = null;

$name = 0;

$id = 0;

$nbl = -1;

$type = null;

if ($pos === false) {

$b = 1;

} else {

$b = 2;

}

     
?>

<script>

function display(a){


var dis = document.getElementById(a);


if(dis.style.display == "none"){

dis.style.display = "block";

}else{
dis.style.display  = "none";

}

}

</script>

<?php 
include("test.php");
include("./js/newurl.php");
?>
<script>

var pad = "https://etherpad.vecchionet.com";

var calc = "https://ethercalc.vecchionet.com";

var url = pad;

</script>


<?php

$select = "SELECT * FROM url WHERE pseudo = '$pseudo'";

$select1 = $mysqli->query($select);

$select2 = $select1->fetch_assoc();

$select3 = $select2['name'];


?>

<div id = "titre" style = "font-size:1.5em;">
<center>

terraliberta
</strong>
</br>
 permet d’afficher sur une même page différents sites web ou outils collaboratifs en ligne.
</br>
Vous pouvez ainsi présenter, communiquer et travailler à plusieurs sur différents documents en même temps:
</center>

</div>
</br>

<ul  class = "cadre" style = "display:flex; flex-wrap:wrap;  justify-content:space-around; ">
<ol>
<ul>
<button id = "b" style = "color:white; font-size:1.5em;";  onclick ="display('Pad')">pad</button>
</ul>

<ul id = "Pad" style = "border:1px solid white; border-radius:25px 25px; background-color:darkblue; display:none">

<form style  = "font-size:1.5em;"  action = "<?php $_SERVER['PHP_SELF'];?>" method = "post">

<div style = "color:white;">

nouveau pad

</div>

<div style  = "color:white">

 nom du pad  <input type = "text" name = "idpad">
</br>
durée de vie du pad:
</br>

<div style = "display:flex">

<div id = "cadre">

<input  type = "radio" name = "pad" value = "7days">
7 jours
</div>

<div id = "cadre">
<input type = "radio" name = "pad" value = "1month">
1 mois
</div>

<div id = "cadre">
<input type = "radio" name = "pad" value = "3month">
3 mois
</div>

<div id = "cadre">
<input type = "radio" name = "pad" value = "6month">
6 mois
</div>

<div id = "cadre">
<input type = "radio" name = "pad" value  = "1year">
1 ans
</div>

</div>

</div>

 <input type =  "submit" value = "cr&eacute;er un pad">

</form>


</ul>


</ol>

<ol>

<ul>
<button id = "b" style = "font-size:1.5em;" onclick = "display('Calc')">calc</button>
</ul>

<ul id = "Calc" class = "calc" style = "display:none; ">

<form style = "font-size:1.5em;" action = "<?php $_SERVER['PHP_SELF']?>" method = "post">

<div style = "color:white;">
cr&eacute;er un tableur
</div>

<div style = "color:white;">

<div>
 nom du tableur  <input type = "text" name = "idcalc">
</br>
durée de vie du  tableur
</br>
</div>

 <div style = "display:flex;">

<div id = "cadre">
<input type = "radio" name = "calc" value = "7days">
7 jours
</div>

<div id = "cadre">
<input type = "radio" name = "calc" value = "1month">
1 mois
</div>

<div id = "cadre">
<input type = "radio" name = "calc" value = "3month">
3 mois
</div>

<div id = "cadre">
<input type = "radio" name = "calc" value = "6month">
6 mois
</div>

<div id = "cadre">
<input type = "radio" name = "calc" value  = "1year">
1 ans
</div>

</div>

<center>
<input type = "submit" value = "cr&eacute;er un tableur"> 
</center>

</form>


</ul>
</ol>

<ol>

<ul> 

<button id = "b" style = "font-size:1.5em;" onclick = "display('document')"> document </button>

</ul>
<ul id = "document" style = "display:none;">

<?php 
include("./membre/menu.php");
?>

</ul>

</ol>

</ul>

</div>

</div>
</div>
</div>
</div>
 </div>

<?php 


$pseudo = $mysqli->real_escape_string($_SESSION['pseudo']);

$name = null;

$lien = null;

$type = null;

$fin = null;

$nb = "SELECT COUNT(*)id  FROM url WHERE pseudo = '$pseudo'";

$nb1 = $mysqli->query($nb);

$nb2 = $nb1->fetch_assoc(); 

$nblien =  $nb2['id']+1;

$nblien = $pseudo.$nblien;

$nomlien = $nb2['id'];

$jour = $mysqli->real_escape_string(date("d"));

$mois = $mysqli->real_escape_string(date("m"));

$anner = $mysqli->real_escape_string(date("y"));


if(isset($_POST['pad']) && !empty($_POST['pad']) ){

$type =  $_POST['pad'];

$fin = date("dmy",strtotime($_POST['pad']));

$lien = "https://etherpad.vecchionet.com/p/".$nblien;

$name = $mysqli->real_escape_string($_POST['idpad']);


}

if(isset($_POST['calc']) && !empty($_POST['calc']) ){

$type = $_POST['calc'];

$fin = date("dmy",strtotime($_POST['pad']));


$lien = "https://ethercalc.vecchionet.com/".$nblien;

$name = $mysqli->real_escape_string($_POST['idcalc']);

}

$fin = $mysqli->real_escape_string($fin);

$lien = $mysqli->real_escape_string($lien);

$type =  $mysqli->real_escape_string($type);

$u = 'INSERT INTO url  VALUES(NULL,"'.$pseudo.'","'.$lien.'","'.$name.'","'.$type.'","'.$jour.'","'.$mois.'", "'.$anner.'","'.$fin.'")';



  if ($mysqli->query($u) === FALSE) {
    printf("error requete");
}


$verif = "SELECT COUNT(*)name FROM url WHERE pseudo = '.$pseudo.' && name = '.$name.'";

$verif1 = $mysqli->query($verif);

$verif2 = $verif1->fetch_assoc();


if( isset($_POST['pad']) && !empty($_POST['pad']) && isset($_POST['idpad']) && !empty($_POST['idpad']) or isset($_POST['calc']) && !empty($_POST['calc']) && isset($_POST['idcalc']) && !empty($_POST['idcalc']) ){

if($verif2['name'] == 0){

$mysqli->query($u);

}

}

?>

</br>
<div>
<?php 

if($p3 >=2){
include("onglet.php");

}

?>
</div>

</div>
