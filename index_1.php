<?php
require_once 'config/config.conf.php';
require_once 'config/bdd.conf.php';
//$article = new article();
//$articleManager = new articleManager($bdd);
//print_r2($articleManager);

$page = !empty($_GET['p']) ? $_GET['p'] :1;

$articleManager= new articleManager($bdd);

$nbArticlesTotalAPublie = $articleManager->countArticlesPublie();

$indexDepart = ($page - 1) * nb_articles_par_page;

$nbPages = ceil($nbArticlesTotalAPublie / nb_articles_par_page);

$listeArticles = $articleManager->getListArticlesAAfficher($indexDepart, nb_articles_par_page);
//print_r2($listeArticles);

include_once 'includes/header.inc.php';
?>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center mt-5">
            <form class="form-inline" id="rechercheForm" method="GET" action="recherche.php" >
                <label class="sr-only" for="recherche">Recherche</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="recherche" placeholder="Rechercher un article" name="recherche" value="">
               <button type="submit" class="btn btn-primary mb-2" name="submitRecherche">Rechercher</button>
            </form>
        </div>
    </div>
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
    <?php if(isset( $_SESSION['notification'])) { ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-12 text-center">
                <div class="alert alert-<?= $_SESSION['notification']['result']?>" role="alert">
                    <?=  $_SESSION['notification']['message'] ?>
                </div>
            </div>
    </div>
        <?php
        unset( $_SESSION['notification']);
       }
        ?>
    <div class="row">
        <?php
        foreach ($listeArticles as $key => $article) {
        ?>
        <div class="col-md-6">
            <div class="card" style="">
            <img src="img/<?=$article->getId();?>.jpg" class="card-img-top" alt="<?= $article->getTitre(); ?>" style="width:300px">
                <div class="card-body">
                    <h5 class="card-title"><?= $article->getTitre();?></h5>
                <p class="card-text"><?= substr($article->getText(), 0, 150) . '...';?></p>
                <a href="#" class="btn btn-primary"><?= $article->getDate();?></a>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
        </div>
        <div class="row">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <?php
                        for ($index = 1; $index <=$nbPages; $index++)
                        {
                    ?>
                        <li class="page-item <?php if($page == $index) { ?> active <?php } ?>"><a class="page-link" href="index.php?p=<?=$index?>"> <?= $index?></a></li>

                    <?php
                        }
                    
                    ?>
                    
                </ul>
            </nav>
        </div>
        <?php
        include_once 'includes/footer.inc.php';
        ?>