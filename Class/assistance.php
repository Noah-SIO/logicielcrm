<?php 

Class Assistance{
    //Valeur privée
    private $id;
    private $idUtilisateurResponsable;
    private $idUtilisateurProbleme;
    private $date;
    private $solution;
    private $statut;
//Constructeur
    public function __construct($id,$idUtilisateurResponsable,$idUtilisateurProbleme,$date,$solution,$statut){
        $this ->id=$id;
        $this ->idUtilisateurResponsable = $idUtilisateurResponsable;
        $this ->idUtilisateurProbleme=$idUtilisateurProbleme;
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
    public function getIdUtilisateurResponsable() {
        return $this->id_utilisateur_responsable;
    }

    public function setIdUtilisateurResponsable($idUtilisateurResponsable) {
        $this->idUtilisateurResponsable = $idUtilisateurResponsable;
    }
    public function getIdUtilisateurProbleme() {
        return $this->idUtilisateurProbleme;
    }

    public function setIdUtilisateurProbleme($idUtilisateurProbleme) {
        $this->idUtilisateurProbleme = $idUtilisateurProbleme;
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

class ManagerAssistance{
    private $bd;
    public function __construct() {
        $this -> bd = new PDO("mysql:host=localhost;dbname=crm", 'root', '');
    }
}    
?>
