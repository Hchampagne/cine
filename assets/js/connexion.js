var bouton=document.getElementById("connexion"); 
bouton.addEventListener("click",envoy);
function envoy()                 
{
	
    var regMdp = /^(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/;
    var regLogin = /^[A-Z][a-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*$/;
    
	
	// message alerte	
	var A="le champ n'est pas rempli !";
	var B="Sasie incorrecte !";
		
	// block vos coordonnées		
	var login=document.getElementById("login").value;            // valeur login
	var mdp=document.getElementById("mdp").value;            	// valeur mdp
	

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

}