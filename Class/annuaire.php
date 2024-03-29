<?php
Class Annuaire{

    private $id;
    private $idEntreprise;
    private $type;  
    private $ValeurDeContact;
    private $date;



    public function __construct($idEntreprise, $type, $ValeurDeContact, $date){
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
    public function setType($type) {
        $this->type = $type;
    }

    public function getType() {
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
    private $type;

    public function __construct() {
        $this -> bd = new PDO("mysql:host=localhost;dbname=crm", 'root', '');
        $this -> type = [1 => "téléphone fixe", 2 => "téléphone portable", 3 => "e-mail"];
    }
    public function searchAnnuaireByType($recherche,$type){
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
    public function addContactToAnnuaire(Annuaire $objet){
        $stmt = $this->bd->prepare("INSERT INTO annuaire (id_entreprise, valeur_contact, `type`, `date`) VALUES (?, ?, ?, ?)");
        $stmt->execute([
            $objet->getIdEntreprise(),
            $objet->getValeurDeContact(),
            $objet->getType(),
            $objet->getDate()
        ]);
    }



}

?>