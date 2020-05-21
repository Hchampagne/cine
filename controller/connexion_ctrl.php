<?php
session_start();  //attribut valeur de la DB à SESSION

//regex
$regMdp = '/(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*/';
$regLogin = '/^[A-Z][a-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*$/';

// messages erreurs
$A = "champs vide";
$B = "saisie incorrecte";
$C = "trop long";

//Initialisation du tableau erreurs
$messError = array();

//connection base de données et execution de la requete
require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions	
$db = connexionBase(); // Appel de la fonction de connexion


// Vérif de connection
if (isset($_POST['connexion'])) {

    $login = htmlspecialchars($_POST['login']);

    //controle formulaire

    if (!empty($_POST['login'])) {
        if (!preg_match($regLogin, ($_POST['login']))) {
            $messError['login'] = $B;
        }
        if (strlen($_POST['login']) > 100) {
            $messError['login'] = $C;
        }
    } else {
        $messError['login'] = $A;
    }

    //champ mdp
    if (!empty($_POST['mdp'])) {
        if (!preg_match($regMdp, ($_POST['mdp']))) {
            $messError['mdp'] = $B;
        }
        if (strlen($_POST['mdp']) > 60) {
            $messError['mdp'] = $C;
        }
    } else {
        $messError['mdp'] = $A;
    }

    // connexion
    if (count($messError) == 0) { // si tableau erreur vide 

        $requete = $db->prepare("SELECT * FROM utilisateur WHERE uti_login = :connex");
        //liaison position variable
        $requete->bindValue(':connex', $login, PDO::PARAM_STR);
        $requete->execute();
        $row = $requete->fetch(PDO::FETCH_OBJ);
        $requete->closecursor();

        if ($row != false) {          // si l'identifiant n'existe ps la requete retourne false

            if (password_verify($_POST['mdp'], $row->uti_mdp)) {  //si login existe => compare mdp entrée avec mdp enregistrée               
                
                session_start();  //attribut valeur de la DB à SESSION
                $_SESSION['nom'] = $row->uti_nom;            
                $_SESSION['prenom'] = $row->uti_prenom;
                $_SESSION['Email'] = $row->uti_mail;
                $_SESSION['role'] = $row->uti_role;

                if ($row->uti_role == "1") {
                    header('location: /cine/view/administrateur.php');
                } elseif ($row->uti_role == "0") {
                    header('location: /cine/view/utilisateur.php');
                } else {
                    header('location: /index.php');
                }
            } else {
                // sinon mdp incorrecte 
                session_unset();   //supprime les données de la session
                session_destroy();  // détruit la session
                $message = "Le mot de passe n'est pas correcte!"; // message erreur mot de passe         
            }
        } else {
            // sinon identifiant non trouvé
            session_unset();  // supprime les données de session
            session_destroy();  //détruit la session
            $message = "L'identifiant est inconnu"; // message erreur identifiant 
        }
    }
}
