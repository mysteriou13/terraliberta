<html>

<title> :: TEST PdcFenetre :: </title>		

<head>		

<?php 
session_start();
	
?>
</head>
	
<body onload = "test()">

<script>

</script>
</br>
<?php 

if(!isset($_SESSION['pseudo'])){
$display = "block";
}else{

$display = "none";

}

?>
<iframe  style = " border:0px solid; height:100%; width:100%; display:<?php echo $display;?>"src="./membre/login.php">

</iframe> 

<?php

if($display == "none"){


include("interface.php");

}

 ?>

</body>

</body>
</html>
