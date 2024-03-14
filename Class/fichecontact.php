<?php 

Class Utilisateur{
    private $id;
    private $id_compte;
    private $id_entreprise;
    private $date;
    private $MoyenDeContact;
    private $demande;
    private $reponse;
    private $support;
    private $resume;


    
    public function __construct($id, $id_compte, $id_entreprise, $date, $MoyenDeContact, $demande, $reponse,$support,$resume){
        $this -> id = $id ;
        $this -> id_compte = $id_compte;
        $this -> id_entreprise = $id_entreprise;
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
    public function getId_compte() {
        return $this->id_compte;
    }

    public function setId_compte($id_compte) {
        $this->id_compte = $id_compte;
    }

//  Id_entreprise
    public function getId_entreprise() {
        return $this->id_entreprise;
    }

    public function setId_entreprise($id_entreprise) {
        $this->id_entreprise = $id_entreprise;
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