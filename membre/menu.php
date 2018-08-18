<div id = "menu" style = "margin-right:10%;">

<div id = "d" style = "display:none">
0
</div>



<script src = "onglet.js" language = "javascript" > </script>

<script>

function menu(pad,dis,id,c){

var p = document.getElementById(pad);

var d  = document.getElementById("d").innerHTML++;

var discalc = null;


if(id == "menupad"){

 document.getElementById(pad).style.display = "block";

 document.getElementById(c).style.display = "none";

 document.getElementById("menupad").className = "onglet_y onglet";

 document.getElementById("menucalc").className = "onglet_n onglet";  

}


if(id == "menucalc"){

 document.getElementById(pad).style.display = "none";

 document.getElementById(c).style.display = "block";

 document.getElementById("menucalc").className = "onglet_y onglet";

 document.getElementById("menupad").className = "onglet_n onglet";

}

}


</script>

<?php

$display = "block";

?>

<script>

var dis = "<?php echo $display?>";

function dismenu(id,l){

var  m = document.getElementById(id);

var  l = document.getElementById(l);

if(m.style.display == "block"){

m.style.display = "none";

l.innerHTML = "-";

}else{

m.style.display= "block";

l.innerHTML = "+";

}

}

</script>

  <button  id  = "bmenulistpad" onclick = "dismenu('listemenu','bmenulistpad')" style = "background-color:blue; color:white; font-size:2em; border-radius:20px; 20px">
+
</button>



 <div id = "listemenu" style = "display:block">

<div onload = "onglet()">
       <div class="onglets_html">
        <div >

       <div id = "menupad" style = "font-size:2em; border-radius:20px; 20px;" class = "onglet_y onglet" onclick = "menu('pad',dis,this.id,'calc')" >
    liste des pad  
      </div>
 
       <div id = "menucalc" style = "font-size:2em; border-radius:20px; 20px;" class = "onglet_n onglet" onclick = "menu('pad',dis,this.id,'calc') ">
       liste des calc
      </div>


       </div>
       

 </div>


<div id = "pad" style = "display:<?php echo $display;?>; border-radius:20px; 20px; background-color:DarkBlue; color:white; font-size:2em;" >

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


   <div style = "border-radius:20px; 20px; display:none;  background-color:DarkBlue; color:white; font-size:2em;" id= "calc">
<?php

$nb = 0;

$affiche1 = "SELECT * FROM url WHERE  type = 'calc'  && pseudo = '$pseudo'";

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
</div>
</div>
