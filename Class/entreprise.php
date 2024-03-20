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
        $this ->id=$id;
        $this ->nom = $nom;
        $this ->prenom=$prenom;
        $this ->societe=$societe;
        $this ->poste=$poste;
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

class ManagerEntreprise{
    private $bd;

    public function __construct() {
        $this -> bd = new PDO("mysql:host=localhost;dbname=crm", 'root', '');
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
        var_dump($tableauSociete);
        return $tableauSociete;
    }
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
      
?>