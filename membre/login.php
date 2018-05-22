
<?php 

include_once("../install/installcons.php");

include_once("../connect.php");


?>

<div style  = "position:absolute; top:20%; left:15%;">

<form action = "<?php $_SERVER['PHP_SELF']?>" method = "POST">

<center>

<strong>

terraliberta
</strong>
</br>
 permet d’afficher sur une même page différents sites web ou outils collaboratifs en ligne.
</br>
Vous pouvez ainsi présenter, communiquer et travailler à plusieurs sur différents documents en même temps:

</br>
connection
</br>
pseudo<input type = "text" name = "pseudo">

</br>

password<input type = "password" name = "pass">
</br>
<input type = "submit" value = "connection">
</form>


</br>
<a style = "color:black" href = "inscritpion.php"> inscription </a>
</center>
<?php 

 $date = date("dmy");

$d = "SELECT date FROM membre  WHERE pseudo = 'mysteriou'";

$d2 = $mysqli->query($d);

$d3 = $d2->fetch_assoc();

if(isset($_POST['pseudo']) && !empty($_POST['pseudo'])){

$pseudo = $mysqli->real_escape_string($_POST['pseudo']);

$pass = $mysqli->real_escape_string($_POST['pass']);

$pass =  $_POST['pass'];

$valide = 0;

$abo = 0;


$i = "SELECT COUNT(*)pseudo FROM membre WHERE pseudo = '$pseudo'";

$i2  = $mysqli->query($i);

$i3 = $i2->fetch_assoc();


$d = "SELECT *  FROM  ebo  WHERE pseudo = '$pseudo'";

$d2 = $mysqli->query($d);

$d3 = $d2->fetch_assoc();


if($date <= $d3['temps']){

$abo = 1;

}

$login = "SELECT pass FROM membre WHERE pseudo = '$pseudo'";

$login1 = $mysqli->query($login);

$login2 = $login1->fetch_assoc();

echo "<center>";

if($i3['pseudo'] == 1){
if (password_verify($pass, $login2['pass'])) {

$valide = 1;

}
}

if($valide == 0){

echo "pseudo ou mot de pass incorrect";

}

}

echo "</center>";

if($valide == 1 && $abo == 1){
session_start();
 $_SESSION['pseudo'] = $pseudo;


header("Location:../index.php");

}
?>

</div>
