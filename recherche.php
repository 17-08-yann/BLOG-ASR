<?php
require_once 'config/config.conf.php';
require_once 'config/bdd.conf.php';
//print_r2($_SESSION);
//$article = new article();
//$article->hydrate(array());
//print_r2($article);

//print_r2($_GET);
if (isset($_GET['submitRecherche'])) {
    $recherche = $_GET['recherche'];
    $articleManager = new articleManager($bdd);
    $listeArticles = $articleManager->getListArticlesFromRecherche($recherche);
    //print_r2($listeArticles);
//exit();
    include_once 'includes/header.inc.php';
    ?>
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
        <?php if (isset($_SESSION['notification'])) { ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-<?= $_SESSION['notification']['result'] ?>" role="alert">
                        <?= $_SESSION['notification']['message'] ?>
                    </div>
                </div>
            </div>
            <?php
            unset($_SESSION['notification']);
        }
        ?>

        <div class="row">
            <?php
            foreach ($listeArticles as $key => $article) {
                ?>
                <div class="col-md-6">
                    <div class="card" style="">
                        <img src="img/<?= $article->getId(); ?>.jpg" class="card-img-top mx-auto d-block" alt="<?= $article->getTitre(); ?>" style="width:300px">
                        <div class="card-body">
                            <h5 class="card-title"><?= $article->getTitre(); ?></h5>
                            <p class="card-text"><?= substr($article->getText(), 0, 150) . '...'; ?></p>
                            <a href="#" class="btn btn-primary"><?= $article->getDate(); ?></a>
                            <?php if ($utilisateurConnecte->isConnect == true) { ?>
                                <a href="article.php?action=modifier&id=<?= $article->getId(); ?>" class="btn btn-warning">Modifier</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>        
    </div>
    <?php
    include_once 'includes/footer.inc.php';
} else {
    header("Location: index.php");
}
?>
