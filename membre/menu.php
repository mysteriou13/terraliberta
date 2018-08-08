<div id = "menu" style = "margin-right:10%;">

<div style = "border:1px solid black; background-color:DarkBlue; color:white; font-size:2em;">
liste des fichier text

<div>

<?php

$pseudo = $mysqli->real_escape_string($pseudo);

$nb = 0;

$affiche1 = "SELECT * FROM url WHERE  type = 'pad' && pseudo = '$pseudo'";

$affiche2 = $mysqli->query($affiche1);

$urla = "$_SERVER[REQUEST_URI]";

  while($affiche3 = $affiche2->fetch_assoc()){

    $a = substr_count($urla, $affiche3['url']);

   $a1 = $affiche3['url'];

if($a == 0){

echo "<div onclick = newurl(this.id) id =";echo $a1; echo ">";
echo $affiche3['name']; echo "</div>"; 

}else{

echo "<div  id =";echo $a1; echo ">";
echo $affiche3['name']; echo "</div>"; 


}

}

?>

</div>
  
</div>

</br>


   <div style = "border:1px solid black">
<div>
liste des calc
</div>
<?php

$nb = 0;

$affiche1 = "SELECT * FROM url WHERE  type = 'calc'";

$affiche2 = $mysqli->query($affiche1);

$urla = "$_SERVER[REQUEST_URI]";

  while($affiche3 = $affiche2->fetch_assoc()){

    $a = substr_count($urla, $affiche3['url']);

   $a1 = $affiche3['url'];

if($a == 0){

echo "<div><button onclick = newurl(this.id) id =";echo $a1; echo ">";              
echo $affiche3['name']; echo "</button></div>";                                     

}else{

echo "<div><button  id =";echo $a1; echo ">";
echo $affiche3['name']; echo "</button></div>";


}                                                                                   

}
                                                                                    
?>                                                                                  

</div>

 
</div>
