<html>

<title> :: TEST PdcFenetre :: </title>		

<head>		
	
<?php 

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


$p5 = $p2[$p7];

$p6 = explode("=",$p5);

$id = $p6[0];

$id1 =  $p6[$p7-1];

$titre = "pad".$id;

$findme   = '?';

$findme1 = '&';

$titre = "pad".$id;

$pos = strpos($url, $findme);

$pos1 = strpos($url, $findme1); 

if($pos1 == false){

$p3 = $p3+1;

}

   

// Notez notre utilisation de ===.  == ne fonctionnerait pas comme attendu
// car la position de 'a' est la 0-ième (premier) caractère.
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

$f = 'CreerPdcFenetre( "'.$titre.'"'.', 500, 250, 200, 150, pdc,'.$f2.$f3.$p7.','.$p8.");";

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

c = <?php echo $p3;?>;

var c1 = <?php echo $b;?>

dc(c,c1,url);

}

</script>

</head>
	
<body onload = "test()">

<button onclick = "newurl(pad)" value = "dd">cr&eacute;er un pad</button>

</br>

<button onclick = "newurl(calc)" value = "dd"> cr&eacute;er un tableur</button>
		
</body>

<script>

</script>
<?php 
include("onglet.php");
?>
</html>
