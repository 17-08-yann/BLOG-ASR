<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-08 19:36:42
  from 'C:\wamp64\www\Project\templates\commentaire.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff8b44a0b31a8_18939647',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '80b2e8fffb26e89aadc8e538ac2f3cf606b5082a' => 
    array (
      0 => 'C:\\wamp64\\www\\Project\\templates\\commentaire.tpl',
      1 => 1610134539,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ff8b44a0b31a8_18939647 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12 text-center">
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listArticle']->value, 'article');
$_smarty_tpl->tpl_vars['article']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['article']->do_else = false;
?>
      <div class="col-lg-12 center margin">
        <h1><?php echo $_smarty_tpl->tpl_vars['article']->value->getTitre();?>
</h1>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12 text-center margin">
      <p>Écrit le <b><?php echo $_smarty_tpl->tpl_vars['article']->value->getDate();?>
</b></p>
      <img class="margin" src="img/<?php echo $_smarty_tpl->tpl_vars['article']->value->getId();?>
.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['article']->value->getTitre();?>
" style="width:250px">
    </div>
    <div class="col-lg-12 text-center margin">
      <p><?php echo substr($_smarty_tpl->tpl_vars['article']->value->getText(),0,200);?>
...</p>
    </div>

  </div>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  <center><a href="index.php" class="btn btn-dark">Retour</a></center>
</div>
<?php if ((isset($_SESSION['notification']))) {?>
<div class="row justify-content-center text-center margin">
  <div class="col-lg-6">
    <div class="alert alert-<?php echo $_SESSION['notification']['result'];?>
 mb-0 mt-3" role="alert">
      <?php echo $_SESSION['notification']['message'];?>

    </div>
  </div>
</div>
<?php }?>
<!-- Container Commentaires -->
<div id="comments-container" class="comments-container">
  <h1>Commentaires</h1>
  <div class="tab-pane" id="add-comment">
    <form action="commentaire.php?id=<?php echo $_smarty_tpl->tpl_vars['article']->value->getId();?>
" onsubmit="return checkForm()" method="POST" class="form-horizontal" id="commentForm">

      <input type="hidden" id="id_article" name="id_article" value="<?php echo $_smarty_tpl->tpl_vars['id_article']->value;?>
">

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
  <ul id="comments-list" class="comments-list">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listCommentaire']->value, 'commentaire');
$_smarty_tpl->tpl_vars['commentaire']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['commentaire']->value) {
$_smarty_tpl->tpl_vars['commentaire']->do_else = false;
?>
    <li>
      <!-- Avatar -->
      <div class="comment-avatar"><img src="Images_A_Inserer/profile_com.png" alt=""></div>
      <!-- Contenedor del Comentario -->
      <div class="comment-box">
        <div class="comment-head">
          <h6 class="comment-name"><?php echo $_smarty_tpl->tpl_vars['commentaire']->value->getPseudo();?>
</h6>
          <span><?php echo $_smarty_tpl->tpl_vars['commentaire']->value->getDate();?>
</span>
        </div>
        <div class="comment-content">
          <?php echo $_smarty_tpl->tpl_vars['commentaire']->value->getText();?>

        </div>
      </div>
    </li>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </ul>
</div>
  <!-- vérification des champs-->
<?php echo '<script'; ?>
 src="vendor/jquery/jquery.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
function checkForm(){
  if($("#mail").val() == "" || $("#text").val() == "" || $("#pseudo").val() == "" ) return false
}
<?php echo '</script'; ?>
>
<?php }
}
