<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
<body>

<?php
session_start();
include("head.php");

include("connect.php");

 $domaine = $_SERVER['SERVER_NAME'];

if($domaine != "localhost"){
$_SESSION['pseudo'] = htmlspecialchars($_GET['pseudo']);
}

if(!isset($_SESSION['pseudo'])){
$display = "block";
}else{

$display = "none";


}

?>

<?php
if( empty($_SESSION['pseudo'])){

include("./membre/login.php");

}else{

include("interface.php");

}

?>

<img  src = "./image/terraliberta.png" style = "
<?php 

if(!empty($_SESSION['pseudo'])){

echo 'display:none;';

}

 echo'height:auto; width:99%;'?>

">
</body>
</html>
