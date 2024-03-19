<?php 

Class Fichier{
    //Valeur privée
    private $id;
    private $idEntreprise;
    private $type;
    private $lienDoc;
    private $date;
//Constructeur
    public function __construct($idEntreprise,$date,$lienDoc,$type){
        $this -> idEntreprise = $idEntreprise;
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
class ManagerFichier{
    private $bd;
    public function __construct() {
        $this -> bd = new PDO("mysql:host=localhost;dbname=crm", 'root', '');
    }

   public function LinkDocumentToClient($Fichier){
    $iduser = $Fichier->getIdEntreprise() ;
    $date = $Fichier->getDate();
    $lien = $Fichier->getLienDoc();
    $type= $Fichier->getType();
    $bd = new PDO("mysql:host=localhost;dbname=crm", 'root', '');
    $sql2 = "INSERT INTO fichier (id_utilisateur,date,lien,type) VALUES ('$iduser','$date','$lien','$type')";
    $requete2 = $bd -> query ($sql2);
   } 
    public function GetFichierByClient($id_entreprise){
        $bd = $this->bd;
        $sql = "SELECT * FROM fichier WHERE id_entreprise = :id_entreprise";
        $req = $bd->prepare($sql);
        $req->execute(array('id_entreprise' => $id_entreprise));
        $resultats = $req->fetchAll(PDO::FETCH_ASSOC);
        $fichiers = array();
        foreach ($resultats as $resultat) {
            $fichier = new Fichier($resultat['id'], $resultat['idEntreprise'], $resultat['type'], $resultat['lienDoc'], $resultat['date']);
            $fichiers[] = $fichier;
        }
        return $fichiers;
    }
    
}
?>    
