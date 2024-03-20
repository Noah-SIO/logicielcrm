<?php 

Class RappelAlerte{
    //Valeur privée
    private $id;
    private $dateDebut;
    private $dateFin;
    private $type;
    private $utilisateurExp;
    private $utilisateurDest;
    private $sujet;
    private $societeConcerne;
    private $contenu;
    private $statut;
//Constructeur
    public function __construct($id,$dateDebut,$dateFin,$type,$utilisateurExp,$utilisateurDest,$sujet,$societeConcerne,$contenu,$statut){
        $this ->id=$id;
        $this -> dateDebut = $dateDebut;
        $this ->dateFin=$dateFin;
        $this ->type=$type;
        $this ->utilisateurExp=$utilisateurExp;
        $this ->utilisateurDest=$utilisateurDest;
        $this ->sujet=$sujet;
        $this ->societeConcerne=$societeConcerne;
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
        return $this->dateDebut;
    }

    public function setDateDebut($dateDebut) {
        $this->dateDebut = $dateDebut;
    }
    public function getDateFin() {
        return $this->dateFin;
    }

    public function setDateFin($dateFin) {
        $this->dateFin = $dateFin;
    }
    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }
    public function getUtilisateurEXP() {
        return $this->utilisateurExp;
    }

    public function setUtilisateurEXP($utilisateurExp) {
        $this->utilisateurExp = $utilisateurExp;
    }
    public function getUtilisateurDEST() {
        return $this->utilisateurDest;
    }

    public function setUtilisateurDEST($utilisateurDest) {
        $this->utilisateurDest = $utilisateurDest;
    }
    public function getSujet() {
        return $this->sujet;
    }

    public function setSujet($sujet) {
        $this->sujet = $sujet;
    }
    public function getSociete() {
        return $this->societeConcerne;
    }

    public function setSociete($societeConcerne) {
        $this->societeConcerne = $societeConcerne;
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
    

    public function sendAlerteRappel($rappelAlerte){
        
    }
}
?>    
