
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

if($url2['url'] == 0){

$i = 'INSERT INTO url VALUES(NULL, "'.$pseudo.'", "'.$lien.'")';

$mysqli->query($i);

}

}

}   

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

c = <?php echo $p3-1;?>;

var c1 = <?php echo $b;?>

dc(c,c1,url);

}

</script>

</head>
 <body onload = "test()">

<div style = "display:flex">

<div>	
<button onclick = "newurl(pad)" value = "dd">cr&eacute;er un pad</button>
</div>

<div>
<button onclick = "newurl(calc)" value = "dd"> cr&eacute;er un tableur</button>
</div>

</div>

<div style = "display:flex;">
<?php 

include("./membre/menu.php");

if(!empty($_GET)){

include("onglet.php");


}
?>
</div>
</body>	
