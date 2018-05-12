
<?php

include_once("../connect/connect.php");

$url = "$_SERVER[REQUEST_URI]";

$p = explode("?",$url);

$p1 = $p[1];

$p2 = explode('&',$p[1]);

$p3 = count($p2);

$p4 = $p3-1;

$p5 = $p2[1];

$p6 = explode("=",$p5);

$p7 = -1;

$p8 = $p3-1;

$p9  = -1;

$p5 = $p2[$p7];

$p6 = explode("=",$p5);

$id = $p6[0];

$id1 =  $p6[$p7-1];

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

var pad = "http://vecchionet.com:9001";

var calc = "http://vecchionet.com:8000";

var url = pad;

function  newurl(url){

var c = 0;

c = <?php echo $p3-1;?>;

var c1 = <?php echo $b;?>

dc(c,c1,url);

}

</script>

</head>
 <body onload = "test()">
<?php

$select = "SELECT * FROM url WHERE pseudo = '$pseudo'";

$select1 = $mysqli->query($select);

$select2 = $select1->fetch_assoc();

$select3 = $select2['name'];


?>
<div style = "display:flex; border:1px solid;  margin-bottom:2%;">

<div>	
<form  action = "<?php $_SERVER['PHP_SELF'];?>" method = "post">
 nom du pad  <input type = "text" name = "idpad">

</br>

<?php 



if(isset($_POST['idpad']) && !empty($_POST['idpad'])){

$pad = $_POST['idpad']; 

 $b = "SELECT COUNT(*)pseudo FROM url WHERE name= '$pad'";

$b1 = $mysqli->query($b);

$b2  = $b1->fetch_assoc();

$b3 = $b2['name'];

if($b3 == 0){
echo "</br>";


$c =$_POST['idpad'].$_SESSION['pseudo'].$b3; 

echo "<script>";

echo "var titre ='$c';";

echo "var i = pad+/p/+titre;";

echo "newurl(i)";

echo "</script>";

}else{

echo $_POST['idpad']." exsite d&eacute;j&agrave;"."</br>";

}
}

?>

 <input type =  "submit" value = "cr&eacute;er un pad">

</form>

</div>


<div style = "">

<form action = "<?php $_SERVER['PHP_SELF']?>" method = "post">
 nom du calc  <input type = "text" name = "idcalc">
</br>
<input type = "submit" value = "cr&eacute;er un tableur"> 

<?php 

if(isset($_POST['idcalc']) && !empty($_POST['idcalc'])){

$pad = $_POST['idcalc'];

 $b = "SELECT COUNT(*)pseudo FROM url WHERE name= '$pad'";

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
<?php 

if(!empty($_GET)){

 while($p9 <= $p8-1){

$p9++;

$p5 = $p2[$p9];

$p6 = explode("=",$p5);

$f2 = '"'.$p6[1].'"';

$titre = $p6[0];

$lien = $p6[1];

$lien = $mysqli->real_escape_string($lien);

$url = "SELECT COUNT(*)url FROM url WHERE pseudo= '$pseudo' AND url = '$lien'";

$url1  = $mysqli->query($url);

$url2 = $url1->fetch_assoc();

$c =$p6[1];

$l = array('http://vecchionet.com:9001/p/','http://vecchionet.com:8000/');

$l1 =  count($l);

while($nbl <= $l1){

$nbl++;

$l2 = $l[$nbl];

$l3 = substr_count($lien,$l2);


if($l3 == 1){

$l4 = str_replace($l2,"",$lien);

$l5 = str_replace($pseudo,"",$l4);

$l6  = str_replace($b3['pseudo'],"",$l5);

if($l2 == $l[0]){

$type = "pad";

}

if($l2 == $l[1]){

$type = "calc";

}

}


}

if($url2['url'] == 0){

$type = $mysqli->real_escape_string($type);

$i = 'INSERT INTO url VALUES(NULL, "'.$pseudo.'", "'.$lien.'", "'.$l6.'","'.$type.'")';

$mysqli->query($i);

}

}

}?>

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

</body>	
