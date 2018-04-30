<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Un syst&egrave;me d'onglet en html</title>
    <link type="text/css" rel="stylesheet" media="all" title="CSS" href="style.css" />
     <script></script>
</head>

<script src = "onglet.js" language = "javascript" > </script>


<div onload = "onglet()">

       <div class="onglets_html">
        <div id = "c" class="onglets">
            <div onclick = "changeclass(this.id)"  id = "div1" class="onglet_n onglet">Quoi</div>
            <div  onclick = "changeclass(this.id)" id = "div2" class ="onglet_n onglet">Qui</div>
            <div onclick = "changeclass(this.id)"  id = "div3" class="onglet_n onglet"> Pourquoi</div>
        </div>
        <div class="contenu">
      </div>


 </div>


