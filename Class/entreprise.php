<?php 
require_once("annuaire.php");

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
    public function __construct($nom,$prenom,$numClient, $societe,$poste,$idCommercial,$dateCreationCompte){
        $this ->nom = $nom;
        $this ->prenom=$prenom;
        $this ->numClient=$numClient;
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
        $entreprises = array();
        foreach ($resultats as $resultat) {
            $entreprise = new Entreprise($resultat['id'], $resultat['nom'], $resultat['prenom'], $resultat['societe'], $resultat['poste'], $resultat['id_commercial'], $resultat['date']);
            $entreprises[] = $entreprise;
        }
        return $entreprises;
    }
    public function SearchClientByName($nom){
        $bd = $this->bd;
        $sql = "SELECT * FROM entreprise WHERE nom LIKE :nom";
        $req = $bd->prepare($sql);
        $req->execute(array('nom' => '%' . $nom . '%'));
        $resultats = $req->fetchAll(PDO::FETCH_ASSOC);
        $entreprises = array();
        foreach ($resultats as $resultat) {
            $entreprise = new Entreprise($resultat['id'], $resultat['nom'], $resultat['prenom'], $resultat['numClient'], $resultat['societe'], $resultat['poste'], $resultat['email'], $resultat['idCommercial'], $resultat['dateCreationCompte']);
            $entreprises[] = $entreprise;
        }
        return $entreprises;
    }

    // Fonction pour rechercher un client par son ID || Romain
    public function SearchClientById($id){
        $sqlId = "SELECT * FROM entreprise WHERE id= :id";
        $reqId = $this -> bd -> prepare ($sqlId);
        $reqId -> execute(array('id' => $id));
        $donneesId = $reqId -> fetch(PDO::FETCH_ASSOC);
        $entreprise = new Entreprise($donneesId['id'], $donneesId['nom'], $donneesId['prenom'], $donneesId['numClient'], $donneesId['societe'], $donneesId['poste'], $donneesId['email'], $donneesId['idCommercial'], $donneesId['dateCreationCompte']);
        return $entreprise;
    }


    public function DeleteClientById($id) {
        $sql = 'DELETE FROM entreprise WHERE id = :id';
        $requete = $this->bd->prepare($sql);
        $requete->bindParam(':id', $id, PDO::PARAM_INT);
        return $requete->execute();
    }
    public function SearchClientBySociete($societe){
        $sqlsociete = "SELECT * FROM entreprise WHERE societe Like '%$societe%'";
        $requetesociete = $this -> bd -> query ($sqlsociete);
        $donneessociete= $requetesociete->fetchall(PDO::FETCH_ASSOC);
        $tableauSociete= array();
        if($donneessociete != NULL){
            for ($i=0 ; $i<count($donneessociete) ;$i++){
            $tableauSociete[] = new Entreprise($donneessociete[$i]['id'], $donneessociete[$i]['nom'], $donneessociete[$i]['prenom'],
            $donneessociete[$i]['societe'],$donneessociete[$i]['poste'],$donneessociete[$i]['id_commercial'], $donneessociete[$i]['date']);
        }
        return $tableauSociete;
        }
    }

    public function ModifClient($entreprise) {
        $sql = 'UPDATE entreprise SET nom = :nom, prenom = :prenom, numClient = :numClient, societe = :societe, poste = :poste, email = :email, idCommercial = :idCommercial, dateCreationCompte = :dateCreationCompte WHERE id = :id';
        
        $requete = $this->bd->prepare($sql);
        $requete->bindParam(':id', $entreprise->getId(), PDO::PARAM_INT);
        $requete->bindParam(':nom', $entreprise->getNom(), PDO::PARAM_STR);
        $requete->bindParam(':prenom', $entreprise->getPrenom(), PDO::PARAM_STR);
        $requete->bindParam(':numClient', $entreprise->getNumClient(), PDO::PARAM_STR);
        $requete->bindParam(':societe', $entreprise->getSociete(), PDO::PARAM_STR);
        $requete->bindParam(':poste', $entreprise->getPoste(), PDO::PARAM_STR);
        $requete->bindParam(':email', $entreprise->getEmail(), PDO::PARAM_STR);
        $requete->bindParam(':idCommercial', $entreprise->getIdCommercial(), PDO::PARAM_INT);
        $requete->bindParam(':dateCreationCompte', $entreprise->getDateCreationCompte(), PDO::PARAM_STR);
        
        return $requete->execute();
    }

    // crée une fiche entreprise et renvoie son id dans la class Entreprise
    public function createClientFiche(Entreprise $objet){
        $sql = 'INSERT INTO entreprise (nom, prenom, `date`, societe, poste, id_commercial) VALUES ("'.$objet->getNom().'", "'.$objet->getPrenom().'", "'.$objet->getDateCreationCompte().'", "'.$objet->getSociete().'", "'.$objet->getPoste().'", '.$objet->getIdCommercial().')';
        $requete = $this -> bd -> query($sql);
        $donnees = $requete -> fetch(PDO::FETCH_ASSOC);

        $sql2 = 'SELECT id FROM entreprise WHERE societe="'.$objet->getSociete().'"';
        $requete2 = $this -> bd -> query($sql2);
        $donnees2 = $requete2 -> fetch(PDO::FETCH_ASSOC);

        return $objet->setId($donnees2['id']);
    }

    
    public function returnAllEntreprise() {
        $sql = 'SELECT * FROM entreprise';
        $requete = $this->bd->query($sql);
        $donnees = $requete->fetchAll(PDO::FETCH_ASSOC);
        
        $tableauEntreprise = array();
        foreach ($donnees as $entreprise) {
            $tableauEntreprise[] = new Entreprise($entreprise['id'], $entreprise['nom'], $entreprise['prenom'], $entreprise['numClient'], $entreprise['societe'], $entreprise['poste'], $entreprise['email'], $entreprise['idCommercial'], $entreprise['dateCreationCompte']);
        }
        
        return $tableauEntreprise;
    }

}
?>