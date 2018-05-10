<div id = "menu">
menu

<?php

$nb = 0;

$affiche1 = "SELECT * FROM url WHERE  pseudo = '$pseudo'";

$affiche2 = $mysqli->query($affiche1);

$urla = "$_SERVER[REQUEST_URI]";

  while($affiche3 = $affiche2->fetch_assoc()){

    $a = substr_count($urla, $affiche3['url']);

   $a1 = $affiche3['url'];

if($a == 0){

echo "<button onclick = newurl(this.id) id =";echo $a1; echo ">";echo "afficher &nbsp;"; echo $a1; echo "</button>"; 

}

}

?>
</div>
