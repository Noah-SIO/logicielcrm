<?php 

Class Utilisateur{
    private $id;
    private $idCompte;
    private $idEntreprise;
    private $date;
    private $MoyenDeContact;
    private $demande;
    private $reponse;
    private $support;
    private $resume;


    
    public function __construct($id, $idCompte, $idEntreprise, $date, $MoyenDeContact, $demande, $reponse,$support,$resume){
        $this -> id = $id ;
        $this -> idCompte = $idCompte;
        $this -> idEntreprise = $idEntreprise;
        $this -> date = $date;
        $this -> MoyenDeContact = $MoyenDeContact;
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
        return $this->MoyenDeContact;
    }

    public function setMoyenDeContact($MoyenDeContact) {
        $this->MoyenDeContact = $MoyenDeContact;
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
        return $this->reporesumense;
    }

    public function setResume($resume) {
        $this->resume = $resume;
    }


}




?>