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
    
    public function __construct($id,$nom, $prenom, $identifiant, $profil, $mdp){
        $this->id=$id;
        $this -> nom = $nom;
        $this -> prenom = $prenom;
        $this -> identifiant = $identifiant;
        $this -> profil = $profil;
        $this -> mdp = $mdp;
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
    private $droit;

    public function __construct() {
        $this -> bd = new PDO("mysql:host=localhost;dbname=crm", 'root', '');
        $this -> droit = [1 => "conseiller client", 2 => "manager", 3 => "commercial", 4 => "comptable", 5 => "responsable informatique", 6 => "directeur général"];
    }
    
    // vérifie la connexion par l'identifiant et le mot de passe, retourne true ou false
    public function checkLoginInfos($login, $mdp) {
        $sql = 'SELECT id FROM utilisateur WHERE identifiant="'.$login.'" AND mdp="'.$mdp.'"';
        $bd = $this->bd;
        $requete = $bd->prepare($sql);
        $requete->execute();
        $result = $requete->fetch();
        if ($result == true){
            return true;
        } else if ($result == false){
            return false;
        } 
    }
    
    //ajoute un utilisateur dans la base de donnees a partir de l'objet utilisateur. || par Romain
    public function addUser($utilisateur){
        if ($utilisateur != NULL) {
            $bd = $this->bd;
            $creercompte = $bd->prepare("INSERT INTO utilisateur (nom, prenom, identifiant, mdp, droit) VALUES (:nom, :prenom, :identifiant, :droit,:mdp)");
            $creercompte->execute([
                ':nom' => $utilisateur->getNom(),
                ':prenom' => $utilisateur->getPrenom(),
                ':identifiant' => $utilisateur->getIdentifiant(),
                ':mdp' => $utilisateur->getMdp(),
                ':droit' => $utilisateur->getProfil()
            ]);  
        }
    }
    
    // Modifie les informations de l'utilisateur dans la base de données à partir de l'objet utilisateur.|| par Romain
    public function ModifyUser($utilisateur) {
        $bd = $this->bd;
        $sql = "UPDATE utilisateur SET nom = :nom, prenom = :prenom, identifiant = :identifiant, mdp = :mdp, droit = :droit WHERE id = :id";
        $creerCompte = $bd->prepare($sql);  
        $creerCompte->execute([
            ':nom' => $utilisateur->getNom(),
            ':prenom' => $utilisateur->getPrenom(),
            ':identifiant' => $utilisateur->getIdentifiant(),
            ':mdp' => $utilisateur->getProfil(),
            ':droit' => $utilisateur->getMdp(),
            ':id' => $utilisateur->getId()
        ]);
        if ($creerCompte->errorCode() != '00000') {
            $erreur = $creerCompte->errorInfo();
            echo " Erreur de la requête : <br>".$erreur[2];
            exit;
        }
    }

        //SearchUSER par Noah en cours de développement
        public function SearchUserByType($recherche,$type){
            $type = strtoupper($type);
            if($type == "NOM"){
            $sqlrecherche = "SELECT * FROM utilisateur WHERE nom LIKE '%$recherche%'";
            }
            if($type == "NOMTEST"){
                $sqlrecherche = "SELECT * FROM utilisateur WHERE nom = '$recherche'";
                }
            if($type == "PRENOM"){
                $sqlrecherche = "SELECT * FROM utilisateur WHERE prenom LIKE '%$recherche%'";
            }
            if($type == "IDENTIFIANT"){
                $sqlrecherche = "SELECT * FROM utilisateur WHERE identifiant LIKE '%$recherche%'";
            }
            if($type == "ALL"){
                $sqlrecherche = "SELECT * FROM utilisateur WHERE nom LIKE '%$recherche%' OR prenom LIKE '%$recherche%' OR identifiant LIKE '%$recherche%'";
            }
            $requeterecherche = $this -> bd -> query ($sqlrecherche);
            $donneesrecherche= $requeterecherche->fetchall(PDO::FETCH_ASSOC); 
            $tableauRecherche= array();      
                if($donneesrecherche != NULL){
                    for ($i=0 ; $i<count($donneesrecherche) ;$i++){
                $tableauRecherche[]= new Utilisateur($donneesrecherche[$i]['id'],$donneesrecherche[$i]['nom'],$donneesrecherche[$i]['prenom'],$donneesrecherche[$i]['identifiant'],
                $donneesrecherche[$i]['droit'],$donneesrecherche[$i]['mdp']);                
            }
            //var_dump($tableauRecherche);
            return $tableauRecherche;
        }
    }
        public function DeleteUser($id) {
            $sql = 'DELETE FROM utilisateur WHERE id = :id';
            $requete = $this->bd->prepare($sql);
            $requete->bindParam(':id', $id, PDO::PARAM_INT);
            return $requete->execute();
        }
        
        public function GetUser($identifiant) {
            $sql = 'SELECT * FROM utilisateur WHERE identifiant = "'.$identifiant.'"';
            $requete = $this -> bd -> query($sql);
            $donnees = $requete -> fetchAll(PDO::FETCH_ASSOC);
            return $donnees;
        }
        
        
        public function GetUserById($id) {
            $sql = 'SELECT * FROM utilisateur WHERE id = "'.$id.'"';
            $requete = $this -> bd -> query($sql);
            $donnees = $requete -> fetchAll(PDO::FETCH_ASSOC);
            return $donnees;
        }

        
        public function returnAllUsers() {
            $sql = 'SELECT * FROM utilisateur ';
            $requete = $this->bd->prepare($sql);
            $requete->execute();
            $donneesrecherche = $requete->fetchAll(PDO::FETCH_ASSOC);
            $tableauRecherche = array();

            if ($donneesrecherche != null) {
                foreach ($donneesrecherche as $ligne) {
                    $utilisateur = new Utilisateur($ligne['id'],$ligne['nom'], $ligne['prenom'], $ligne['identifiant'],$ligne['droit'], $ligne['mdp']);
                    $tableauRecherche[] = $utilisateur;
                }
                
            return $tableauRecherche;
            }
        }

        public function DeleteById($id) {
            $sql = 'DELETE FROM utilisateur WHERE id = :id';
            $requete = $this->bd->prepare($sql);
            $requete->bindParam(':id', $id, PDO::PARAM_INT);
            return $requete->execute();
        }
}

?>