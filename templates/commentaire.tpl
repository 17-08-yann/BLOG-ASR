<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12 text-center">
      {foreach from=$listArticle item=$article}
      <div class="col-lg-12 center margin">
        <h1>{$article->getTitre()}</h1>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12 text-center margin">
      <p>Écrit le <b>{$article->getDate()}</b></p>
      <img class="margin" src="img/{$article->getId()}.jpg" alt="{$article->getTitre()}" style="width:250px">
    </div>
    <div class="col-lg-12 text-center margin">
      <p>{substr($article->getText(), 0, 200)}...</p>
    </div>

  </div>
  {/foreach}
  <center><a href="index.php" class="btn btn-dark">Retour</a></center>
</div>
{if isset($smarty.session.notification)}
<div class="row justify-content-center text-center margin">
  <div class="col-lg-6">
    <div class="alert alert-{$smarty.session.notification.result} mb-0 mt-3" role="alert">
      {$smarty.session.notification.message}
    </div>
  </div>
</div>
{/if}
<!-- Container Commentaires -->
<div id="comments-container" class="comments-container">
  <h1>Commentaires</h1>
  <div class="tab-pane" id="add-comment">
    <!-- formulaire de commentaire -->
    <form action="commentaire.php?id={$article->getId()}" onsubmit="return checkForm()" method="POST" class="form-horizontal" id="commentForm">

      <input type="hidden" id="id_article" name="id_article" value="{$id_article}">

      <div class="form-group">
        <div class="col-sm-offset-2 col-lg-12 text-center">
          <input placeholder="Mail" type="mail" class="form-control" id="mail" name="mail" value="">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-lg-12 text-center">
          <input placeholder="Pseudo" type="text" class="form-control" id="pseudo" name="pseudo" value="">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-lg-12 text-center">
          <textarea placeholder="Votre commentaire" class="form-control" name="text" id="text" rows="5"></textarea>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-lg-12 text-center">
          <button type="submit" id="submitComment" class="btn btn-info" name="addComment" value="addComment">Ajouter un commentaire</button>
        </div>
      </div>
    </form>
  </div>
  <!-- liste des commentaires-->
  <ul id="comments-list" class="comments-list">
    {foreach from=$listCommentaire item=$commentaire}
    <li>      
      <!-- contenu du commentaire -->
      <div class="comment-box">
        <div class="comment-head">
          <h6 class="comment-name">{$commentaire->getPseudo()}</h6>
          <span>{$commentaire->getDate()}</span>
        </div>
        <div class="comment-content">
          {$commentaire->getText()}
        </div>
      </div>
    </li>
    {/foreach}
  </ul>
</div>
  <!-- vérification des champs-->
<script src="vendor/jquery/jquery.js"></script>
<script>
function checkForm(){
  if($("#mail").val() == "" || $("#text").val() == "" || $("#pseudo").val() == "" ) return false
}
</script>
