<?php 

Class Fichier{
    //Valeur privée
    private $id;
    private $idEntreprise;
    private $type;
    private $lienDoc;
    private $date;
//Constructeur
    public function __construct($id,$idEntreprise,$type,$lienDoc,$date){
        $this ->id=$id;
        $this -> idEntreprise = $idEntreprise;
        $this ->type=$type;
        $this ->lienDoc=$lienDoc;
        $this ->date=$date;
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
    
}
?>    
