<script>
function dismenu(id,l){

var  m = document.getElementById(id);

var  l = document.getElementById(l);

if(m.style.display == "block"){

m.style.display = "none";

l.innerHTML = "+";

}else{

m.style.display= "block";

l.innerHTML = "-";

}

}

</script>


