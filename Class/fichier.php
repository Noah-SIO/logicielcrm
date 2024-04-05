<?php 

Class Fichier{
    //Valeur privée
    private $id;
    private $idEntreprise;
    private $nom;
    private $type;
    private $lienDoc;
    private $date;
//Constructeur
    public function __construct($id,$idEntreprise,$nom,$date,$lienDoc,$type){
        $this -> id = $id;// si ID n'est pas utilisatble mettez null en paramètre 
        $this -> idEntreprise = $idEntreprise;
        $this ->nom=$nom;
        $this ->date=$date;
        $this ->lienDoc=$lienDoc;
        $this ->type=$type;
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
    public function getNom() {
        return $this->nom;
    }
    public function setNom($nom) {
        $this->nom = $nom;
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
class ManagerFichier {
    private $bd;
    public function __construct(){
        $this -> bd = new PDO("mysql:host=localhost;dbname=crm", 'root', '');
    }

   public function LinkDocumentToClient($Fichier){
    $iduser = $Fichier->getIdEntreprise() ;
    $nom = $Fichier->getNom();
    $date = $Fichier->getDate();
    $lien = $Fichier->getLienDoc();
    $type= $Fichier->getType();
    $sql2 = "INSERT INTO fichier (id_utilisateur,nom,date,lien,type) VALUES ('$iduser','$nom','$date','$lien','$type')";
    $requete2 = $this-> bd -> query ($sql2);
   } 

    public function GetFichierByClient($userid=NULL) {
            $sqlrecherche = $userid ? "SELECT * FROM `fichier` WHERE id_utilisateur=?" : "SELECT * FROM `fichier`";
            $requete = $this->bd->prepare($sqlrecherche);
            $requete->execute($userid ? [$userid] : []);
            $donneesrecherche= $requete->fetchall(PDO::FETCH_ASSOC); 
            $tableauRecherche= array();      
                if($donneesrecherche != NULL){
                    foreach($donneesrecherche as $donnees){
                        $tableauRecherche[]= new Fichier($donnees['id'],$donnees['id_utilisateur'],$donnees['nom'],$donnees['date'],
                        $donnees['lien'],$donnees['type']);                
                    }
                }
            return $tableauRecherche;
            }




    public function GetFichierByName($name) {
        $sqlrecherche = "SELECT * FROM `fichier` WHERE nom LIKE '%$name%'";
        $requeterecherche = $this -> bd -> query ($sqlrecherche);
        $donneesrecherche= $requeterecherche->fetchall(PDO::FETCH_ASSOC); 
        $tableauRecherche= array();      
        if($donneesrecherche != NULL){
            for ($i=0 ; $i<count($donneesrecherche) ;$i++){
                $tableauRecherche[]= new Fichier($donneesrecherche[$i]['id'],$donneesrecherche[$i]['id_utilisateur'],$donneesrecherche[$i]['nom'],$donneesrecherche[$i]['date'],
                $donneesrecherche[$i]['lien'],$donneesrecherche[$i]['type']);                
            }
            return $tableauRecherche;
        }
    }

    public function DeleteDoc($id) {
        $sql = 'DELETE FROM fichier WHERE id_utilisateur = :id';
        $requete = $this->bd->prepare($sql);
        $requete->bindParam(':id', $id, PDO::PARAM_INT);
        return $requete->execute();
    }
}
?>    
