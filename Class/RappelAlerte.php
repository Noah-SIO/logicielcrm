<?php 

Class RappelAlerte{
    //Valeur privée
    private $id;
    private $date_debut;
    private $date_fin;
    private $type;
    private $utilisateur_exp;
    private $utilisateur_dest;
    private $sujet;
    private $societe_concerne;
    private $contenu;
    private $statut;
//Constructeur
    public function __construct($id,$date_debut,$date_fin,$type,$utilisateur_exp,$utilisateur_dest,$sujet,$societe_concerne,$contenu,$statut){
        $this ->id=$id;
        $this -> date_debut = $date_debut;
        $this ->date_fin=$date_fin;
        $this ->type=$type;
        $this ->utilisateur_exp=$utilisateur_exp;
        $this ->utilisateur_dest=$utilisateur_dest;
        $this ->sujet=$sujet;
        $this ->societe_concerne=$societe_concerne;
        $this ->contenu=$contenu;
        $this ->statut=$statut;
    }
    //Fonction Get et Set
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    public function getDateDebut() {
        return $this->date_debut;
    }

    public function setDateDebut($date_debut) {
        $this->date_debut = $date_debut;
    }
    public function getDateFin() {
        return $this->date_fin;
    }

    public function setDateFin($date_fin) {
        $this->date_fin = $date_fin;
    }
    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }
    public function getUtilisateurEXP() {
        return $this->utilisateur_exp;
    }

    public function setUtilisateurEXP($utilisateur_exp) {
        $this->utilisateur_exp = $utilisateur_exp;
    }
    public function getUtilisateurDEST() {
        return $this->utilisateur_dest;
    }

    public function setUtilisateurDEST($utilisateur_dest) {
        $this->utilisateur_dest = $utilisateur_dest;
    }
    public function getSujet() {
        return $this->sujet;
    }

    public function setSujet($sujet) {
        $this->sujet = $sujet;
    }
    public function getSociete() {
        return $this->societe_concerne;
    }

    public function setSociete($societe_concerne) {
        $this->societe_concerne = $societe_concerne;
    }
    public function getContenu() {
        return $this->contenu;
    }

    public function setContenu($contenu) {
        $this->contenu = $contenu;
    }
    public function getStatut() {
        return $this->statut;
    }

    public function setStatut($statut) {
        $this->statut = $statut;
    }
}
class ManagerRappelAlerte{
    private $bd;
    public function __construct() {
        $this -> bd = new PDO("mysql:host=localhost;dbname=crm", 'root', '');
    }
    
}
?>    