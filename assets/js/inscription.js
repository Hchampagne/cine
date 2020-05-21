

var bouton=document.getElementById("valider"); 
bouton.addEventListener("click",envoy);
function envoy()                 
{
	// regex
	var regNom = /^[A-Z][a-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*$/;	
    var regPrenom = /^[A-Z][a-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*$/;	
    var regMail = /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/;
    var regMdp = /^(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/;
    var regLogin = /^[A-Z][a-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*$/;
    var regAge = /^[1-9][0-9]$/;
	
	// message alerte	
	var A="le champ n'est pas rempli !";
	var B="Sasie incorrecte !";
		
	// block vos coordonnées	
	var nom=document.getElementById("nom").value;                // valeur nom
	var prenom=document.getElementById("prenom").value;          //valeur prenom
	var age=document.getElementById("age").value;          		// valeur naissance
	var email=document.getElementById("email").value;            // valeur E-mail
	var login=document.getElementById("login").value;            // valeur login
	var mdp=document.getElementById("mdp").value;            	// valeur mdp
	var verifmdp=document.getElementById("verifmdp").value;      // valeur mdp

	// bouton rdio homme/femme		
	var homme=document.getElementById("homme").checked;         // bouton radio homme si checked
	var femme=document.getElementById("femme").checked;         // bouton radio femme si checked
   	
	if (nom==""){                                     			// controle nom
			event.preventDefault();							  	// si la variable est vide alors arret du flux	affichage message alerte A		
			document.getElementById("alertNom").innerHTML=A;}       
	else if (regNom.test(nom)==false){                          // sinosi la variable ne match pas avec la regex arret du flux affichage message d'alerte B
			event.preventDefault();
            document.getElementById("alertNom").innerHTML=B;}
    else{document.getElementById("alertNom").innerHTML="&nbsp";}
	
	if (prenom==""){                                       		// controle prenom
			event.preventDefault();							  	//idem que controle du nom 
			document.getElementById("alertPrenom").innerHTML=A;}  
	else if (regPrenom.test(prenom)==false){                       
			event.preventDefault();
            document.getElementById("alertPrenom").innerHTML=B;}
        else{document.getElementById("alertPrenom").innerHTML="&nbsp";}

	if (age==""){                                     			// controle age
			event.preventDefault();							  	//idem que controle du nom 
			document.getElementById("alertAge").innerHTML=A;}  
	else if (regAge.test(age)==false){                       
			event.preventDefault();
			document.getElementById("alertAge").innerHTML=B;}
	else{document.getElementById("alertAge").innerHTML="&nbsp";}
           	
	if (email==""){                                        // controle E-mail
			event.preventDefault();							  	//idem que controle du nom 
			document.getElementById("alertEmail").innerHTML=A;} 		
	else if (regMail.test(email)==false){                       
			event.preventDefault();
            document.getElementById("alertEmail").innerHTML=B;}
    else{document.getElementById("alertEmail").innerHTML="&nbsp";}
	
	if (homme==false && femme==false){                    								// controle bouton radio
			event.preventDefault();							  								// test la valeur booléenne renvoyer par var Checked arret du flux si tous les deux false
			document.getElementById("alertSexe").innerHTML=("veuillez sélectionner H/F !");} // impression message d'alerte	
	else{document.getElementById("alertSexe").innerHTML=("&nbsp");}

	if (login==""){                                        // controle Login
		event.preventDefault();							  	//idem que controle du nom 
		document.getElementById("alertLogin").innerHTML=A;} 		
	else if (regLogin.test(login)==false){                       
		event.preventDefault();
		document.getElementById("alertLogin").innerHTML=B;}
	else{document.getElementById("alertLogin").innerHTML="&nbsp";}

	if (mdp==""){                                        // controle mdp
		event.preventDefault();							  	//idem que controle du nom 
		document.getElementById("alertMdp").innerHTML=A;} 		
	else if (regMdp.test(mdp)==false){                       
		event.preventDefault();
		document.getElementById("alertMdp").innerHTML=B;}
	else{document.getElementById("alertMdp").innerHTML="&nbsp";}

	if (verifmdp==""){                                        // controle Login
		event.preventDefault();							  	//idem que controle du nom 
		document.getElementById("alertVerifMdp").innerHTML=A;} 		
	else if (login != verifmdp){                       
		event.preventDefault();
		document.getElementById("alertVerifMdp").innerHTML="Erreur de vérification du mot de passe";}
	else{document.getElementById("alertVerifMdp").innerHTML="&nbsp";}
}