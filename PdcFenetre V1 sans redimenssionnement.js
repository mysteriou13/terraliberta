///////////////
// COULEURS //
///////////////

//FENETRE
BCKGROUND		=	"#FFFFFF";	//Couleur de fond de la fenetre
BORDER			=	"#000000";	//Couleur de la bordure

//BANDEAU
B_BCKGROUND		=	"#6f6f6f";	//Couleur du bandeau
B_TEXT			=	"#FFFFFF";	//Couleur du titre

//BOUTTON "FERMER" & "REDUIRE"
B_B_BCKGROUND	= 	"#FFFFFF";	//Couleur de Fond des bouttons "Fermer" et "R�duire"
B_B_BORDER		= 	"#000000";	//Couleur de Bordure des bouttons "Fermer" et "R�duire"
B_B_TEXT		= 	"#000000";	//Couleur de Texte des bouttons "Fermer" et "R�duire"

//BOUTTON "FERMER" & "REDUIRE" ENFONCES
B_BD_BCKGROUND	= 	"#000000";	//Couleur de Fond des bouttons "Fermer" et "R�duire"
B_BD_BORDER		= 	"#FFFFFF";	//Couleur de Bordure des bouttons "Fermer" et "R�duire"
B_BD_TEXT		= 	"#FFFFFF";	//Couleur de Texte des bouttons "Fermer" et "R�duire"

//SCROLLBAR
SBDARKSHADOW	=	"#4f4f4f";	//scrollbarDarkShadowColor
SB3DLIGHT 		=	"#4f4f4f";	//scrollbar3dLightColor
SBARROW   		=	"#FFFFFF";	//scrollbarArrowColor
SBBARBASE		=	"#4f4f4f";	//scrollbarBaseColor
SBBARFACE		=	"#8f8f8f";	//scrollbarFaceColor
SBHIGHTLIGHT	=	"#FFFFFF";	//scrollbarHighlightColor
SBBARSHADOW		=	"#8f8f8f";	//scrollbarShadowColor
SBBARTRACK		=	"#FFFFFF";	//scrollbarTrackColor
	
//////////////
// OPTIONS //
//////////////

COMPORTEMENT_FERMETURE = "cache"; //Comportement en cas de clique sur le boutton "Fermer" ( 'cache' ou 'supprime' la fen�tre)
CONFIRME_FERMETURE = true; //Demande une confirmation ou non lors d'un clique sur le boutton "Fermer"

///////////////
// GLOBALES //
///////////////

//Position du curseur de la souris (Mis � jour par le fonction appel� lors de l'evenement "OnMouseMove" de document)
curX = 0;
curY = 0;

fenetre = null;	//La fenetre en cours de d�placement

is_ie = ! (navigator.appName == "Netscape"); //Internet Explorer ou Netscape ?



//Cr�ation d'un fenetre
function CreerPdcFenetre( titre, largeur, hauteur, posLeft, posTop, contenu ){
		
	//On cr�er un objet "Div" correspondant � notre fenetre
	var fenetre = document.createElement("div");   
	
	//Permet d'identifier une fenetre de fa�on � ne pas �ffectuer d'action de redimensionnement sur un �l�ment qui n'est pas une fenetre
	fenetre.className = "PdcFenetre";
	
	//On d�finit les propri�t�s de la fenetre
	
	//On d�finit la taille et on garde la taille par d�faut
	fenetre.my_width = ((is_ie ? 4 : 0) + largeur); //+ 4 pour la bordure si IE, 0 si FF
	fenetre.style.width = fenetre.my_width +"px"; 
	
	fenetre.my_height = ((is_ie ? 24 : 20) + hauteur); //+24 pour la bordure et le bandeau si IE, + 20 si FF
	fenetre.style.height = fenetre.my_height + "px"; 
	
	//Position
	fenetre.style.position = "absolute";
	fenetre.style.left = posLeft + "px";
	fenetre.style.top = posTop + "px";
	
	//Bordure
	fenetre.style.border = "2px " + BORDER + " solid";
		
	//Couleur de fond pour avoir une fenetre non transparente
	fenetre.style.backgroundColor = BCKGROUND;
	
	//On cr�er notre bandeau
	bandeau = CreerPdcBandeau( titre, fenetre, largeur);
	
	//On ajoute notre bandeau � la fentre
	fenetre.appendChild( bandeau);
		
		
	//On cr�er une div qui va accueillir notre contenu
	var div_contenu = document.createElement("div"); 
	
	//On met � la taille demand�
	div_contenu.style.width = largeur + "px";
	div_contenu.style.height = hauteur + "px";
	
	//Dans le cas ou le contenu est plus grand que la div qui l'accueil, on affiche des scrollbar
	div_contenu.style.overflow = "auto";
		
	//Mise au couleurs personnailis� des scrollbars
	div_contenu.style.scrollbarDarkShadowColor	=	SBDARKSHADOW;
	div_contenu.style.scrollbar3dLightColor		=	SB3DLIGHT;
	div_contenu.style.scrollbarArrowColor		=	SBARROW;
	div_contenu.style.scrollbarBaseColor		=	SBBARBASE;
	div_contenu.style.scrollbarFaceColor		=	SBBARFACE;
	div_contenu.style.scrollbarHighlightColor	=	SBHIGHTLIGHT;
	div_contenu.style.scrollbarShadowColor		=	SBBARSHADOW;
	div_contenu.style.scrollbarTrackColor		=	SBBARTRACK;
	
	
	
	//On garde une r�f�rence � notre contenu pour la r�duction de la fenetre
	fenetre.contenu = div_contenu; 
		
	//Si on a du contenu on l'ajoute � la fenetre
	if(	contenu != null ){
	
		//Objet
		if( typeof( contenu) == "object" ){
			div_contenu.appendChild( contenu);
			
		}
		//Ou string (par exemple : "<a href"..."> .. </a>"
		else{
		
			tmp = document.createElement("div");
			tmp.innerHTML = contenu;
			div_contenu.appendChild( tmp);			
		}
		
	}

	//On ajoute notre div � la fenetre
	fenetre.appendChild( div_contenu);
			
	//Par d�faut la fenetre est en dessous lorsque qu'une fenetre est d�plac�
	fenetre.style.zIndex = 1;
		
	//On ajoute notre fenetre � la page
	document.body.appendChild( fenetre);
	
	
	//et on retourne l'objet fenetre pour une utilisation �ventuelle (r�affichage apr�s fermeture par exemple)
	return fenetre;
}

//Fonction ind�pendante pour la cr�ation de l'objet bandeau
function CreerPdcBandeau( titre, fenetre, largeur){

	// VOIR A LA FIN DU FICHIER POUR LE CODE HTML DU BANDEAU
			
	var bandeau = document.createElement("table")
	
	bandeau.style.width = largeur + "px";
	bandeau.style.height = "20px";
	bandeau.style.backgroundColor = B_BCKGROUND;
	bandeau.style.cursor = "move";
	
	
	var bandeau_body = document.createElement("tbody")
		
	//Notre unique ligne du tableau...	
	var tr = document.createElement("tr");
	
	//On cr�er une case pour le texte du titre
	var td_titre = document.createElement("td");	
	td_titre.style.paddingTop = "0px";
	td_titre.style.paddingBottom = "0px";
	
	//On ajoute la gestion des �venements � notre bandeau
	
	//Lorsque l'utilisateur appui sur le bouton de la souris
	td_titre.onmousedown = PdcFenetreOnMouseDown;	
	
	//Lorsque l'utilisateur relache le bouton de la souris
	td_titre.onmouseup = PdcFenetreOnMouseUp;
	
	//On cr�er la Div qui va accueillir le titre
	var div = document.createElement("div")
	
	div.style.fontSize = "12";
	div.style.width = (largeur - 36) + "px"; //Largeur de la fenetre moins la taille de nos 2 bouttons ( 12 + 12) moins la taille de la bordure (2 + 2) moins la taille entre nos cellule (4 * 2) = .. 36 bien s�r ! :p
	div.style.overflow = "hidden"; //Ne pas agrandir la Div si le contenu est plus grand que sa taille
	div.style.color = B_TEXT;
	div.style.fontWeight = "bold";
	div.style.whiteSpace = "nowrap"; //Pas de retour � la ligne
		
	
	//Le texte du titre
	div.innerHTML += titre;
	
		
	
	//On cr�er une 2i�me case pour notre tableau celle contenant le "boutton" pour r�duire la fenetre
	var td_reduire = document.createElement("td");	
	
	td_reduire.style.padding = "0px"	
	td_reduire.style.backgroundColor = B_B_BCKGROUND;
	td_reduire.style.cursor = "pointer";
	td_reduire.style.width = "12px";
	td_reduire.style.height = "12px";
	td_reduire.style.border = "1px " + B_B_BORDER + " solid";
	td_reduire.style.fontSize = "10px";	
	td_reduire.style.fontWeight = "bold";
	td_reduire.style.color = B_B_TEXT;
	
	//On utilise les balise <center> car la propri�t� "text-align" ne fonctionne pas sous FF
	td_reduire.innerHTML = "<center>-</center>";
		
	td_reduire.onmousedown = PdcBouttonOnMouseDown; //D�but du clique
	td_reduire.onmouseup = PdcBouttonOnMouseUpReduire; //R�duction de la fenetre
	td_reduire.onmouseout = PdcBouttonOnMouseOut; //Si l'utilisateur commence son clique puis sort du "boutton" pour annuler
		
		
	
	//On cr�er une 3i�me case pour notre tableau celle contenant le "boutton" pour fermer la fenetre
	var td_fermer = document.createElement("td");	
	
	td_fermer.style.padding = "0px"	
	td_fermer.style.backgroundColor = B_B_BCKGROUND;
	td_fermer.style.cursor = "pointer";
	td_fermer.style.width = "12px";
	td_fermer.style.height = "12px";
	td_fermer.style.border = "1px " + B_B_BORDER + " solid";
	td_fermer.style.fontSize = "10px";	
	td_fermer.style.fontWeight = "bold";
	td_fermer.style.color = B_B_TEXT;
	
	//On utilise les balise <center> car la propri�t� "text-align" ne fonctionne pas sous FF
	td_fermer.innerHTML = "<center>X</center>";
	
	td_fermer.onmousedown = PdcBouttonOnMouseDown; //D�but du clique
	td_fermer.onmouseup = PdcBouttonOnMouseUpFermer; //Fermeture de la fenetre
	td_fermer.onmouseout = PdcBouttonOnMouseOut; //Si l'utilisateur commence son clique puis sort du "boutton" pour annuler
		
	//On Embo�te tout �a....
		
	//On ajoute la div � notre case (TD)
	td_titre.appendChild( div);	
	//On ajoute la case "titre" � notre ligne
	tr.appendChild( td_titre);
	//On ajoute la case "r�duire" � notre ligne
	tr.appendChild( td_reduire);
	//On ajoute la case "fermer" � notre ligne
	tr.appendChild( td_fermer);	
	//On ajoute notre ligne au corp du tableau	
	bandeau_body.appendChild( tr);	
	//On ajoute le corp au tableau au tableau
	bandeau.appendChild( bandeau_body);
	
	
	//On ajoute une r�f�rence � la fenetre (l'objet parent) pour les 3 elements du bandeau
	
	//Permet d'acc�der � la fenetre � partir des 3 "objets" du bandeau ('boutton' + titre)
	td_titre.my_fenetre = fenetre;
	td_fermer.my_fenetre = fenetre;
	td_reduire.my_fenetre = fenetre;	

	
	return bandeau;
		
		
}

//Bandeau.OnMouseUp
function PdcFenetreOnMouseUp(){	
	
	//Par d�faut la fenetre est en dessous lorsque qu'une fenetre est d�plac�
	this.my_fenetre.style.zIndex = 1;
	
	//On remet notre fonction par d�faut pour g�rer le d�placement
	this.onmousedown = PdcFenetreOnMouseDown;	
	
	//Plus besoin de l'event "mousemove"
	document.onmousemove = null;
	
	//Effet de transparence
	if( is_ie )
		this.my_fenetre.style.filter = "alpha(opacity=100);";	
	else
		this.my_fenetre.style.opacity = "1";
	
}

//Bandeau.OnMouseDown
function PdcFenetreOnMouseDown(e){
		
	maj_coordonnees( e);
	
	//On garde les coordonn�e du pointeur par rapport � la fenetre
	this.my_fenetre.CurLastX = curX - this.my_fenetre.offsetLeft;
	this.my_fenetre.CurLastY = curY - this.my_fenetre.offsetTop;
			
	//On se met au dessus des autres fenetres lors du d�placement
	this.my_fenetre.style.zIndex = 2;
		
	//Effet de transparence
	if( is_ie )
		this.my_fenetre.style.filter = "alpha(opacity=80);";	
	else
		this.my_fenetre.style.opacity = "0.8";
	
	//On garde l'objet fenetre (du bandeau) qui correspond � la fenetre pour laquelle on g�re le d�placement
	fenetre = this.my_fenetre;
		
	//Et on active l'event "mousemove" pour r�cup�rer les coordonn�e de la souris au fur et � mesure
	document.onmousemove = PdcDocumentOnMouseMove;
	
	//Annulation de l'evenement pour �viter le surlignement
	return false;
}


//Document.OnMouseMove
function PdcDocumentOnMouseMove(e){
	
		
	maj_coordonnees(e);
	
	//On bloque le d�placement en dehors de la fenetre du navigateur
	if( curX - fenetre.CurLastX < 0 || curY -fenetre.CurLastY < 0 )
		return;
		
	//D�place la fenetre en fonction de la position actuelle du curseur et de la position du curseur par rapport � la fenetre
	fenetre.style.left = curX -fenetre.CurLastX + "px";
	fenetre.style.top = curY - fenetre.CurLastY + "px";	
	
	//Annulation de l'evenement pour �viter le surlignement
	return false;
}

//Fonction qui met � jour les coordonn�es de la souris en fonction du type de navigateur
function maj_coordonnees(e){
	
	if( is_ie ){
		curX = event.clientX;
		curY = event.clientY;
	}
	else{
		curY = e.clientY;
		curX = e.clientX;
	}
}


//Enfoncement des boutton "r�duire" et "fermer"
function PdcBouttonOnMouseDown(){
	
	document.onmousemove = ret_false;
		
	this.style.border = "1px " + B_BD_BORDER + " inset";	
	
	this.style.backgroundColor = B_BD_BCKGROUND;
	this.style.color = B_BD_TEXT;
	
	//Annulation de l'evenement pour �viter le surlignement
	return false;
}

//Relache la souris sur le boutton "r�duire" (On r�duit la fenetre)
function PdcBouttonOnMouseUpReduire(){
	
	
	this.style.border = "1px " + B_B_BORDER + " solid";	
	
	this.style.backgroundColor = B_B_BCKGROUND;
	this.style.color = B_B_TEXT;
	
	if( this.my_fenetre.contenu.style.display == "none" ){
		this.my_fenetre.contenu.style.display = "block"; //On r�affiche le contenu						
		this.my_fenetre.style.height = this.my_fenetre.my_height + "px"; //et on met � jour la taille de la fenetre				
	}
	else{
		this.my_fenetre.contenu.style.display = "none";	//On cache le contenu
		this.my_fenetre.style.height = "24px"; //Taille de la fenetre = taille du bandeau + bordure
	}
	
}

//Relache la souris sur le boutton "fermer" (On ferme ou cache la fenetre)
function PdcBouttonOnMouseUpFermer(){
	
	this.style.border = "1px " + B_B_BORDER + " solid";	
	
	this.style.backgroundColor = B_B_BCKGROUND;
	this.style.color = B_B_TEXT;
	
	//Confirmation avant fermeture?
	if( CONFIRME_FERMETURE )
		if( !confirm("Etes-vous s�r de vouloir fermer la fen�tre?") )
			return;
	
	
	//Lors de la demande de fermeture soit on cache la fenetre
	if( COMPORTEMENT_FERMETURE == "cache"){
		this.my_fenetre.style.display = "none";
	}
	//Soit on l'enl�ve d�finitivement de notre page
	else{
		document.body.removeChild( this.my_fenetre);
	}
}

//sorti des boutton "r�duire" et "fermer" pour la souris
function PdcBouttonOnMouseOut(){
		
	this.style.border = "1px " + B_B_BORDER + " solid";	
	
	this.style.backgroundColor = B_B_BCKGROUND;
	this.style.color = B_B_TEXT;	
}




//Permet d'annuler l'effet de surlignement sous IE
function ret_false(){
	return false;
}

/*

CODE HTML + STYLE POUR LE BANDEAU

<table style="width: 100px; background-Color: #6f6f6f; cursor: move;">	
<tr>


	<td style="padding-top: 0px; padding-bottom: 0px;">
		<div align="left" style="font-size: 12; width: 50px; overflow: hidden; color: #FFFFFF; font-weight:bold; white-space:nowrap;">Mon super titre</div>
	</td>
	
	<td style="padding:0px; background-Color: #FFFFFF; cursor: pointer; width:12px; height:12px; border:1px #000000 solid; font-size:10; text-align= center; font-weight:bold;"><center>-</center></td>

	<td style="padding:0px; background-Color: #FFFFFF; cursor: pointer; width:12px; height:12px; border:1px #000000 solid; font-size:10; text-align= center; font-weight:bold;"><center>X</center></td>
			
</tr>
</table>


*/