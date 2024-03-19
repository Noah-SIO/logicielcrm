<?php 

Class Utilisateur{
    private $id;
    private $nom;
    private $prenom;
    private $identifiant;
    private $profil;
    private $mdp;
    private $email;
    private $numTel;

    
    public function __construct($nom, $prenom, $identifiant, $profil, $mdp, $email,$numTel) {
        $this -> nom = $nom;
        $this -> prenom = $prenom;
        $this -> identifiant = $identifiant;
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
    public function getIdentifiant() {
        return $this->identifiant;
    }

    public function setIdentifiant($identifiant) {
        $this->identifiant = $identifiant;
    }

//  Profil
    public function getProfil() {
        return $this->profil;
    }

    public function setProfil($profil) {
        $this->profil = $profil;
    }

//  Mot de pass
    public function getMpd() {
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
    
    // vérifie la connexion par l'identifiant et le mot de passe, retourne true ou false
    public function checkLoginInfos($login, $mdp) {
        $sql = 'SELECT id FROM utilisateur WHERE identifiant="'.$login.'" AND mdp="'.$mdp.'"';
        $bd = $this->bd;
        $requete = $bd->prepare($sql);
        $requete->execute();
        $result = $requete->fetch();
        if ($result){
            return true;
        }else{
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
    
    // Modifie les informations de l'utilisateur dans la base de données a partir de l'objet utilisateur.|| par Romain
    public function ModifyUser($utilisateur) {
        var_dump($utilisateur);
        $bd = $this->bd;
        $creercompte = $bd->prepare("UPDATE utilisateur SET nom = '{$utilisateur->getNom()}', prenom = '{$utilisateur->getPrenom()}' , identifiant = '{$utilisateur->getIdentifiants()}', mdp = '{$utilisateur->getMdp()}', droit = '{$utilisateur->getProfil()}' WHERE id = {$utilisateur->getId()}");
        $creercompte->execute();    
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