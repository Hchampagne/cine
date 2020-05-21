    <?php
    session_unset();   //supprime les données de la session
    session_destroy();  // détruit la session

    header('location: /cine/index.php');
    ?>