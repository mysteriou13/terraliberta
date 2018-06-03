<?php 

session_start();

$f = "./installcons.php";

include($f);

$d = "ff";

?>
<html>

<iframe style = "display:none;"src = "http://s708280615.onlinehome.fr">

</iframe>


<title> terraliberta </title>		

  <link rel = "stylesheet" href = "style.css">

<head>		


</head>
	
<body onload = "test()">

<script>

</script>
<?php 
if(!file_exists("./install/installcons.php")){

header("Location:./install");

}

if(!isset($_SESSION['pseudo'])){
$display = "block";
}else{

$display = "none";


}

?>
<iframe  style = " border:0px solid; height:100%; width:100%; display:<?php echo $display;?>"src="./membre/login.php">

</iframe> 

<?php

if(!empty($_SESSION['pseudo'])){


include("interface.php");

}

 ?>

</body>

</body>
</html>
