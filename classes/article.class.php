<?php

class article {

    public $id;
    public $titre;
    public $texte;
    public $date;
    public $publie;

    public function __construct() {
        
    }

    //GETTER ET SETTER
    function getId() {
        return $this->id;
    }

    function getTitre() {
        return $this->titre;
    }

    function getText() {
        return $this->texte;
    }

    function getDate() {
        return $this->date;
    }

    function getPublie() {
        return $this->publie;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setTitre($titre): void {
        $this->titre = $titre;
    }

    function setText($text): void {
        $this->texte = $text;
    }

    function setDate($date): void {
        $this->date = $date;
    }

    function setPublie($publie): void {
        $this->publie = $publie;
    }
    
    //AFFECTE LES DONNEES CORRESPONDANTES
    public function hydrate($donnees){
        if (isset($donnees['id'])){
            $this->id = $donnees['id'];
        }else {
            $this->id = '';
        }
        
         if (isset($donnees['titre'])){
            $this->titre = $donnees['titre'];
        }else {
            $this->titre = '';
        }
        
        if (isset($donnees['texte'])){
            $this->texte = $donnees['texte'];
        }else {
            $this->texte = '';
        }
        
         if (isset($donnees['date'])){
            $this->date = $donnees['date'];
        }else {
            $this->date = '';
        }
        
          if (isset($donnees['publie'])){
            $this->publie = $donnees['publie'];
        }else {
            $this->publie = 0;
        }
        
    }
    
}
