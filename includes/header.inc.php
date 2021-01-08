<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blog ASR 2020</title>

  <!-- Bootstrap / CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Projet-Blog</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php?p=1">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <?php
          if ($utilisateurConnecte->isConnect == true) {
              ?>
              <li class="nav-item">
                  <a class="nav-link" href="deconnexion.php">deconnexion</a>
              </li>

              <li class="nav-item">
                  <a class="nav-link" href="article.php">Articles</a>
              </li>
              <?php
          } else {
              ?>
              <li class="nav-item">
                  <a class="nav-link" href="connexion.php">Connexion</a>
              </li>

              <?php
          }
          ?>
          <li class="nav-item">
              <a class="nav-link" href="utilisateur.php">Utilisateurs</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>