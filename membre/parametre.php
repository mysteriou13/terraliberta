<?php 
session_start();

include("../install/installcons.php");

include("../connect.php");

if(empty($_SESSION['pseudo'])){

header("Location: ../index.php");

}

$date = date("m");

$y = date("y");

$d = date("d");

$pseudo = $mysqli->real_escape_string($_SESSION['pseudo']); 

$membre = "SELECT * FROM membre WHERE pseudo = '$pseudo'";

$membre1 = $mysqli->query($membre);

$membre2 = $membre1->fetch_assoc();

$ebo = "SELECT * FROM ebo WHERE pseudo = '$pseudo'";

$ebo1 = $mysqli->query($ebo);

$ebo2 = $ebo1->fetch_assoc();

$temps = $ebo2['temps'];

$abo = $temps-$date;

?>
<center>
<div>

<a href = "../index.php">sortir</a>

</div>
<div>
parametre
</div>
<div>
email:<?php echo $membre2['email'];?>

</div>

<div>

<?php 

$moth = substr($temps, 2, 2)-$date; 
  
$year = substr($temps, 4, 2)-$y;

$day = substr($temps, 0,2)-$d;

$moth1 = explode(0,$moth);


$moth = $moth1[0];

$m = "&nbsp;&nbsp; mois &nbsp; &nbsp;";

$d = "&nbsp; &nbsp;jours &nbsp; &nbsp;";

$y1 = "&nbsp;&nbsp; ann&eacute;e &nbsp; &nbsp;";

$a = " abonnement restant: &nbsp; &nbsp;";


if($day <=  0){

$day = null;

$d = null;

}

if($year <= 0){

$year = null;

$y1 = null;

}

if($moth <= 0){

$moth = null;
$m = null;

}


$time = $a.$year.$y1.$moth.$m.$day.$d;

echo $time;

?>

</div>
<div>

<a href = "../paypal"> commander </a>

</div>
</center>
