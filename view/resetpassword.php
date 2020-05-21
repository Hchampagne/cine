<?php
include '../controller/inscription_ctrl.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>resetpassword</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="/cine/assets/css/style.css">
</head>

<body>
    <div class="container-fluid">
        <h2 class="text-center" id="title">mot de passe / reset</h2>
        <hr>
        <div class="row">
            <div class="col">
                <form role="form" method="post" action="">
                    <div class="form-group row justify-content-md-center">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-3">
                            <input type="text" name="email" id="email" class="form-control" value="<?= isset($_POST['email']) ? $_POST['email'] : ""; ?>" placeholder="Votre email">
                            <span class="erreur" id=alertEmail>&nbsp<?= isset($messError['email']) ? $messError['email'] : ""; ?></span>
                        </div>
                    </div>
                    <div class="form-group row justify-content-md-center">
                        <label for="mdp" class="col-sm-2 col-form-label">Mot de passe</label>
                        <div class="col-sm-3">
                            <input type="password" name="mdp" id="mdp" class="form-control" value="" placeholder="Votre mot de passe">
                            <span class="erreur" id="alertMdp">&nbsp<?= isset($messError['mdp']) ? $messError['mdp'] : ""; ?></span>
                        </div>
                    </div>
                    <div class="form-group row justify-content-md-center">
                        <label for="verifmdp" class="col-sm-2 col-form-label">Vérification mot de passe</label>
                        <div class="col-sm-3">
                            <input type="password" name="verifmdp" id="verifmdp" class="form-control" value="" placeholder="vérification de votre mot de passe">
                            <span class="erreur" id="alertVerifMdp">&nbsp<?= isset($messError['verifmdp']) ? $messError['verifmdp'] : ""; ?></span>
                        </div>
                    </div>
                    <div class="form-group row justify-content-md-center">
                        <div class="col-sm-2 col-form-label"></div>
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-md btn-primary" name="valider" id="valider">valider</button>
                            <a href="/cine/index.php" type="btn" class="btn btn-md btn-primary">annuler</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!--
    <script src="/cine/assets/js/inscription.js"></script>
    -->

</body>

</html>