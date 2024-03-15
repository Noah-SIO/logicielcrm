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

    
    public function __construct($nom, $prenom, $identifiants, $profil, $mdp, $email,$numTel) {
        $this -> nom = $nom;
        $this -> prenom = $prenom;
        $this -> identifiants = $identifiants;
        $this -> profil = $profil;
        $this -> mdp = $mdp;
        $this -> email = $email;
        $this -> numTel = $numTel;
    }
//  Id
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

//  Nom
    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

//  Prenom
    public function getPrenom() {
        return $this->prenom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

//  Identifiants
    public function getIdentifiants() {
        return $this->identifiants;
    }

    public function setIdentifiants($identifiants) {
        $this->identifiants = $identifiants;
    }

//  Profil
    public function getProfil() {
        return $this->profil;
    }

    public function setProfil($profil) {
        $this->profil = $profil;
    }

//  Mot de pass
    public function getMdp() {
        return $this->mdp;
    }

    public function setMdp($mdp) {
        $this->mdp = $mdp;
    }

//  Email
    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

//  Numero de telephone
    public function getNumtel() {
        return $this->numTel;
    }

    public function setTel($numTel) {
        $this->numTel = $numTel;
    }
}

class ManagerUtilisateur {
    private $bd;

    public function __construct() {
        $this -> bd = new PDO("mysql:host=localhost;dbname=crm", 'root', '');
    }
    
    public function verifIdentifiant($login) {
        $sql = 'SELECT identifiant FROM utilisateur WHERE identifiant="'.$login.'"';
        $requete = $this -> bd -> query($sql);
        $donnees = $requete -> fetch(PDO::FETCH_ASSOC);
        if ($donnees == $login) {
            return true;
        } else {
            return false;
        } 
    }

    //ajoute un utilisateur dans la base de donnees a partir de l'objet utilisateur.
    public function addUser($utilisateur){
    $bd = $this->bd;
    $creercompte = $bd->prepare("INSERT INTO utilisateur (nom, prenom, identifiant, mdp, droit) VALUES (:nom, :prenom, :identifiant, :mdp, :droit)");
    $creercompte->execute([
        ':nom' => $utilisateur->getNom(),
        ':prenom' => $utilisateur->getPrenom(),
        ':identifiant' => $utilisateur->getIdentifiants(),
        ':mdp' => $utilisateur->getMdp(),
        ':droit' => $utilisateur->getProfil()
    ]);    
}

}


?>