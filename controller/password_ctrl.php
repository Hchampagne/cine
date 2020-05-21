<?php	
   

    //regex
    $regEmail = '/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/';
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
    
    //Initialisation du tableau erreurs
    $messError = array();
    
    // Vérif de connection
    if (isset($_POST['resetmdp'])) {
    
        $email = htmlspecialchars($_POST['email']);
        $login = htmlspecialchars($_POST['login']);
        //controle formulaire    
        if (!empty($_POST['email'])) {
            if (!preg_match($regEmail, ($_POST['email']))) {
                $messError['email'] = $B;
            }
            if (strlen($_POST['email']) > 100) {
                $messError['email'] = $C;
            }
        } else {
            $messError['email'] = $A;
        }

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

        if(count($messError) == 0){

            $requete = $db->prepare("SELECT * FROM utilisateur WHERE uti_mail = :email");
            //liaison position variable
            $requete->bindValue(':email', $email, PDO::PARAM_STR);
            $requete->execute(); 
            $row = $requete->fetch(PDO::FETCH_OBJ);
            $requete->closecursor();

                if ($row != false) { 

                    if($row->uti_login == $login){                       
                        // envoie email avec lien pour reset mot de passe 
                        // change adresse lien en prod
                        $message="un mail de confirmation vous a été envoyé";
                        $lien='http://localhost/cine/view/resetpassword.php'; 
                        mail($email,"récup mot de passe",'Cliquez sur le lien : '.$lien);                       
                    }else{                      
                        // sinon identifiant non trouvé                       
                        $message = "L'identifiant est inconnu"; // message erreur identifiant 
                    }
                }else{
                    // sinon identifiant non trouvé                   
                    $message = "Votre email est inconnu"; // message erreur identifiant 
                }

        }
            
        
    }
