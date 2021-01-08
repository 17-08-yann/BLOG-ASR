<?php
require_once 'config/config.conf.php';
require_once 'config/bdd.conf.php';

include_once 'includes/header.inc.php';

if($utilisateurConnecte->isConnect == false){
    $_SESSION['notification']['result']='danger';
    $_SESSION['notification']['message']='Vous devez être connecté pour accéder à la page';
    header("Location: connexion.php");
}

if(isset($_POST['submit'])){
    echo "le formulaire est posté";
    //print_r2($_POST);
   // print_r2($_FILES);
    
    $article = new article();
    $article->hydrate($_POST);
    
    $article->setDate(date('Y-m-d'));
    
    $publie = $article->getPublie() === 'on' ? 1 : 0;
    
    $article->setPublie($publie);
    print_r2($article);
    
    //insertion article
    $articleManager = new articleManager($bdd);
    if($_POST['submit'] == 'modifier')
    {
        $articleManager->update($article);
    }
    else
    {
        $articleManager->add($article);
    }
    //var_dump($articleManager);
    //traitement de l'image
    if($_FILES['image']['error'] == 0){
        $fileInfos = pathinfo($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], 'img/' . $articleManager->get_getLastInsertId() . '.' . $fileInfos['extension']);
    }
    if ($articleManager->get_result() == true) {
        $_SESSION['notification']['result'] = 'success';
        $_SESSION['notification']['message'] = 'l\'article a bien été mis à jour';
    } else {
        $_SESSION['notification']['result'] = 'danger';
        $_SESSION['notification']['message'] = 'Une erreur est survenue pendant la création de votre article';
    }
    
    header("Location: index.php?p=1");
    exit();
    
}else{
    $check =0;
    if(!empty($_GET['id']))
    {
        $articleManager = new articleManager($bdd);
        $article = $articleManager->get($_GET['id']);
        $check = 1;
       // print_r2($article);
    }    
    else
    {
      $article = new article();  
      $article->hydrate(array());
    }
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
        <form id=articleform" method="POST" action="article.php" enctype="multipart/form-data">
            <input type="hidden" id="id" name="id" value="<?php echo $article->getId()?>">
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="titre">Titre</label>
                    <input type="text" name="titre" class="form-control" id="titre" value="<?php echo $article->getTitre(); ?>" placeholder="" required>
                </div>
            </div>
            
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="texte">Texte de l'article</label>
                    <textarea name="texte" class="form-control" id="texte" rows="3" required><?php echo $article->getText() ?></textarea>
                </div>
            </div>
            
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="image">L'image de l'article</label>
                    <input type="file" name="image" class="form-control-file" id="image">
                </div>
            </div>
                 
            <div class="col-lg-12">
                <div class="form-group form-check">
                    <input type="checkbox" name="publie" class="form-check-input" id="exampleCheck1" checked="<?php if($check == 1){ echo'checked';} ?>">
                    <label class="form-check-label" for="publie" id="publie" >Article publié ?</label>
                </div>
            </div>
            <div class="col-lg-12">
                <button type="submit" name="submit" value='<?php if($check == 1){ echo 'modifier';} else {echo 'ajouter';}      ?>' id="submit" class="btn btn-primary">  <?php if($check == 1){ echo'Mettre à jour mon article';}  else{echo'Publier mon article';} ?>  </button>
                
            </div>
        </form>
    </div>
</div>
</body>
<?php

}
?>