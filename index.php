<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>

<body onload ="test()">

<?php

session_start();

include("../admin/connect.php");

$_SESSION['pseudo']  = htmlspecialchars($_GET['pseudo']);

include("head.php");

include("connect.php");


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

</body>
</html>
