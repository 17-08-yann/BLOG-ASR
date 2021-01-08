<?php

class utilisateurManager {

// DECLARATION ET INSTANCIATIONS
    private $bdd; // Instance PDO
    private $_result;
    private $_message;
    private $_utilisateur; // Instance utilisateur
    private $_getLastInsertId;

    public function __construct(PDO $bdd) {
        $this->setBdd($bdd);
    }

    // GETER ET SETER
    public function getBdd() {
        return $this->bdd;
    }

    public function get_result() {
        return $this->_result;
    }

    public function get_message() {
        return $this->_message;
    }

    public function get_utilisateur() {
        return $this->_utilisateur;
    }

    function get_getLastInsertId() {
        return $this->_getLastInsertId;
    }

    function set_getLastInsertId($_getLastInsertId): void {
        $this->_getLastInsertId = $_getLastInsertId;
    }

    public function setBdd($bdd): void {
        $this->bdd = $bdd;
    }

    public function set_result($_result): void {
        $this->_result = $_result;
    }

    public function set_message($_message): void {
        $this->_message = $_message;
    }

    public function set_utilisateur($_utilisateur): void {
        $this->_utilisateur = $_utilisateur;
    }

    public function get($id) {
        $sql = 'SELECT * FROM utilisateurs WHERE id = :id';
        $req = $this->bdd->prepare($sql);

        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();

        $donnees = $req->fetch(PDO::FETCH_ASSOC);

        $utilisateur = new utilisateur();

        $utilisateur->hydrate($donnees);

        return $utilisateur;
    }

    public function getList() {
        $listUtilisateur = [];
        $sql = 'SELECT id, '
                . 'prenom, '
                . 'nom, '
                . 'mail, '
                . 'mdp, '
                . 'sid '
                . 'FROM utilisateurs';
        $req = $this->bdd->prepare($sql);

        $req->execute();

        while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
            $utilisateur = new utilisateur();
            $utilisateur->hydrate($donnees);
            $listUtilisateur[] = $utilisateur;
        }

        return $listUtilisateur;
    }

    // AJOUT D'UN NOUVEL UTILISATEUR
    public function add(utilisateur $utilisateur) {
        $sql = "INSERT INTO utilisateurs "
                . "(nom, prenom, mail, mdp, sid) "
                . "VALUES (:prenom, :nom, :mail, :mdp, :sid)";
        $req = $this->bdd->prepare($sql);

        $req->bindValue(':prenom', $utilisateur->getPrenom(), PDO::PARAM_STR);
        $req->bindValue(':nom', $utilisateur->getNom(), PDO::PARAM_STR);
        $req->bindValue(':mail', $utilisateur->getMail(), PDO::PARAM_STR);
        $req->bindValue(':mdp', $utilisateur->getMdp(), PDO::PARAM_STR);
        $req->bindValue(':sid', $utilisateur->getSid(), PDO::PARAM_STR);

        $req->execute();
        if ($req->errorCode() == 00000) {
            $this->_result = true;
            $this->_getLastInsertId = $this->bdd->lastInsertId();
        } else {
            return FALSE;
        }
    }

    //RECUËRATION DE L'USER GRACE AU MAIL
    public function getByMail($mail) {

        $sql = "SELECT * FROM utilisateurs WHERE mail=:mail";
        $req = $this->bdd->prepare($sql);

        $req->bindValue(":mail", $mail, PDO::PARAM_STR);
        $req->execute();

        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        $utilisateur = new utilisateur();
        $utilisateur->hydrate($donnees);
        return $utilisateur;
    }

    //RECUËRATION DE L'USER GRACE AU SID
    public function getBySid($sid) {

        $sql = "SELECT * FROM utilisateurs WHERE sid=:sid";
        $req = $this->bdd->prepare($sql);

        $req->bindValue(":sid", $sid, PDO::PARAM_STR);
        $req->execute();

        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        $utilisateur = new utilisateur();
        $utilisateur->hydrate($donnees);
        return $utilisateur;
    }

    //MISE A JOUR DE L'USER GRACE AU MAIL
    public function updateByMail(utilisateur $users) {

        $sql = "update utilisateurs set Sid = :Sid where Mail = :Mail";
        $req = $this->bdd->prepare($sql);
        $req->bindValue(':Sid', $users->getSid(), PDO::PARAM_STR);
        $req->bindValue(':Mail', $users->getMail(), PDO::PARAM_STR);
        $req->execute();

        if ($req->errorcode() == 00000) {
            $this->result = true;
        } else {
            $this->result = false;
        }
    }

}
