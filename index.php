<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<?php 
session_start();

$f = "./install/installcons.php";

include($f);

$d = "ff";

?>

<html>

<body onload = "test()">

<?php

include("head.php");

if(!file_exists("./install/installcons.php")){

header("Location:./install");

}else{


include("connect.php");

}

if(!isset($_SESSION['pseudo'])){
$display = "block";
}else{

$display = "none";


}

?>


<?php
if(!isset($_SESSION['pseudo'])){

include("membre/login.php");

}else{

include("interface.php");

}

?>

</body>

</body>
</html>
