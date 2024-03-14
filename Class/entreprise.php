<?php 

Class Entreprise{
    //Valeur privée
    private $id;
    private $nom;
    private $prenom;
    private $numClient;
    private $societe;
    private $poste;
    private $email;
    private $idCommercial;
    private $dateCreationCompte;
//Constructeur
    public function __construct($id,$nom,$prenom,$numClient,$societe,$poste,$email,$idCommercial,$dateCreationCompte){
        $this ->id=$id;
        $this -> nom = $nom;
        $this ->prenom=$prenom;
        $this ->numClient=$numClient;
        $this ->societe=$societe;
        $this ->poste=$poste;
        $this ->email=$email;
        $this ->idCommercial=$idCommercial;
        $this ->dateCreationCompte=$dateCreationCompte;
    }
    //Fonction Get et Set
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
    public function getNumClient() {
        return $this->numClient;
    }

    public function setNumClient($numClient) {
        $this->numClient = $numClient;
    }
    public function getSociete() {
        return $this->societe;
    }

    public function setSociete($societe) {
        $this->societe = $societe;
    }
    public function getPoste() {
        return $this->poste;
    }

    public function setPoste($poste) {
        $this->poste = $poste;
    }
    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
    public function getIdCommercial() {
        return $this->idCommercial;
    }

    public function setIdCommercial($idCommercial) {
        $this->idCommercial = $idCommercial;
    }
    public function getDateCreationCompte() {
        return $this->dateCreationCompte;
    }

    public function setDateCrationCompte($dateCreationCompte) {
        $this->dateCreationCompte = $dateCreationCompte;
    }
}
?>