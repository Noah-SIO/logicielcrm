<?php
Class Annuaire{

    private $id;
    private $idEntreprise;
    private $type;  
    private $ValeurDeContact;


    public function __construct($id, $idEntreprise, $type, $ValeurDeContact){
        $this -> id = $id ;
        $this -> id_entreprise = $id_entreprise;
        $this -> type = $type;
        $this -> ValeurDeContact = $ValeurDeContact;
    }

//  id
    public function getId() {
        return $this->id;

    }

    public function setId($Id) {
        $this->id = $id;
    }


//  Id_entreprise
    public function setIdEntreprise($idEntreprise) {
        $this->idEntreprise = $idEntreprise;
    }


    public function getIdEntreprise() {
        return $this-> idEntreprise;

    }



//  type
    public function settype($type) {
        $this->type = $type;
    }

    public function gettype() {
        return $this->type;
    }

//  Valeur De Contact
    public function getValeurDeContact() {
        return $this->ValeurDeContact;
    }

    public function setValeurDeContact($ValeurDeContact) {
        $this->ValeurDeContact = $ValeurDeContact;
    }
}
class ManagerAnnuaire{
    private $bd;
    public function __construct() {
        $this -> bd = new PDO("mysql:host=localhost;dbname=crm", 'root', '');
    }
}   
?>