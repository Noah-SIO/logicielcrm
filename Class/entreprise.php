<?php 

Class Entreprise{
    //Valeur privée
    private $id;
    private $nom;
    private $prenom;
    private $societe;
    private $poste;
    private $idCommercial;
    private $dateCreationCompte;
//Constructeur
    public function __construct($id,$nom,$prenom,$societe,$poste,$idCommercial,$dateCreationCompte){
        $this ->id = $id;
        $this ->nom = $nom;
        $this ->prenom=$prenom;
        $this ->societe=$societe;
        $this ->poste=$poste;
        $this -> idCommercial= $idCommercial;
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

class ManagerEntreprise{
    private $bd;

    public function __construct() {
        $this -> bd = new PDO("mysql:host=localhost;dbname=crm", 'root', '');
    }

    public function getAllEntreprise(){
        $bd = $this->bd;
        $sql = "SELECT * FROM entreprise";
        $req = $bd->prepare($sql);
        $req->execute(array());
        $resultats = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultats as $resultat) {
            $entreprise = new Entreprise($resultat['id'], $resultat['nom'], $resultat['prenom'], $resultat['societe'], $resultat['poste'], $resultat['id_commercial'], $resultat['date']);
            $entreprises[] = $entreprise;
        }
        return $entreprises;
    }

    public function getEntreprise($id){
        $bd = $this->bd;
        $sql = "SELECT * FROM entreprise WHERE id=$id";
        $requete = $this -> bd -> query ($sql);
        $donnees = $requete->fetch(PDO::FETCH_ASSOC);
        return $donnees;
    }

    public function getAnnuaireEntreprise($idEntreprise){
        if ($idEntreprise != NULL){
            $sql = "SELECT * FROM annuaire WHERE id_entreprise =".$idEntreprise."";
            $requete = $this -> bd -> query ($sql);
            $donnees = $requete ->fetchall(PDO::FETCH_ASSOC);
            return $donnees;
        }
    }

    public function SearchClientByName($nom){
        $bd = $this->bd;
        $sql = "SELECT * FROM entreprise WHERE nom LIKE :nom";
        $req = $bd->prepare($sql);
        $req->execute(array('nom' => '%' . $nom . '%'));
        $resultats = $req->fetchAll(PDO::FETCH_ASSOC);
        $entreprises = array();
        foreach ($resultats as $resultat) {
            $entreprise = new Entreprise($resultat['id'], $resultat['nom'], $resultat['prenom'], $resultat['societe'], $resultat['poste'], $resultat['id_commercial'], $resultat['date']);
            $entreprises[] = $entreprise;
        }
        return $entreprises;
    }



    // Fonction pour rechercher un client par son ID || Romain
    public function returnClientById($id){
        $sqlId = "SELECT * FROM entreprise WHERE id= :id";
        $reqId = $this -> bd -> prepare ($sqlId);
        $reqId -> execute(array('id' => $id));
        $donneesId = $reqId -> fetch(PDO::FETCH_ASSOC);
        $entreprise = new Entreprise($donneesId['id'],$donneesId['nom'], $donneesId['prenom'], $donneesId['societe'], $donneesId['poste'], $donneesId['id_commercial'], $donneesId['date']);
        return $entreprise;
    }


    public function DeleteClientById($id) {
        $sql = 'DELETE FROM entreprise WHERE id = :id';
        $requete = $this->bd->prepare($sql);
        $requete->bindParam(':id', $id, PDO::PARAM_INT);
        return $requete->execute();
    }
    public function SearchClientBySociete($societe){
        $sql = "SELECT * FROM entreprise WHERE societe LIKE :societe";
        $req = $this->bd->prepare($sql);
        $req->execute(['societe' => '%'.$societe.'%']);
        $donnees = $req->fetchAll(PDO::FETCH_ASSOC);
        $entreprises = [];
        foreach ($donnees as $entreprise) {
            $entreprises[] = new Entreprise(
                $entreprise['id'],
                $entreprise['nom'],
                $entreprise['prenom'],
                $entreprise['societe'],
                $entreprise['poste'],
                $entreprise['id_commercial'],
                $entreprise['date']
            );
        }
        return $entreprises;
    }

    public function ModifClient(Entreprise $entreprise) {
        $sql = 'UPDATE entreprise SET nom = :nom, prenom = :prenom,  societe = :societe, poste = :poste, id_commercial = :idCommercial, date = :dateCreationCompte WHERE id = :id';
        
        $requete = $this->bd->prepare($sql);
        $requete->bindValue(':id', $entreprise->getId(), PDO::PARAM_INT);
        $requete->bindValue(':nom', $entreprise->getNom(), PDO::PARAM_STR);
        $requete->bindValue(':prenom', $entreprise->getPrenom(), PDO::PARAM_STR);
        $requete->bindValue(':societe', $entreprise->getSociete(), PDO::PARAM_STR);
        $requete->bindValue(':poste', $entreprise->getPoste(), PDO::PARAM_STR);
        $requete->bindValue(':idCommercial', $entreprise->getIdCommercial(), PDO::PARAM_INT);
        $requete->bindValue(':dateCreationCompte', $entreprise->getDateCreationCompte(), PDO::PARAM_STR);
        
        return $requete->execute();
    }

    // crée une fiche entreprise et renvoie son id dans la class Entreprise
    public function createClientFiche($Entreprise){
        $sql = 'INSERT INTO entreprise (nom, prenom, date, societe, poste, id_commercial) VALUES ("'.$Entreprise->getNom().'", "'.$Entreprise->getPrenom().'", "'.$Entreprise->getDateCreationCompte().'", "'.$Entreprise->getSociete().'", "'.$Entreprise->getPoste().'", '.$Entreprise->getIdCommercial().')';
        $requete = $this -> bd -> query($sql);
        $donnees = $requete -> fetch(PDO::FETCH_ASSOC);
        $sql2 = 'SELECT id FROM entreprise WHERE societe="'.$Entreprise->getSociete().'"';
        $requete2 = $this -> bd -> query($sql2);
        $donnees2 = $requete2 -> fetch(PDO::FETCH_ASSOC);
        return $Entreprise->setId($donnees2['id']);
    }
    
    public function getHistoriqueEntreprise() {
        $bd = $this->bd;
        $sql = "SELECT * FROM entreprise ORDER BY date DESC LIMIT 5";
        $req = $bd->query($sql);
        $resultats = $req->fetchAll(PDO::FETCH_ASSOC);
        $entreprises = [];
        foreach ($resultats as $resultat) {
            $entreprise = new Entreprise($resultat['id'], $resultat['nom'], $resultat['prenom'], $resultat['societe'], $resultat['poste'], $resultat['id_commercial'], $resultat['date']);
            $entreprises[] = $entreprise;
        }
        return $entreprises;
    }   
}
?>