<?php
Class Annuaire{

    private $id;
    private $id_entreprise;
    private $type;  
    private $ValeurDeContact;


    public function __construct($id, $id_entreprise, $type, $ValeurDeContact){
        $this -> id = $id ;
        $this -> idEntreprise = $idEntreprise;
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
    public function setId_entreprise($id_entreprise) {
        $this->id_entreprise = $id_entreprise;
    }


    public function getId_entreprise() {
        return $this-> id_entreprise;

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

Class AnnuaireManager{
    
    





}

?>