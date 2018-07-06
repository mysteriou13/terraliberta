
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


$debut = "<?php ";

if(!empty($_POST)){

$postserver =  htmlspecialchars($_POST['server']);

$postdata =  htmlspecialchars($_POST['data']);

$postlogin = htmlspecialchars($_POST['login']);

$postpass =  htmlspecialchars($_POST['pass']);

$mysqli = new mysqli($postserver, $postlogin,$postpass, $postdata);

if($mysqli->connect_errno){

echo "error connection";

}else{


$debut  = "<?php\n";

$fin = " ?>\n";

$server = " const  server  = ".'"'.$postserver.'"'.";\n";

$data = " const  data  = ".'"'.$postdata.'"'.";\n";

$login = " const  login  = ".'"'.$postlogin.'"'.";\n";

$pass  = " const  pass  = ".'"'.$postpass.'"'.";\n";

$install ="installcons.php";

$file = $debut.$server.$data.$login.$pass.$fin;
  
$fp = fopen('installcons.php', 'w+');

fwrite($fp, $file);
fclose($fp);

if(!file_exists("installcons;php")){

}

$table = "CREATE TABLE `url` (`id` int(11) NOT NULL,`pseudo` text NOT NULL, `url` text NOT NULL,`name` text NOT NULL,`type` text NOT NULL) 
ENGINE=InnoDB DEFAULT CHARSET=latin1;
";

$auto = "ALTER TABLE `url` ADD PRIMARY KEY (`id`);";

$auto1 ="ALTER TABLE `url`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";

$mysqli->query($table);

$mysqli->query($auto);

$mysqli->query($auto1);


}

}

 if(!file_exists("installcons;php")){

echo "erreur impossible d'ecrire dans le dossier";

}

?>

</center>
