

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
            <h1 class="mt-5">BLOG ASR Strosberg Yann</h1>
            <p class="lead">Naviguez dans le blog!</p>
            <ul class="list-unstyled">
            </ul>
        </div>
    </div>
    {if isset($smarty.session.notification)}
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-{$smarty.session.notification.result}" role="alert">
                    {$smarty.session.notification.message}
                </div>
            </div>
        </div>
    {/if}
    <div class="row">                              <!-- LISTE LES ARTICLES -->
        {foreach from=$listeArticles item=$article}
            <div class="col-md-6">
                <div class="card" style="">
                    <img src="img/{$article->getId()}.jpg" class="card-img-top mx-auto d-block" alt="{$article->getTitre()}" style="width:300px">
                    <div class="card-body">
                        <h5 class="card-title">{$article->getTitre()}</h5>
                        <p class="card-text">{substr($article->getText(), 0, 150)}...</p>
                        <a href="#" class="btn btn-dark">{$article->getDate()}</a>
                        {if $utilisateurConnecte->isConnect == true}
                            <a href="article.php?action=modifier&id={$article->getId()}" class="btn btn-warning">Modifier</a>
                            <a href="commentaire.php?id={$article->getId()}" class="btn btn-dark float-right ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-right-text" viewBox="0 0 16 16">
                                    <path d="M2 1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9.586a2 2 0 0 1 1.414.586l2 2V2a1 1 0 0 0-1-1H2zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12z"/>
                                    <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                                </svg>
                            </a>
                        {/if}
                       
                    </div>
                </div>
            </div>
        {/foreach}
    </div>
    <!-- PAGINATION -->
    <div class="row mt-3">
        <div class="col-12">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    {for $index=1 to $nbPages}
                        <li class="page-item {if ($page == $index)}active{/if}"><a class="page-link" href="index.php?p={$index}">{$index}</a></li>
                        {/for}
                </ul>
            </nav>
        </div>
    </div>
</div>
