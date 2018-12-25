<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<?php 
include("/var/www/html/vecchionet.com/header.php");
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

if(!isset($_SESSION['pseudo'])){

include("membre/login.php");

}

?>


<?php

if(!empty($_SESSION['pseudo'])){

include("interface.php");

}

 ?>

</body>

</body>
</html>
