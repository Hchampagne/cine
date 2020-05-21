<?php
session_start();
include '../controller/liste_ctrl.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>utilisateur</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="/cine/assets/css/style.css">
</head>

<body>

    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Cinéma </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/cine/view/utilisateur.php">Accueil</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">film</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">forum</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">mon compte</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/cine/controller/deconnexion_ctrl.php/">deconnexion</a>
                    </li>
                </ul>              
                <div class="connexion">
                    <span><?= isset($_SESSION['role']) ? $_SESSION['nom']." ".$_SESSION['prenom'] : ""; ?></span>
                </div >  
               
            </div>
        </nav>
        <div class="row text-center">
            <div class="col table-responsive">
                <table class="table table-bordered table-striped">

                    <thead class="thead-light">
                        <tr>
                            <th class="align-middle">afffiche</th>
                            <th class="align-middle">Nom</th>
                            <th class="align-middle">Synopsis</th>
                            <th class="align-middle">Bande annonce</th>
                            <th class="align-middle">commentaires</th>
                            <th class="align-middle">note</th>
                            <th class="align-middle">Date</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                        ?>
                            <tr>

                                <td class="align-middle">
                                    <img class="img-responsive" style="width: 80px; height: 80px;" src="../assets/image/affiche/<?= $row->fil_affiche ?>" alt="" title="<?= $row->fil_nom ?>">
                                </td>
                                <td class="align-middle"><?= $row->fil_nom ?></td>
                                <td class="align-middle"><?= $row->fil_synopsis ?></td>
                                <td class="align-middle"><a href="#" title="<?= $row->fil_nom ?>"><?= $row->fil_nom ?></a></td>
                                <td class="align-middle"><a href="#">commentaires</a> </td>
                                <td class="align-middle"><?= $row->fil_note ?></td>
                                <td class="align-middle"><?= date("d/m/Y", strtotime($row->fil_date)); ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>