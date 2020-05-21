<?php
//connection base de données et execution de la requete
require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions	
$db = connexionBase(); // Appel de la fonction de connexion

// regex
$regNom = '/^[A-Z][a-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*$/';
$regPrenom = '/^[A-Z][a-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*$/';
$regAge = '/^[1-9][0-9]$/';
$regEmail = '/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/';
$regLogin = '/^[A-Z][a-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*$/';
$regMdp = '/^(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/';
$regSexe ='/^\b(homme|femme)\b$/';

// messages erreurs
$A = "champs vide";
$B = "saisie incorrecte";
$C = "trop long";

//Initialisation du tableau erreurs
$messError = array();

// Vérif du formulaire
if (isset($_POST['valider'])){

    // REQUETE DB verif login déjà utiliser
    $login = htmlspecialchars($_POST['login']);
    $req = $db->prepare("SELECT * FROM utilisateur WHERE uti_login = :veriflogin"); //prep. requete 
    //liaison position variable
    $req->bindValue(':veriflogin', $login, PDO::PARAM_STR);
    $req->execute();
    $veriflogin = $req->fetch(PDO::FETCH_OBJ); //si le login n'existe pas dans la Db l'objet retourné contient false 

    // REQUETE DB verif email déjà utiliser
    $email = htmlspecialchars($_POST['email']);
    $req = $db->prepare("SELECT * FROM utilisateur WHERE uti_mail = :verifemail"); //prep. requete 
    //liaison position variable
    $req->bindValue(':verifemail', $email, PDO::PARAM_STR);
    $req->execute();
    $verifemail = $req->fetch(PDO::FETCH_OBJ); //si l' email n'existe pas dans la Db l'objet retourné contient false 

    
    
    if (!empty($_POST['login'] )) { 
        if (!preg_match($regLogin, ($_POST['login']))) {
            $messError['login'] = $B;
        }
        if (strlen($_POST['login']) > 100 ){
            $messError['login'] = $C;
        }
        if ( $veriflogin != false){
            $messError['login'] = "Dejà utilisé";
        }
    }else {
        $messError['login'] = $A;
    }
    

    //champ nom
    if (!empty($_POST['nom'])){
        if (!preg_match($regNom, ($_POST['nom']))) {
        $messError['nom'] = $B;
        }  
        if (strlen($_POST['nom']) > 100) {
        $messError['nom'] = $C;
        } 
    }else{
        $messError['nom'] = $A;
        } 
        
     //champ prenom
     if (!empty($_POST['prenom'])){       
        if (!preg_match($regPrenom, ($_POST['prenom']))) {
        $messError['prenom'] = $B;
        }
        if (strlen($_POST['prenom']) >100){
        $messError['prenom'] = $C;
        } 
    }else{
        $messError['prenom'] = $A;
    } 
    
     //champ email
     if (!empty($_POST['email'])) {       
        if (!preg_match($regEmail, ($_POST['email']))) {
        $messError['email'] = $B;
        }
        if (strlen($_POST['email']) > 100) {
        $messError['email'] = $C;
        }
        if ( $verifemail != false){
            $messError['email'] = "Dejà utilisé";
        }
    }else{
        $messError['email'] = $A;
    }

    //champ age
    if (!empty($_POST['age'])){       
        if (!preg_match($regAge, ($_POST['age']))) {
            $messError['age'] = $B;
            }
        if (strlen($_POST['age']) >2){
            $messError['age'] = $C;
            } 
    }else{
        $messError['age'] = $A;
    } 

    //champ mdp
    if (!empty($_POST['mdp'])) {
        if (!preg_match($regMdp, ($_POST['mdp']))) {
        $messError['mdp'] = $B;
        }     
        if (strlen($_POST['mdp']) > 60) {
        $messError['mdp'] = $C;
        } 
    }else{
        $messError['mdp'] = $A;
    }

    //verification mot de passe
    if (!empty($_POST['verifmdp'])) {
        if ($_POST['mdp'] != $_POST['verifmdp']) {
        $messError['verifmdp'] = "La vérification du mot de passe est différente";
        }           
    }else{
        $messError['verifmdp'] = $A;
    }  

    // verification sélection H/F
    if (!empty($_POST['sexe'])) {
        if (!preg_match($regSexe, ($_POST['sexe']))) {
        $messError['sexe'] = $B;
        }     
        if (strlen($_POST['sexe']) > 5) {
        $messError['sexe'] = $C;
        } 
    }else{
        $messError['sexe'] = $A;
    }

    
     
    // requete insertion 
    if (count($messError) == 0){ // si tableau erreur vide 
        
        // recup des valeurs du POST formulaire ajout
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $age = htmlspecialchars($_POST['age']);
        //$email = htmlspecialchars($_POST['email']);
        $sexe = htmlspecialchars($_POST['sexe']);
        //$login = htmlspecialchars($_POST['login']);
        $mdp = htmlspecialchars($_POST['mdp']);

        //hash du mot de passe
        $mdpHash = password_hash($mdp, PASSWORD_DEFAULT);

        //prepare la requete
        $requete = $db->prepare("INSERT INTO utilisateur (uti_nom, uti_prenom, uti_mail, uti_age, uti_sexe, uti_login, uti_mdp)
        VALUES(:nom,:prenom,:email,:age,:sexe,:connex,:mdp)"); 

        //liaison position variable
        $requete->bindValue(':nom', $nom, PDO::PARAM_STR);;
        $requete->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $requete->bindValue(':age', $age, PDO::PARAM_STR);
        $requete->bindValue(':email', $email, PDO::PARAM_STR);
        $requete->bindValue(':sexe', $sexe, PDO::PARAM_STR);
        $requete->bindValue(':connex', $login, PDO::PARAM_STR);
        $requete->bindValue(':mdp', $mdpHash, PDO::PARAM_STR);
        
        $requete->execute();
        $requete->closecursor();
      
       header('location: /cine/view/connexion.php'); //redirection connexion  
    }
}
?>  