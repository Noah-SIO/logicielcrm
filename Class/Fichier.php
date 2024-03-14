<?php 

Class Entreprise{
    //Valeur privée
    private $id;
    private $id_entreprise;
    private $type;
    private $lienDoc;
    private $date;
//Constructeur
    public function __construct($id,$id_entreprise,$type,$lienDoc,$date){
        $this ->id=$id;
        $this -> id_entreprise = $id_entreprise;
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
        return $this->id_entreprise;
    }

    public function setIdEntreprise($id_entreprise) {
        $this->id_entreprise = $id_entreprise;
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