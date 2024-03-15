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

    //SearchUSER par Noah en cours de développement
    public function SearchUserByType($recherche){
        $sqlnom = "SELECT * FROM utilisateur WHERE nom LIKE '%$recherche%'";
        $requetenom = $this -> bd -> query ($sqlnom);
        $donneesnom= $requetenom->fetchall(PDO::FETCH_ASSOC); 
        $tableauSearchByNom= array();      
            if($donneesnom != NULL){
                for ($i=0 ; $i<count($donneesnom) ;$i++){
            $tableauSearchByNom[]= new Utilisateur($donneesnom[$i]['id'],$donneesnom[$i]['nom'],$donneesnom[$i]['prenom'],$donneesnom[$i]['identifiant'],
            $donneesnom[$i]['mdp'],$donneesnom[$i]['droit']);                
        }
        var_dump($tableauSearchByNom);
        return $tableauSearchByNom;
    }
    $sqlprenom = "SELECT * FROM utilisateur WHERE prenom LIKE '%$recherche%'";
        $requeteprenom = $this -> bd -> query ($sqlprenom);
        $donneesprenom= $requeteprenom->fetchall(PDO::FETCH_ASSOC); 
        $tableauSearchByPrenom= array();      
            if($donneesprenom != NULL){
                for ($i=0 ; $i<count($donneesprenom) ;$i++){
            $tableauSearchByPrenom[]= new Utilisateur($donneesprenom[$i]['id'],$donneesprenom[$i]['nom'],$donneesprenom[$i]['prenom'],$donneesprenom[$i]['identifiant'],
            $donneesprenom[$i]['mdp'],$donneesprenom[$i]['droit']);                
        }
        var_dump($tableauSearchByPrenom);
        return $tableauSearchByPrenom;
    }
    $sqlidentifiant = "SELECT * FROM utilisateur WHERE identifiant LIKE '%$recherche%'";
        $requeteidentifiant = $this -> bd -> query ($sqlidentifiant);
        $donneesidentifiant= $requeteidentifiant->fetchall(PDO::FETCH_ASSOC); 
        $tableauSearchByIdentifiant= array();      
            if($donneesidentifiant != NULL){
                for ($i=0 ; $i<count($donneesidentifiant) ;$i++){
            $tableauSearchByIdentifiant[]= new Utilisateur($donneesidentifiant[$i]['id'],$donneesidentifiant[$i]['nom'],$donneesidentifiant[$i]['prenom'],$donneesidentifiant[$i]['identifiant'],
            $donneesidentifiant[$i]['mdp'],$donneesidentifiant[$i]['droit']);                
        }
        var_dump($tableauSearchByIdentifiant);
        return $tableauSearchByIdentifiant;
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