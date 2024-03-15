<?php 

Class Assistance{
    //Valeur privée
    private $id;
    private $id_utilisateur_responsable;
    private $id_utilisateur_probleme;
    private $date;
    private $solution;
    private $statut;
//Constructeur
    public function __construct($id,$id_utilisateur_responsable,$id_utilisateur_probleme,$date,$solution,$statut){
        $this ->id=$id;
        $this ->id_utilisateur_responsable = $id_utilisateur_responsable;
        $this ->id_utilisateur_probleme=$id_utilisateur_probleme;
        $this ->date=$date;
        $this ->solution=$solution;
        $this ->statut=$statut;
    }
    //Fonction Get et Set
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    public function getId_utilisateur_responsable() {
        return $this->id_utilisateur_responsable;
    }

    public function setId_utilisateur_responsable($id_utilisateur_responsable) {
        $this->id_utilisateur_responsable = $id_utilisateur_responsable;
    }
    public function getId_utilisateur_probleme() {
        return $this->id_utilisateur_probleme;
    }

    public function setId_utilisateur_probleme($id_utilisateur_probleme) {
        $this->id_utilisateur_probleme = $id_utilisateur_probleme;
    }
    public function getDate() {
        return $this->date;
    }

    public function setNumClient($date) {
        $this->date = $date;
    }
    public function getsolution() {
        return $this->solution;
    }

    public function setSolution($solution) {
        $this->solution = $solution;
    }
    public function getStatut() {
        return $this->statut;
    }

    public function setStatut($statut) {
        $this->statut = $statut;
    }
}

class ManagerEntreprise{
    private $bd;
    public function __construct() {
        $this -> bd = new PDO("mysql:host=localhost;dbname=crm", 'root', '');
    }
}    
?>
