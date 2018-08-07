<?php 

session_start();

 ini_set('display_errors', 1);


$f = "./install/installcons.php";

include($f);

$d = "ff";

?>
<html>




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
