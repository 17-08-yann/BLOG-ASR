<?php

class commentaire {

  public $id;
  public $id_article;
  public $pseudo;
  public $mail;
  public $texte;
  public $date;

  public function __construct() {

  }
  
  // GETER ET SETER \\
  function getId() {
    return $this->id;
  }

  function getId_article() {
    return $this->id_article;
  }

  function getPseudo() {
    return $this->pseudo;
  }

  function getMail() {
    return $this->mail;
  }

  function getText() {
    return $this->texte;
  }

  function getDate() {
    return $this->date;
  }

  function setId($id): void {
    $this->id = $id;
  }

  function setId_article($id_article): void {
    $this->id_article = $id_article;
  }

  function setNom($pseudo): void {
    $this->pseudo = $pseudo;
  }

  function setMail($mail): void {
    $this->mail = $mail;
  }

  function setText($texte): void {
    $this->texte = $texte;
  }

  function setDate($date): void {
    $this->date = $date;
  }
  
  //FONCTION HYDRATE : AFFECTUE LES VALEURS DONNEES A UN OBJET 
  function hydrate($donnees): void {
    if (isset($donnees['id'])) {
      $this->id = $donnees['id'];
    } else {
      $this->id = '';
    }

    if (isset($donnees['id_article'])) {
      $this->id_article = $donnees['id_article'];
    } else {
      $this->id_article = '';
    }

    if (isset($donnees['pseudo'])) {
      $this->pseudo = $donnees['pseudo'];
    } else {
      $this->pseudo = '';
    }

    if (isset($donnees['mail'])) {
      $this->mail = $donnees['mail'];
    } else {
      $this->mail = '';
    }

    if (isset($donnees['texte'])) {
      $this->texte = $donnees['texte'];
    } else {
      $this->texte = '';
    }

    if (isset($donnees['date'])) {
      $this->date = $donnees['date'];
    } else {
      $this->date = '';
    }
  }

}
