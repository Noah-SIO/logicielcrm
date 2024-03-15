<?php 

Class Utilisateur{
    private $id;
    private $nom;
    private $prenom;
    private $identifiants;
    private $profil;
    private $mdp;

    
    public function __construct($nom, $prenom, $identifiants, $mdp, $profil) {
        $this -> nom = $nom;
        $this -> prenom = $prenom;
        $this -> identifiants = $identifiants;
        $this -> mdp = $mdp;
        $this -> profil = $profil;
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

    //ajoute un utilisateur dans la base de donnees a partir de l'objet utilisateur. || par Romain
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

    //SearchUSER par Noah en cours de développement
    public function SearchUserByType($recherche,$type){
        $type = strtoupper($type);
        if($type == "NOM"){
        $sqlrecherche = "SELECT * FROM utilisateur WHERE nom LIKE '%$recherche%'";
        }
        if($type == "PRENOM"){
            $sqlrecherche = "SELECT * FROM utilisateur WHERE prenom LIKE '%$recherche%'";
        }
        if($type == "IDENTIFIANT"){
            $sqlrecherche = "SELECT * FROM utilisateur WHERE identifiant LIKE '%$recherche%'";
        }
        $requeterecherche = $this -> bd -> query ($sqlrecherche);
        $donneesrecherche= $requeterecherche->fetchall(PDO::FETCH_ASSOC); 
        $tableauRecherche= array();      
            if($donneesrecherche != NULL){
                for ($i=0 ; $i<count($donneesrecherche) ;$i++){
            $tableauRecherche[]= new Utilisateur($donneesrecherche[$i]['id'],$donneesrecherche[$i]['nom'],$donneesrecherche[$i]['prenom'],$donneesrecherche[$i]['identifiant'],
            $donneesrecherche[$i]['mdp'],$donneesrecherche[$i]['droit']);                
        }
        var_dump($tableauRecherche);
        return $tableauRecherche;
    }
}
    public function DeleteUser($id) {
        $sql = 'DELETE FROM utilisateur WHERE id = :id';
        $requete = $this->bd->prepare($sql);
        $requete->bindParam(':id', $id, PDO::PARAM_INT);
        return $requete->execute();
    }

    public function GetUser($nom) {
        $sql = 'SELECT * FROM utilisateur WHERE nom = :nom';
        $requete = $this->bd->prepare($sql);
        $requete->bindParam(':nom', $nom, PDO::PARAM_STR);
        $requete->execute();
        return $requete->fetch(PDO::FETCH_ASSOC);
    }

    public function DeleteById($id) {
        $sql = 'DELETE FROM utilisateur WHERE id = :id';
        $requete = $this->bd->prepare($sql);
        $requete->bindParam(':id', $id, PDO::PARAM_INT);
        return $requete->execute();
    }
    
}


?>