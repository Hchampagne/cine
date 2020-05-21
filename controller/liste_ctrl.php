<?php	
    require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions	
    $db = connexionBase(); // Appel de la fonction de connexion	
    // requete sur la table film ne prends que les enregistrements validés tris par id
    $requete = "SELECT * FROM film WHERE fil_validation = 1  ORDER BY fil_id asc";		
    $result = $db->query($requete);		
?>