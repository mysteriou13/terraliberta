
<?php 

include_once("./install/installcons.php");

include_once("./connect.php");


?>

<div class = "divcadre">

 <center>
<form action = "<?php $_SERVER['PHP_SELF']?>" method = "POST">


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
</center>

<center>
</br>
<a style = "color:white" href = "inscritpion.php"> inscription </a>
</center>
<?php 

 $day = substr(date("dmy"), 0, 2); 

 $moth = substr(date("dmy"), 2, 2);

 $year = substr(date("dmy"), 4, 2);

$valide = 0;
if(isset($_POST['pseudo']) && !empty($_POST['pseudo'])){

$pseudo = $mysqli->real_escape_string($_POST['pseudo']);

$pass = $mysqli->real_escape_string($_POST['pass']);

$pass =  $_POST['pass'];

$valide = 0;


$i = "SELECT COUNT(*)pseudo FROM membre WHERE pseudo = '$pseudo'";

$i2  = $mysqli->query($i);

$i3 = $i2->fetch_assoc();


$d = "SELECT *  FROM  ebo  WHERE pseudo = '$pseudo'";

$d2 = $mysqli->query($d);

$d3 = $d2->fetch_assoc();

$temps = $d3['date'];

$date = date("dmy");

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

if($valide == 1 && $day <= date("d") && $moth <= date("m") && date("y")<= $year ){
session_start();
 $_SESSION['pseudo'] = $pseudo;


header("Location:index.php");

}
?>

</div>
