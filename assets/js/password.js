var bouton=document.getElementById("resetmdp"); 
bouton.addEventListener("click",envoy);
function envoy()                 
{
	
    var regMail = /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/;

    var A="le champ n'est pas rempli !";
	var B="Sasie incorrecte !";
		
    var email=document.getElementById("email").value;            // valeur E-mail

    if (email==""){                                        // controle E-mail
        event.preventDefault();							  	//idem que controle du nom 
        document.getElementById("alertEmail").innerHTML=A;} 		
    else if (regMail.test(email)==false){                       
        event.preventDefault();
        document.getElementById("alertEmail").innerHTML=B;}
    else{document.getElementById("alertEmail").innerHTML="&nbsp";}

    

}