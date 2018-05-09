

<div id = "menu">
menu

<?php

$affiche1 = "SELECT url FROM url WHERE  pseudo = '$pseudo'";

$affiche2 = $mysqli->query($affiche1);

while($affiche3 = $affiche2->fetch_array(MYSQLI_ASSOC)){

echo $affiche3['url'];

echo "</br>";

}

 ?>
</div>
