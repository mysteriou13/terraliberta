<?php 



include_once("../install/installcons.php");

include_once("../connect.php");



$validepseudo = 0;
$validepass = 0;
$valideemail = 0;
$display = "none";

$date = date("dmY");

$date = $mysqli->real_escape_string($date);

?>
<center>
<strong>
terraliberta
</strong>
<form action = "<?php $_SERVER['PHP_SELF']?>" method  ="POST">

inscription
</br> pseudo <input type  ="text"  name = "pseudo">
<?php

if(isset($_POST['pseudo']) && !empty($_POST['pseudo'])){

$pseudo = $mysqli->real_escape_string($_POST['pseudo']);

$pseudo1 = "SELECT COUNT(*)pseudo FROM membre WHERE pseudo = '$pseudo'";

$pseudo2 = $mysqli->query($pseudo1);

$pseudo4 = $pseudo2->fetch_assoc();

 if($pseudo4['pseudo'] == 0){
 $validepseudo = 1;
 $errorpseudo = 0;
}else{

$errorpseudo = 1;

echo "pseudo pris";

}



}
   ?>
</br>

</br> mot de pass <input type = "password" name  = "pass">
<?php
if(isset($_POST['pass']) && !empty($_POST['pass'])){

$pass1 = strlen($_POST['pass']);

if($pass1 >= 8){

$pass =  $_POST['pass'];

$validepass = 1;

}else{

$validepass = 0;

 echo "mot de pass tros court";

}

}

?>
</br>

</br> email <input type  = "text" name  = "email">
<br>
<?php

if(isset($_POST['email']) && !empty($_POST['email'])){

$email = $mysqli->real_escape_string($_POST['email']);

$email1 = "SELECT COUNT(*)email FROM membre WHERE email ='$email'";

$email2 = $mysqli->query($email1);

$email3 = $email2->fetch_assoc();


if(filter_var($email, FILTER_VALIDATE_EMAIL)){

$errorformatemail = 1;

}else{

  $errorformatemail = 0;

}

if($email3['email'] == 0){

$valideemail  = 1;

$erroremail  = 0;

}else{
   $erroremail = 1;

}

}
 ?>
<input type = "submit">
</form>
<a style = " color:black" href = "login.php"> connection </a>
</center>
<?php 


$fichier = '../../connect/connect.php';

include_once($fichier);


$errorpseudo = null;
$erropass = null;
$errorformatemail  = null;
$erroremail = null;

$total = null;


$total = $validepseudo+$validepass+$valideemail;


if($total == 3){

$pass = password_hash($pass,PASSWORD_DEFAULT);

$pass = $mysqli->real_escape_string($pass);

$display = "block";

$date = date("d").date("m").date("y");

$date = $mysqli->real_escape_string($date);

$i = 'INSERT INTO membre VALUES(NULL,"'.$pseudo.'","'.$pass.'","'.$email.'","'.$date.'")';

 $moth = date("m")+1; 

 $date = date("d").$moth.date("y");

 $date = $mysqli->real_escape_string($date);

$ebo = 'INSERT INTO  ebo VALUES(NULL,"'.$pseudo.'","'.$date.'")';

$mysqli->query($i);

$mysqli->query($ebo);

header("Location:../index.php");

}


?>
