<?php
Class Annuaire{

    private $id;
    private $idEntreprise;
    private $type;  
    private $ValeurDeContact;
    private $date;



    public function __construct($id, $idEntreprise, $type, $ValeurDeContact,$date){
        $this->id = $id;
        $this->idEntreprise = $idEntreprise;
        $this->type = $type;
        $this->ValeurDeContact = $ValeurDeContact;
        $this->date = $date;
    }

//  id
    public function getId() {
        return $this->id;

    }

    public function setId($Id) {
        //$this->id = $Id;
        $ValeurDeContact = $this->ValeurDeContact;
        $sqlrecherche = "SELECT id FROM annuaire WHERE valeur_contact = $ValeurDeContact";
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

//  Date
    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    
    }
}

class ManagerAnnuaire{
    private $bd;
    public function __construct() {
        $this -> bd = new PDO("mysql:host=localhost;dbname=crm", 'root', '');
    }
    public function SearchAnnuaireByType($recherche,$type){
        $type = strtoupper($type);
        if($type == "TYPE"){
        $sqlrecherche = "SELECT * FROM annuaire WHERE type LIKE '%$recherche%'";
        }
        if($type == "VALEUR DE CONTACT"){
            $sqlrecherche = "SELECT * FROM annuaire WHERE valeur_contact LIKE '%$recherche%'";
        }
        $requeterecherche = $this -> bd -> query ($sqlrecherche);
        $donneesrecherche= $requeterecherche->fetchall(PDO::FETCH_ASSOC); 
        $tableauRecherche= array();      
            if($donneesrecherche != NULL){
                for ($i=0 ; $i<count($donneesrecherche) ;$i++){
            $tableauRecherche[]= new Annuaire($donneesrecherche[$i]['id'],$donneesrecherche[$i]['id_entreprise'],$donneesrecherche[$i]['valeur_contact'],$donneesrecherche[$i]['type'],
            $donneesrecherche[$i]['date']);                
        }
        var_dump($tableauRecherche);
        return $tableauRecherche;
        }
    }

    // ajoute un numero de téléphone ou un mail dans la base de donnees a partir de l'objet annuaire. || par Romain
    public function addContactToAnnuaire($annuaire){
        $stmt = $this->bd->prepare("INSERT INTO annuaire (id_entreprise, valeur_contact, type, date) VALUES (?, ?, ?, ?)");
        $stmt->execute([
            $annuaire->getIdEntreprise(),
            $annuaire->getValeurDeContact(),
            $annuaire->gettype(),
            $annuaire->getDate()
        ]);
    }

    //Modifie les données presante dans l'annuaire a partire d'un objet annuaire|| par Romain
    public function Modifierannuaire($annuaire){
        $valeur = $annuaire->getValeurDeContact();
        $type = $annuaire->gettype();
        $date = $annuaire->getDate();
        $id = $annuaire->getId();
        $stmt = $this->bd->prepare("UPDATE annuaire SET valeur_contact = $valeur, type = $type, date = $date WHERE id = $id");
        $stmt->execute();
    }

    //suprime les donnée qui ont pour id $id || par Romain
    public function Supprimerannuaire($id){
        $stmt = $this->bd->prepare("DELETE FROM annuaire WHERE id = $id");
        $stmt->execute();
    }



}

?>