<?php

class commentaireManager
{

  
  private $bdd; // Instance PDO
  private $result;
  private $message;
  private $commentaire; // Instance Commentaire
  private $getLastInsertId;

  public function __construct(PDO $bdd)
  {
    $this->setBdd($bdd);
  }
  //GETER ET SETER \\
  function getBdd()
  {
    return $this->bdd;
  }

  function getResult()
  {
    return $this->result;
  }

  function getMessage()
  {
    return $this->message;
  }

  function getCommentaire()
  {
    return $this->commentaire;
  }

  function getGetLastInsertId()
  {
    return $this->getLastInsertId;
  }

  function setBdd($bdd): void
  {
    $this->bdd = $bdd;
  }

  function setResult($result): void
  {
    $this->result = $result;
  }

  function setMessage($message): void
  {
    $this->message = $message;
  }

  function setCommentaire($commentaire): void
  {
    $this->commentaire = $commentaire;
  }

  function setGetLastInsertId($getLastInsertId): void
  {
    $this->getLastInsertId = $getLastInsertId;
  }

  public function get($id)
  {
    // PREPARE UNE REQUETE SELECT
    $sql = 'SELECT * FROM commentaire WHERE id = :id';
    $req = $this->bdd->prepare($sql);

    // EXECUTE LA REQUETE
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->execute();

    // CREEATION TABLEAU DE DONNEES
    $donnees = $req->fetch(PDO::FETCH_ASSOC);

    $commentaire = new commentaire();
    $commentaire->hydrate($donnees);

   
    return $commentaire;
  }

  public function getList()
  {
    $listCommentaire = [];

    // RECUPERATION DES DONNEES
    $sql = 'SELECT id, '
    . 'id_article, '
    . 'pseudo, '
    . 'mail, '
    . 'texte, '
    . 'FROM commentaire';
    $req = $this->bdd->prepare($sql);

    // EXECUTE LA REQUETE
    $req->execute();

    // On stocke les données obtenues dans un tableau.
    while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
      $commentaire = new commentaire();
      $commentaire->hydrate($donnees);
      $listCommentaire[] = $commentaire;
    }
    return $listCommentaire;
  }

  //AJOUT D'UN COMMENTAIRE 
  public function add(commentaire $commentaire) {
    $sql = "INSERT INTO commentaire "
    . "(id_article, pseudo, mail, text) "
    . "VALUES (:id_article, :pseudo, :mail, :text)";
    $req = $this->bdd->prepare($sql);
    
    // SECURISATION DES DONNEES
    $req->bindValue(':id_article', $commentaire->getId_article(), PDO::PARAM_INT);
    $req->bindValue(':pseudo', $commentaire->getPseudo(), PDO::PARAM_STR);
    $req->bindValue(':mail', $commentaire->getMail(), PDO::PARAM_STR);
    $req->bindValue(':text', $commentaire->getText(), PDO::PARAM_STR);
    
    //EXECUTE
    $req->execute();
    if ($req->errorCode() == 00000) {
      $this->result = true;
      $this->getLastInsertId = $this->bdd->lastInsertId();
    } else {
      $this->result = false;
    }
    return $this;
  }

  //Fonction pour compter le nombre de commentaires par article
  public function count(){
    $sql = "SELECT id_article, COUNT(*) as nb FROM commentaire GROUP BY id_article";
    $req = $this->bdd->prepare($sql);
    $req->execute();
    return $req->fetchAll(PDO::FETCH_ASSOC);
  }

  //Fonction pour afficher les commentaires de l'article
  public function getListCommentaireAAfficher($id_article) {
    $listCommentaire = [];

    // Prépare une requête de type SELECT avec une clause WHERE selon l'id
    $sql = 'SELECT * FROM commentaire WHERE id_article = :id_article';
    $req = $this->bdd->prepare($sql);

    // Exécution de la requête avec attribution des valeurs aux marqueurs nominatifs
    $req->bindValue(':id_article', $id_article, PDO::PARAM_INT);
    $req->execute();

    // On stocke les données obtenues dans un tableau.
    while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
      $commentaire = new commentaire();
      $commentaire->hydrate($donnees);
      $listCommentaire[] = $commentaire;
    }
    //print_r2($listCommentaire);
    return $listCommentaire;
  }

 }
