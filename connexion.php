<?php
require_once 'config/config.conf.php';
require_once 'config/bdd.conf.php';

include_once 'includes/header.inc.php';

if(isset($_POST['submit'])){
   // print_r2($_POST);
    //print_r2($_FILES);

    $utilisateur= new utilisateur();
    $utilisateur->hydrate($_POST);


   // print_r2($test);

    $utilisateurManager = new utilisateurManager($bdd);
    $utilisateurbdd = $utilisateurManager->getByMail($utilisateur->getMail());

    $isConnect = password_verify($utilisateur->getMdp(), $utilisateurbdd->getMdp());

    print_r2($utilisateurbdd);

    var_dump($isConnect);

    if($isConnect == true){
        $sid = md5($utilisateurbdd->getMail() . time() );
        setcookie('sid', $sid , time() + 86400);
        $utilisateur->setSid($sid);
        $utilisateurManager->updateByMail($utilisateur);


    }

    //Traitement de l'image

    if($isConnect==true){
        $_SESSION['notification']['result']='success';
        $_SESSION['notification']['message']='Connecté';
        header("Location: index.php?p=1");

    }else{
    $_SESSION['notification']['result']='danger';
    $_SESSION['notification']['message']='Une erreur est survenue pendant la connection';
    header("Location: index.php?p=1");
    }

    exit();
    
}else{
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
        <form id=utilisateurform" method="POST" action="connexion.php" enctype="multipart/form-data">
            
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="mail">Mail de l'utilisateur</label>
                    <input type="mail" name="mail" class="form-control" id="mail" value="" placeholder="" required>
                </div>
            </div>
            
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="mdp">Mdp de l'utilisateur</label>
                    <input type="password" name="mdp" class="form-control" id="mdp" value="" placeholder="" required>
                </div>
            </div>
                 
            <!--<div class="col-lg-12">
                <div class="form-group form-check">
                    <input type="checkbox" name="publie" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="publie" id="publie">Article publié ?</label>
                </div>
            </div>-->
            
            <div class="col-lg-12">
                <button type="submit" name="submit" id="submit" class="btn btn-primary">Se connecter</button>
            </div>
        </form>
    </div>
</div>
</body>
<?php
}
?>
