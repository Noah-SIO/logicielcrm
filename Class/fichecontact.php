<?php 

Class FicheContact{
    private $id;
    private $idCompte;
    private $idEntreprise;
    private $date;
    private $moyenDeContact;
    private $demande;
    private $reponse;


    
    public function __construct($id,$idCompte, $idEntreprise, $date, $moyenDeContact, $demande, $reponse){
        $this->id=$id;
        $this -> idCompte = $idCompte;
        $this -> idEntreprise = $idEntreprise;
        $this -> date = $date;
        $this -> moyenDeContact = $moyenDeContact;
        $this -> demande = $demande;
        $this -> reponse = $reponse;
    }

//  id
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

//  Id_compte
    public function getIdCompte() {
        return $this->idCompte;
    }

    public function setIdCompte($idCompte) {
        $this->idCompte = $idCompte;
    }

//  Id_entreprise
    public function getIdEntreprise() {
        return $this->idEntreprise;
    }

    public function setIdEntreprise($idEntreprise) {
        $this->idEntreprise = $idEntreprise;
    }

// Identifiants
    public function getIdentifiants() {
        return $this->identifiants;
    }

    public function setIdentifiants($identifiants) {
        $this->identifiants = $identifiants;
    }

//  Date
    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }

//  Moyen de contact
    public function getMoyenDeContact() {
        return $this->moyenDeContact;
    }

    public function setMoyenDeContact($moyenDeContact) {
        $this->moyenDeContact = $moyenDeContact;
    }

//  Demande
    public function getDemande() {
        return $this->demande;
    }

    public function setDemande($demande) {
        $this->demande = $demande;
    }

// Reponse
    public function getReponse() {
        return $this->reponse;
    }

    public function setReponse($reponse) {
        $this->reponse = $reponse;
    }
}


//creation de la fiche de contact || par Romain
Class Contact{
    private $bd;
    public function __construct() {
        $this -> bd = new PDO("mysql:host=localhost;dbname=crm", 'root', '');
    }

    public function createFicheContact($ficheContact){
        $sql = "INSERT INTO contact (id_utilisateur, id_entreprise, date_contact, moyen_contact, demande, reponse) VALUES (:idCompte, :idEntreprise, :date_contact, :moyenDeContact, :demande, :reponse)";
        $req = $this->bd->prepare($sql);
        
        $req->execute([
            'idCompte' => $ficheContact->getIdCompte(),
            'idEntreprise' => $ficheContact->getIdEntreprise(),
            'date_contact' => $ficheContact->getDate(),
            'moyenDeContact' => $ficheContact->getMoyenDeContact(),
            'demande' => $ficheContact->getDemande(),
            'reponse' => $ficheContact->getReponse()
        ]);
    }

    public function getContact($nbr){

         
        $sqlcontact = "SELECT * FROM `contact` GROUP BY date DESC LIMIT '$nbr'";
        $requetecontact = $this -> bd -> query ($sqlcontact);
        $donneescontact= $requetecontact->fetchall(PDO::FETCH_ASSOC);
        $tableauContact= array();      
            if($donneescontact != NULL){
                for ($i=0 ; $i<count($donneescontact) ;$i++){
            $tableauContact[]= new Annuaire($donneescontact[$i]['id'],$donneescontact[$i]['id_entreprise'],$donneescontact[$i]['id_utilisateur'],$donneescontact[$i]['date'],$donneescontact[$i]['moyen_contact'],
            $donneescontact[$i]['demande'],$donneescontact[$i]['reponse']);                
        }
        var_dump($tableauContact);
        return $tableauContact;
    } 
    }

}




?>