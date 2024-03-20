<?php 

Class FicheContact{
    private $id;
    private $idCompte;
    private $idEntreprise;
    private $date;
    private $moyenDeContact;
    private $demande;
    private $reponse;


    
    public function __construct($idCompte, $idEntreprise, $date, $moyenDeContact, $demande, $reponse){
        $this -> idCompte = $idCompte;
        $this -> idEntreprise = $idEntreprise;
        $this -> date = $date;
        $this -> moyenDeContact = $moyenDeContact;
        $this -> demande = $demande;
        $this -> reponse = $reponse;
    }

//  id
    public function getId() {
        return $this->id['id'];
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

    public function createFicheContact($ficheContact)
    {
        $sql = "INSERT INTO contact (id_utilisateur, id_entreprise, date, moyen_contact, demande, reponse) VALUES (:idCompte, :idEntreprise, :date_contact, :moyenDeContact, :demande, :reponse)";
        $req = $this->bd->prepare($sql);

        $params = [
            'idCompte' => $ficheContact->getIdCompte(),
            'idEntreprise' => $ficheContact->getIdEntreprise(),
            'date_contact' => $ficheContact->getDate(),
            'moyenDeContact' => $ficheContact->getMoyenDeContact(),
            'demande' => $ficheContact->getDemande(),
            'reponse' => $ficheContact->getReponse()
        ];

        $req->execute($params);
        $sql = "SELECT id FROM contact ORDER BY id DESC LIMIT 1;";
        $req = $this->bd->prepare($sql);
        $req->execute();
        $id = $req->fetch();
        $ficheContact->setId($id);
    }




    public function getContact($nbr){
        $sqlcontact = "SELECT * FROM `contact` GROUP BY date DESC";
        if($nbr != 0){ 
        $sqlcontact = "SELECT * FROM `contact` GROUP BY date DESC LIMIT $nbr";
        }
        $requetecontact = $this -> bd -> query ($sqlcontact);
        $donneescontact= $requetecontact->fetchall(PDO::FETCH_ASSOC);
        $tableauContact= array();      
            if($donneescontact != NULL){
                for ($i=0 ; $i<count($donneescontact) ;$i++){
            $tableauContact[]= new FicheContact($donneescontact[$i]['id_utilisateur'],$donneescontact[$i]['id_entreprise'],$donneescontact[$i]['date'],$donneescontact[$i]['moyen_contact'],
            $donneescontact[$i]['demande'],$donneescontact[$i]['reponse']);                
        }
        var_dump($tableauContact);
        return $tableauContact;
    } 
    }





    public function getContactHistorique($id_entreprise,$nbr){
        $sqlhistorique  = "SELECT * FROM `contact` WHERE id_entreprise=$id_entreprise GROUP BY date DESC";
        if($nbr!=0){
        $sqlhistorique  = "SELECT * FROM `contact` WHERE id_entreprise=$id_entreprise GROUP BY date DESC LIMIT $nbr";
        }
        $requetehistorique = $this -> bd -> query ($sqlhistorique);
        $donneeshistorique= $requetehistorique->fetchall(PDO::FETCH_ASSOC);
        $tableauHistorique= array();      
            if($donneeshistorique != NULL){
                for ($i=0 ; $i<count($donneeshistorique) ;$i++){
            $tableauHistorique[]= new FicheContact($donneeshistorique[$i]['id_utilisateur'],$donneeshistorique[$i]['id_entreprise'],$donneeshistorique[$i]['date'],$donneeshistorique[$i]['moyen_contact'],
            $donneeshistorique[$i]['demande'],$donneeshistorique[$i]['reponse']);                
        }
        var_dump($tableauHistorique);
        return $tableauHistorique;
    } 
}

    public function deleteContact($idContact){
    $sql = "DELETE FROM contact WHERE id = :idContact";
    $req = $this->bd->prepare($sql);
    $req->bindParam(':idContact', $idContact, PDO::PARAM_INT);
    return $req->execute();
}

    public function modifContact($ficheContact){
        $sql = "UPDATE contact SET id_utilisateur=:idCompte, id_entreprise=:idEntreprise, date=:date_contact, moyen_contact=:moyenDeContact, demande=:demande, reponse=:reponse WHERE id=:id";
        $req = $this->bd->prepare($sql);
        $params = ['idCompte' => $ficheContact->getIdCompte(),'idEntreprise' => $ficheContact->getIdEntreprise(),'date_contact' => $ficheContact->getDate(),'moyenDeContact' => $ficheContact->getMoyenDeContact(),'demande' => $ficheContact->getDemande(),'reponse' => $ficheContact->getReponse(),'id' => $ficheContact->getId()];
        var_dump($params);
        $req->execute($params);
    }

}




?>