<?php 
session_start(); 
 include_once("../install/installcons.php");
 
include_once("../connect.php");

 $pseudo = $_SESSION['pseudo'];

 $a = $_GET['nb'];
 
 $a = htmlspecialchars($a);

 $a2 = "+".$a."month";

 $date =  date(dmy);

 $pseudo = $mysqli->real_escape_string($pseudo);  
 
$abo =  'SELECT * FROM ebo WHERE pseudo = "'.$pseudo.'"';

$abo1 = $mysqli->query($abo);
 
$abo2 = $abo1->fetch_assoc();


$jour = substr($abo2['date'], 0, 2);
 
 $mois = substr($abo2['date'],2,2); 

$anner = substr($abo2['date'],4,4);

$abodate = $abo2['date'];


if(date(m) >  $mois && date(y)  == $anner or $anner < date(y)){

  $date1 =  date(dmy, strtotime("$a2"));

 $date1 = $mysqli->real_escape_string($date1);

 }

 

if(date(y) == $anner && $mois > date(m)){

 
$dateDepart = $jour.'-'.$mois.'-'.$anner;

$dateDepartTimestamp = strtotime($dateDepart);
 $dateFin  = date('d-m-y', strtotime($a2,$dateDepartTimestamp));

 $date1 = $mysqli->real_escape_string($dateFin);

$date1 = str_replace("-","",$date1);

 }
 
$u = 'UPDATE ebo SET date = "'.$date1.'" WHERE pseudo = "'.$pseudo.'"'; 

$mysqli->query($u); 

?>
