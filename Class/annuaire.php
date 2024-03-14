<?php
Class annuaire{

    private $id;
    private $id_entreprise;
    private $type;  
    private $ValeurDeContact;


    public function __construct($id, $id_entreprise, $type, $ValeurDeContact){
        $this -> id = $id ;
        $this -> id_entreprise = $id_entreprise;
        $this -> type = $type;
        $this -> ValeurDeContact = $ValeurDeContact;
    }


    public function getId() {
        return $this->id;

    }

    public function setId($Id) {
        $this->id = $id;
    }



    public function setId_entreprise($id_entreprise) {
        $this->id_entreprise = $id_entreprise;
    }


    public function getId_entreprise() {
        return $this-> id_entreprise;

    }

    public function settype($type) {
        $this->type = $type;
    }

    public function gettype() {
        return $this->type;
    }


    public function getValeurDeContact() {
        return $this->ValeurDeContact;
    }

    public function setValeurDeContact($ValeurDeContact) {
        $this->ValeurDeContact = $ValeurDeContact;
    }
}

?>