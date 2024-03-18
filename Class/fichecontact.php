<?php 

Class FicheContact{
    private $id;
    private $idCompte;
    private $idEntreprise;
    private $date;
    private $moyenDeContact;
    private $demande;
    private $reponse;
    private $support;
    private $resume;


    
    public function __construct($idCompte, $idEntreprise, $date, $moyenDeContact, $demande, $reponse,$support,$resume){
        $this -> idCompte = $idCompte;
        $this -> idEntreprise = $idEntreprise;
        $this -> date = $date;
        $this -> moyenDeContact = $moyenDeContact;
        $this -> demande = $demande;
        $this -> reponse = $reponse;
        $this -> support = $support;
        $this -> resume = $resume;
    }

//  id
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

//  Id_compte
    public function getIdCompte() {
        return $this->idCompte;
    }

    public function setIdCompte($idCompte) {
        $this->idCompte = $idCompte;
    }

//  Id_entreprise
    public function getIdEntreprise() {
        return $this->idEntreprise;
    }

    public function setIdEntreprise($idEntreprise) {
        $this->idEntreprise = $idEntreprise;
    }

// Identifiants
    public function getIdentifiants() {
        return $this->identifiants;
    }

    public function setIdentifiants($identifiants) {
        $this->identifiants = $identifiants;
    }

//  Date
    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }

//  Moyen de contact
    public function getMoyenDeContact() {
        return $this->moyenDeContact;
    }

    public function setMoyenDeContact($moyenDeContact) {
        $this->moyenDeContact = $moyenDeContact;
    }

//  Demande
    public function getDemande() {
        return $this->demande;
    }

    public function setDemande($demande) {
        $this->demande = $demande;
    }

// Reponse
    public function getReponse() {
        return $this->reponse;
    }

    public function setReponse($reponse) {
        $this->reponse = $reponse;
    }

//  Support
    public function getSupport() {
        return $this->support;
    }

    public function setSupport($support) {
        $this->support = $support;
    }

//  Resume
    public function getResume() {
        return $this->resume;
    }

    public function setResume($resume) {
        $this->resume = $resume;
    }


}


Class Contact{
    private $bd;
    public function __construct() {
        $this -> bd = new PDO("mysql:host=localhost;dbname=crm", 'root', '');
    }

//creation de la fiche de contact || par Romain
    public function createFicheContact($ficheContact){
        $bd = $this->bd; // Add the missing variable $bd
        $sql = "INSERT INTO contact (id_utilisateur, id_entreprise, date_contact, moyen_contact, demande, reponse, support) VALUES (:idCompte, :idEntreprise, :date_contact, :moyenDeContact, :demande, :reponse, :support)"; // Correct the SQL query
        $req = $bd->prepare($sql); // Use the correct variable $bd
        $req->execute(array(
            'id_utilisateur' => $ficheContact->getIdCompte(),
            'id_entreprise' => $ficheContact->getIdEntreprise(),
            'date_contact' => $ficheContact->getDate(),
            'moyen_contact' => $ficheContact->getMoyenDeContact(),
            'demande' => $ficheContact->getDemande(),
            'reponse' => $ficheContact->getReponse(),
            'support' => $ficheContact->getSupport()
        ));
    }


}




?>