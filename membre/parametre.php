<?php 
session_start();

if(empty($_SESSION['pseudo'])){

header("Location: ../index.php");

}

?>
