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
</script>
