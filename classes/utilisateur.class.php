<?php

class utilisateur {

    public $id;
    public $prenom;
    public $nom;
    public $mail;
    public $mdp;
    public $sid;

    public function __construct() {
        
    }
    
    //GETTER ET SETTER
    function getId() {
        return $this->id;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getNom() {
        return $this->nom;
    }

    function getMail() {
        return $this->mail;
    }

    function getMdp() {
        return $this->mdp;
    }

    function getSid() {
        return $this->sid;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setPrenom($prenom): void {
        $this->prenom = $prenom;
    }

    function setNom($nom): void {
        $this->nom = $nom;
    }

    function setMail($mail): void {
        $this->mail = $mail;
    }

    function setMdp($mdp): void {
        $this->mdp = $mdp;
    }

    function setSid($sid): void {
        $this->sid = $sid;
    }
    
    //AFFECTE LES DONN2ES CORESPONDANTES
    public function hydrate($donnees) {
        if (isset($donnees['id'])) {
            $this->id = $donnees['id'];
        } else {
            $this->id = '';
        }

        if (isset($donnees['prenom'])) {
            $this->prenom = $donnees['prenom'];
        } else {
            $this->prenom = '';
        }

        if (isset($donnees['nom'])) {
            $this->nom = $donnees['nom'];
        } else {
            $this->nom = '';
        }

        if (isset($donnees['mail'])) {
            $this->mail = $donnees['mail'];
        } else {
            $this->mail = '';
        }

        if (isset($donnees['mdp'])) {
            $this->mdp = $donnees['mdp'];
        } else {
            $this->mdp = '';
        }

        if (isset($donnees['sid'])) {
            $this->sid = $donnees['sid'];
        } else {
            $this->sid = '';
        }
    }

}
