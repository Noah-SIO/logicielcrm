<?php 

Class Fichier{
    //Valeur privée
    private $id;
    private $idEntreprise;
    private $nom;
    private $type;
    private $lienDoc;
    private $date;
//Constructeur
    public function __construct($id,$idEntreprise,$nom,$date,$lienDoc,$type){
        $this -> id = $id;// si ID n'est pas utilisatble mettez null en paramètre :)
        $this -> idEntreprise = $idEntreprise;
        $this ->nom=$nom;
        $this ->date=$date;
        $this ->lienDoc=$lienDoc;
        $this ->type=$type;
    }
    //Fonction Get et Set
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    public function getIdEntreprise() {
        return $this->idEntreprise;
    }

    public function setIdEntreprise($idEntreprise) {
        $this->idEntreprise = $idEntreprise;
    }
    public function getNom() {
        return $this->nom;
    }
    public function setNom($nom) {
        $this->nom = $nom;
    }
    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }
    public function getLienDoc() {
        return $this->lienDoc;
    }

    public function setLienDoc($lienDoc) {
        $this->lienDoc = $lienDoc;
    }
    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }
}
class ManagerFichier {
    private $bd;
    public function __construct(){
        $this -> bd = new PDO("mysql:host=localhost;dbname=crm", 'root', '');
    }

   public function LinkDocumentToClient($Fichier){
    $iduser = $Fichier->getIdEntreprise() ;
    $nom = $Fichier->getNom();
    $date = $Fichier->getDate();
    $lien = $Fichier->getLienDoc();
    $type= $Fichier->getType();
    $sql2 = "INSERT INTO fichier (id_utilisateur,date,lien,type) VALUES ('$iduser','$nom','$date','$lien','$type')";
    $requete2 = $this-> bd -> query ($sql2);
   } 
    public function GetFichierByClient($id_entreprise){
        if ($id_entreprise == 0){
            $sql = "SELECT * FROM fichier ORDER BY type";$bd = $this->bd;
            $req = $bd->prepare($sql);
            $req->execute();
            $resultats = $req->fetchAll(PDO::FETCH_ASSOC);
            $fichiers = array();
        }
        else{
            $sql = "SELECT * FROM fichier WHERE idutilisateur = :identreprise ORDER BY type";$bd = $this->bd;
            $req = $bd->prepare($sql);
            $req->bindValue(':identreprise', $id_entreprise, PDO::PARAM_INT);
            $req->execute();
            $resultats = $req->fetchAll(PDO::FETCH_ASSOC);
            $fichiers = array();
        }
        
        foreach ($req->fetchAll(PDO::FETCH_ASSOC) as $resultat) {
            $fichier = new Fichier(
                $resultat['id_utilisateur'],
                $resultat['nom'],
                $resultat['type'],
                $resultat['lienDoc'],
                $resultat['date']
            );
            $fichiers[] = $fichier;
        }
        return $fichiers;
    }
    
}
?>    
