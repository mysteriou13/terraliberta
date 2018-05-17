
<center>

installation de terraliberta
</br>
</br>
<form action = "<?php $_SERVER['PHP_SELF']?>" method = "post">

adress base de donné <input type = "text" name = "server">
</br>
nom de la base de donné <input type = "text" name = "data">
</br>
login <input type  = "text" name = "login">
</br> 
mot de pass <input type = "password" name = "pass">
</br>
</br>
<input type  = "submit" value = "envoyer">
</form>

<?php

$install ="installcons.php";

if(file_exists($install)){


}else{


}

$debut = "<?php ";

if(!empty($_POST)){
$server = " const server = '".$_POST['server']."'";

$server = htmlspecialchars($_POST['server']);

$data = "const server = '".$_POST['data'];

$data = htmlspecialchars($_POST['data']);

$login = "const login = '".$_POST['login']."'";

$login = htmlspecialchars($_POST['login']);  

$pass = "const pass = '".$_POST['pass'];

$pass = htmlspecialchars($_POST['pass']);  

$mysqli = new mysqli($server,$login,$pass,$data);

if($mysqli->connect_errno){

echo "error connection";

}else{


$debut  = "<?php\n";

$fin = " ?>\n";

$server = " const  server  = ".'"'.$server.'"'.";\n";

$data = " const  data  = ".'"'.$data.'"'.";\n";

$login = " const  login  = ".'"'.$login.'"'.";\n";

$pass  = " const  pass  = ".'"'.$pass.'"'.";\n";

$install ="installcons.php";

$file = $debut.$server.$data.$login.$pass.$fin;
  
$fp = fopen('installcons.php', 'w+');

fwrite($fp, $file);
fclose($fp);

$table = "CREATE TABLE `url` (`id` int(11) NOT NULL,`pseudo` text NOT NULL, `url` text NOT NULL,`name` text NOT NULL,`type` text NOT NULL) 
ENGINE=InnoDB DEFAULT CHARSET=latin1;
";

$auto = "ALTER TABLE `url` ADD PRIMARY KEY (`id`);";

$auto1 ="ALTER TABLE `url`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";

$mysqli->query($table);

$mysqli->query($auto);

$mysqli->query($auto1);

header("Location: ../index.php");

}

}


?>

</center>
