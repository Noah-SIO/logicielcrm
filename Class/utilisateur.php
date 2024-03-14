<?php 

Class Utilisateur{
    private $id;
    private $nom;
    private $prenom;
    private $identifiants;
    private $profil;
    private $mdp;
    private $email;
    private $numTel;

    
    public function __construct($id, $nom, $prenom, $identifiants, $profil, $mdp, $email,$numTel){
        $this -> id = $id ;
        $this -> nom = $nom;
        $this -> prenom = $prenom;
        $this -> identifiants = $identifiants;
        $this -> profil = $profil;
        $this -> mdp = $mdp;
        $this -> email = $email;
        $this -> numTel = $numTel;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }


    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }


    public function getPrenom() {
        return $this->prenom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }


    public function getIdentifiants() {
        return $this->identifiants;
    }

    public function setIdentifiants($identifiants) {
        $this->identifiants = $identifiants;
    }


    public function getProfil() {
        return $this->profil;
    }

    public function setProfil($profil) {
        $this->profil = $profil;
    }


    public function getMpd() {
        return $this->mdp;
    }

    public function setMdp($mdp) {
        $this->mdp = $mdp;
    }


    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }


    public function getNumtel() {
        return $this->numTel;
    }

    public function setTel($numTel) {
        $this->numTel = $numTel;
    }


}




?>