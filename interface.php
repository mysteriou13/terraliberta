
<?php


if(!isset($_SESSION['pseudo'])){

header("Location:index.php");


}

include_once("./install/installcons.php");

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

<script src="PdcFenetre.js" language="javascript"> </script>

<script>
 
   function test(){		
		pdc = document.createElement("div");
<?php               

 if($pos !== false){


$f3 = ",";

while($p7 <= $p8-1){

$p7++;

$p5 = $p2[$p7];

$p6 = explode("=",$p5);

$f2 = '"'.$p6[1].'"';

$titre = $p6[0];

$titre2 = $p6[1];

$select = "SELECT * FROM url  WHERE url = '$titre2'";
$select1 = $mysqli->query($select);

$select2 = $select1->fetch_assoc();

$select3 = $select2['name'];

$f = 'CreerPdcFenetre( "'.$titre.'"'.', 500, 250, 200, 150, pdc,'.$f2.$f3.$p7.','.$p8.",'$select3');";
echo $f;

}

}

?>

}

var pad = "https://etherpad.vecchionet.com";

var calc = "https://ethercalc.vecchionet.com";

var url = pad;

function  newurl(url){

var c = 0;

c = <?php echo $p3-1;?>;

var c1 = <?php echo $b;?>

dc(c,c1,url);

}

 function affiche(){

var r = document.getElementById("reduire");

if(document.getElementById("parametre").style.display == "flex"){

document.getElementById("parametre").style.display = "none";

r.innerHTML = "-";

}else{

r.innerHTML = "+";
  document.getElementById("parametre").style.display = "flex";
}




}

function Dis(id){

var div = document.getElementById(id);

var b = document.getElementById("bfile");

if(div.style.display == "flex"){

div.style.display = "none";

b.innerHTML = "-";

}else{

b.innerHTML = "+";

div.style.display = "flex";


}


}

</script>

</head>

<?php

$select = "SELECT * FROM url WHERE pseudo = '$pseudo'";

$select1 = $mysqli->query($select);

$select2 = $select1->fetch_assoc();

$select3 = $select2['name'];


?>

  
<div style = " border-radius:20px; 20px;">


<div id = "file" style = "margin-bottom:2%;  display:flex; flex-direction:column; justify-direction:space-around; border-radius: 20px 20px; font-size:2em;">

<div style  = "display:flex; justify-content:space-between ">

<div>

<div style = "background-color:DarkBlue;  border-radius:20px; 20px; border:5px solid white; border-radius:20px 20px;">
	
<form  action = "<?php $_SERVER['PHP_SELF'];?>" method = "post">

<div style = "color:white; ">

<center>
créer un   fichier text colaboratif
</center>

</div>

<div style  = "color:white">
<center>

 nom du fichier text  <input type = "text" name = "idpad">

</center>

</div>

<center>
 <input type =  "submit" value = "cr&eacute;er un pad">
</center>

<?php 



if(isset($_POST['idpad']) && !empty($_POST['idpad'])){

$pad = $_POST['idpad']; 

 $b = "SELECT COUNT(*)name FROM url WHERE name= '$pad'";

$b1 = $mysqli->query($b);

$b2  = $b1->fetch_assoc();

$b3 = $b2['name'];

if($b3 == 0){
echo "</br>b3 </br>";


echo $c =$_POST['idpad'].$_SESSION['pseudo'].$b3; 

echo "<script>";

echo "var titre ='$c';";

echo "var i = pad+/p/+titre;";

echo "newurl(i)";

echo "</script>";

}else{

echo "<span style = 'color:white'>".$_POST['idpad']." exsite d&eacute;j&agrave;"."</span></br>";

}
}

?>
</form>

</div>

</div>

<div>
<div style = "background-color:DarkBlue; border:5px solid white; border-radius:20px 20px;">

<form action = "<?php $_SERVER['PHP_SELF']?>" method = "post">

<div style = "color:white;">
<center>
cr&eacute;er un tableur
</center>
</div>

<div style = "color:white;">
<center>
 nom du tableur  <input type = "text" name = "idcalc">
</div>
</center>

<div>
<center>
<input type = "submit" value = "cr&eacute;er un tableur"> 
</center>
</div>

</div>
</div>

<?php 

if(isset($_POST['idcalc']) && !empty($_POST['idcalc'])){

$pad = $_POST['idcalc'];

 $b = "SELECT COUNT(*)name FROM url WHERE name= '$pad'";

$b1 = $mysqli->query($b);

$b2  = $b1->fetch_assoc();

$b3 = $b2['name'];


echo "</br>";

if($b3 == 0){
$c =$_POST['idcalc'].$_SESSION['pseudo'].$b3;

echo "<script>";

echo "var titre ='$c';";

echo "var i = calc+'/'+titre;";

echo "newurl(i)";

echo "</script>";

}else{

echo $_POST['idcalc']." exsite d&eacute;j&agrave;"."</br>";

}
}

?>


</form>

</div>
</div>
</div>
<?php 

 if(!empty($p9) ){
 while($p9 <= $p8-1){

$p9++;

$p5 = $p2[$p9];

$p6 = explode("=",$p5);

 $nburl2 = substr_count($url,"=");



if($nburl2 >= 1 && !empty($p6[1])){
$f2 = '"'.$p6[1].'"';

$titre = $p6[0];

$lien = $p6[1];
}

if(!empty($lien)){

$lien = $mysqli->real_escape_string($lien);

$url = "SELECT COUNT(*)url FROM url WHERE pseudo= '$pseudo' AND url = '$lien'";

$url1  = $mysqli->query($url);

$url2 = $url1->fetch_assoc();

}

if($nburl2 >= 1 && !empty($p6[1])){

$c =$p6[1];

}else{

$c = "x";

}

$l = array('https://etherpad.vecchionet.com/p/','https://ethercalc.vecchionet.com/');

$l1 =  count($l);

$nbl = -1;

if(!empty($lien)){
while($nbl < $l1-1){

$nbl++;

$l2 = $l[$nbl];

$l3 = substr_count($lien,$l2);

$l3."</br>";


$l4 = str_replace($l2,"",$lien);

$l5 = str_replace($pseudo,"",$l4);

$l6  = str_replace($_SESSION['pseudo'],"",$l5);

$l6  = str_replace(0,"",$l6);

$l6  = str_replace("https://etherpad.vecchionet.com/p/","",$l6);


}
}

if(isset($url2)){
if($url2['url'] == 0 ){

$nblien = substr_count($lien, 'etherpad'); 

$nblien1 = substr_count($lien, 'ethercalc');


if($nblien == 1){

$type = "pad";

}


if($nblien1 == 1){

$type = "calc";

}

$type = $mysqli->real_escape_string($type);


$i = 'INSERT INTO url VALUES(NULL, "'.$pseudo.'", "'.$lien.'", "'.$l6.'","'.$type.'")';

$mysqli->query($i);

}

}
}
}
?>

<div style = "display:flex;">

<div>
<?php 
include("./membre/menu.php");
?>
 </div>

<div>
<?php 

 if(!empty($_GET)){
include("onglet.php");

}

?>
</div>

</div>
