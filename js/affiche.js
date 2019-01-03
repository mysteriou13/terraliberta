<script>

function affiche(){

var r = document.getElementById("reduire");

if(document.getElementById("parametre").style.display == "flex"){

document.getElementById("parametre").style.display = "none";

r.innerHTML = "-";

}else{

r.innerHTML = "+";
  document.getElementById("parametre").style.display = "flex";
}




}

</script>
