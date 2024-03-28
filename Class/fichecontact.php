<?php 

Class FicheContact{
    private $id;
    private $idCompte;
    private $idEntreprise;
    private $moyenDeContact;
    private $demande;
    private $reponse;
    private $date;


    
    public function __construct($id,$idCompte, $idEntreprise, $date, $demande, $reponse, $moyenDeContact){
        $this -> id = $id;
        $this -> idCompte = $idCompte;
        $this -> idEntreprise = $idEntreprise;
        $this -> moyenDeContact = $moyenDeContact;
        $this -> demande = $demande;
        $this -> reponse = $reponse;
        $this -> date = $date;
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

    public function createFicheContact(FicheContact $ficheContact) {
        $sql = "INSERT INTO contact (id_utilisateur, id_entreprise, moyen_contact, demande, reponse, date) VALUES (:idCompte, :idEntreprise, :moyenDeContact, :demande, :reponse,:date_contact)";
        $req = $this->bd->prepare($sql);
        $params = [
            'idCompte' => $ficheContact->getIdCompte(),
            'idEntreprise' => $ficheContact->getIdEntreprise(),
            'moyenDeContact' => $ficheContact->getMoyenDeContact(),
            'demande' => $ficheContact->getDemande(),
            'reponse' => $ficheContact->getReponse(),
            'date_contact' => $ficheContact->getDate()
        ];
        $req->execute($params);
        $ficheContact->setId($this->bd->lastInsertId());
    }


    public function returnAllUsers() {
        $sql = "SELECT * FROM contact";
        $requete = $this->bd->query($sql);
        $donnees = $requete->fetchAll(PDO::FETCH_ASSOC);
        $tableauContacts = array();      
        if ($donnees != NULL) {
            foreach ($donnees as $contactData) {
                $contact = new FicheContact(
                    null,
                    $contactData['id_utilisateur'],
                    $contactData['id_entreprise'],
                    $contactData['date'],
                    $contactData['moyen_contact'],
                    $contactData['demande'],
                    $contactData['reponse']
                );
                $tableauContacts[] = $contact;

            }
        }         
        return $tableauContacts;
    }
    

    public function getContact() {
        $sql = "SELECT * FROM `contact` ORDER BY date DESC";
        $requete = $this->bd->query($sql);
        $donnees = $requete->fetchAll(PDO::FETCH_ASSOC);
        $tableauContacts = array();      
        
        if ($donnees != NULL) {
            foreach ($donnees as $contactData) {
                $contact = new FicheContact(
                    $contactData['id'],
                    $contactData['id_utilisateur'],
                    $contactData['id_entreprise'],
                    $contactData['date'],
                    $contactData['moyen_contact'],
                    $contactData['demande'],
                    $contactData['reponse']
                );
                $tableauContacts[] = $contact;

            }
        } 
        
        return $tableauContacts;
    }
    

    public function getContactByID($id) {
        $sql = "SELECT * FROM `contact` WHERE id = ?";
        $requete = $this->bd->prepare($sql);
        $requete->execute([$id]);
        $donnees = $requete->fetchAll(PDO::FETCH_ASSOC);
        $tableauContacts = [];
        
        foreach ($donnees as $contactData) {
            $contact = new FicheContact(
                $contactData['id'],
                $contactData['id_utilisateur'],
                $contactData['id_entreprise'],
                $contactData['date'],
                $contactData['demande'],
                $contactData['reponse'],
                $contactData['moyen_contact']
            );
            $tableauContacts[] = $contact;
        }
        
        return $tableauContacts;
    }
    




    public function getContactHistorique($id_entreprise,$nbr){
        $sqlHistorique = "SELECT * FROM contact WHERE id_entreprise = ? ORDER BY date DESC";
        if($nbr != 0){
            $sqlHistorique = "SELECT * FROM contact WHERE id_entreprise = ? ORDER BY date DESC LIMIT ?";
            }
        $reqHistorique = $this->bd->prepare($sqlHistorique);
        $reqHistorique->execute([$id_entreprise, $nbr]);
        $historiqueData = $reqHistorique->fetchAll(PDO::FETCH_ASSOC);
        $historiqueContacts = [];

        foreach ($historiqueData as $contactData) {
            $historiqueContacts[] = new FicheContact(
                null,
                $contactData['id_utilisateur'],
                $contactData['id_entreprise'],
                $contactData['date'],
                $contactData['moyen_contact'],
                $contactData['demande'],
                $contactData['reponse']
            );
        }
        return $tableauHistorique;
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
        $req->execute($params);
    }
    
    public function  StatOnContact(){
        $sqlnbclient = $this->bd->query("SELECT COUNT(DISTINCT id_entreprise) as Nbclient FROM contact");
        $donneesnbclient= $sqlnbclient->fetch();
        $sqlnbclient->closeCursor();
        //le nombre de client, le pourcentages par moi et le nombre par jour.
        //En Cours de crétion Noah
        $date= date("Y-m-d");
        $sqldate=$this->bd->query("SELECT count(*) as Nbjour FROM contact WHERE date = '$date'");
        $donneesdate= $sqldate->fetch();
        $sqldate->closeCursor();
        $sqlmois =$this->bd->query("SELECT count(*) as Nbmois FROM contact WHERE date >= DATE_SUB(CURRENT_DATE, INTERVAL 1 MONTH)");
        $donneesmois= $sqlmois->fetch();
        $sqlmois->closeCursor();  
        $Tableau = ['nombreclient' => $donneesnbclient['Nbclient'], 'nombreparjour' =>$donneesdate['Nbjour'], 'nombreparmois' =>$donneesmois['Nbmois']];
        return $Tableau;
    }
}
?>