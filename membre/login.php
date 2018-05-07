
<?php 

include("../../connect/connect.php");

?>

<form action = "<?php $_SERVER['PHP_SELF']?>" method = "POST">

<center>

<strong>

terraliberta

</strong>


</br>
connection
</br>
pseudo<input type = "text" name = "pseudo">

</br>

password<input type = "password" name = "pass">
</br>
<input type = "submit">
</form>
</br>
<a style = "color:black" href = "inscritpion.php"> inscription </a>
</center>
<?php 

if(isset($_POST['pseudo']) && !empty($_POST['pseudo'])){

$pseudo = $mysqli->real_escape_string($_POST['pseudo']);

$pass = $mysqli->real_escape_string($_POST['pass']);

$pass =  $_POST['pass'];;

$valide = 0;

$i = "SELECT COUNT(*)pseudo FROM membre pseudo WHERE pseudo = '$pseudo'";

$i2  = $mysqli->query($i);

$i3 = $i2->fetch_assoc();


$login = "SELECT pass FROM membre WHERE pseudo = '$pseudo'";

$login1 = $mysqli->query($login);

$login2 = $login1->fetch_assoc();

echo "<center>";

if($i3['pseudo'] == 1){
if (password_verify($pass, $login2['pass'])) {

$valide = 1;

}
}

if($valide == 0){

echo "pseudo ou mot de pass incorrect";

}

}
echo "</center>";

if($valide == 1){

echo "<center>valide</center>";

header("Location:index.php");

}
?>
