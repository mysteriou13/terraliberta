<?php 

session_start();


 include_once("../install/installcons.php"); 

 include_once("../connect.php");

$d1 = $_POST['item_number'];

$d1 = htmlspecialchars($d1);

$d2 = date("d");

$d3 = 0;

$d4 = date("Y");

$day = date("d");


while($d3 <= $d1){

$d3++;

$d2 = $d2+1;

if($d2 == 12){

$d2 = 0;

$d4 = $d4+1;

}

}

 $date1 =  $day.$d2.$d4;

 $date1 = $mysqli->real_escape_string($date1);

 $pseudo = $_POST['pseudo'];

 $pseudo = htmlspecialchars($pseudo);

 $pseudo = $mysqli->real_escape_string($pseudo);  

 $u = 'UPDATE ebo SET temps = "'.$date1.'" WHERE pseudo = "'.$pseudo.'"'; 

 $mysqli->query($u); 


?>
