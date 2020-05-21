    <?php	
    function connexionBase()	
    {	
       // Paramètre de connexion serveur	
       $host = "localhost";	
       $login= "root";     // Votre loggin d'accès au serveur de BDD 	
       $password="";    // Le mot de passe pour vous identifier auprès du serveur	
       $base = "cine";    // La base de données avec laquelle vous voulez travailler 	
       try 	
       {	
            $db = new PDO('mysql:host='.$host.':3306;charset=utf8;dbname=' .$base, $login, $password);	
            return $db;	
        } 	
        catch (Exception $e) 	
        {	// en cas d'erreur
            echo 'Erreur : ' . $e->getMessage() . '<br>';	
            echo 'N° : ' . $e->getCode() . '<br>';	
            die('Connexion au serveur impossible.');	
        } 	
    }	
    ?>