<?php
require_once 'config/config.conf.php';
require_once 'config/bdd.conf.php';

include_once 'includes/header.inc.php';

if (isset($_POST['submit'])) {

    $utilisateur = new utilisateur();
    $utilisateur->hydrate($_POST);
    $utilisateur->setMdp(password_hash($utilisateur->getMdp(), PASSWORD_DEFAULT));

    //insertion utilisateur
    $utilisateurManager = new utilisateurManager($bdd);
    $utilisateurManager->add($utilisateur);
    //var_dump($utilisateurManager);


    if ($utilisateurManager->get_result() == true) {
        $_SESSION['notification']['result'] = 'success';
        $_SESSION['notification']['message'] = 'Utilisateur créé.';
    } else {
        $_SESSION['notification']['result'] = 'danger';
        $_SESSION['notification']['message'] = 'Une erreur est survenue pendant la création de votre utilisateur';
    }
    header("Location: index.php?p=1");
    exit();
} else {
    //echo "Aucun formulaire n'est posté";
    include_once 'includes/header.inc.php';
    ?>

    <body>
        <!-- Page Content -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="mt-5">A Bootstrap 4 Starter Template</h1>
                    <p class="lead">Complete with pre-defined file paths and responsive navigation!</p>
                    <ul class="list-unstyled">
                        <li>Bootstrap 4.5.0</li>
                        <li>jQuery 3.5.1</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <form id=utilisateurform" method="POST" action="utilisateur.php" enctype="multipart/form-data">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="nom">Prenom de l'utilisateur</label>
                            <input type="text" name="nom" class="form-control" id="nom" value="" placeholder="" required>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="prenom">Nom de l'utilisateur</label>
                            <input type="text" name="prenom" class="form-control" id="prenom" value="" placeholder="" required>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="email">Email de l'utilisateur</label>
                            <input type="email" name="email" class="form-control" id="email" value="" placeholder="" required>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="mdp">Mdp de l'utilisateur</label>
                            <input type="pwd" name="mdp" class="form-control" id="mdp" value="" placeholder="" required>
                        </div>
                    </div>            
                    <div class="col-lg-12">
                        <button type="submit" name="submit" id="submit" class="btn btn-primary">Créer mon utilisateur</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
    <?php
}
?>