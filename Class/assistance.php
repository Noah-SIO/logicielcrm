<?php 

Class Assistance{
    //Valeur privée
    private $id;
    private $idUtilisateurResponsable;
    private $idUtilisateurProbleme;
    private $date;
    private $solution;
    private $statut;
//Constructeur
    public function __construct($id,$idUtilisateurResponsable,$idUtilisateurProbleme,$date,$solution,$statut){
        $this ->id=$id;
        $this ->idUtilisateurResponsable = $idUtilisateurResponsable;
        $this ->idUtilisateurProbleme=$idUtilisateurProbleme;
        $this ->date=$date;
        $this ->solution=$solution;
        $this ->statut= $statut;
    }
    //Fonction Get et Set
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    public function getIdUtilisateurResponsable() {
        return $this->idUtilisateurResponsable;
    }

    public function setIdUtilisateurResponsable($idUtilisateurResponsable) {
        $this->idUtilisateurResponsable = $idUtilisateurResponsable;
    }
    public function getIdUtilisateurProbleme() {
        return $this->idUtilisateurProbleme;
    }

    public function setIdUtilisateurProbleme($idUtilisateurProbleme) {
        $this->idUtilisateurProbleme = $idUtilisateurProbleme;
    }
    public function getDate() {
        return $this->date;
    }

    public function setNumClient($date) {
        $this->date = $date;
    }
    public function getSolution() {
        return $this->solution;
    }

    public function setSolution($solution) {
        $this->solution = $solution;
    }
    public function getStatut() {
        return $this->statut;
    }

    public function setStatut($statut) {
        $this->statut = $statut;
    }
}

class ManagerAssistance{
    private $bd;
    private $statut;

    public function __construct() {
        $this -> bd = new PDO("mysql:host=localhost;dbname=crm", 'root', '');
        $this ->statut= [1 => "à faire", 2 => "en cours", 3 => "terminé"];
    }

    // change le $statut 1,2 ou 3 en fonction de l'id du problème
    public function updateStatut($id, $statut){
        if ($statut != NULL && $id != NULL){
            if ($statut == 3){
                $sql = 'UPDATE assistance SET statut='.$statut.', date_resolution="'.date("Y-m-d").'" WHERE id='.$id.'';
                $requete = $this -> bd -> query($sql);
                $requete -> fetch(PDO::FETCH_ASSOC);
                return true;
            } else {
                $sql = 'UPDATE assistance SET statut='.$statut.' WHERE id='.$id.'';
                $requete = $this -> bd -> query($sql);
                $requete -> fetch(PDO::FETCH_ASSOC);
                return true;
            }
        }
    }

    // renvoie les derniers problèmes envoyés, le nombre varie en fonction de $nbr
    public function getLastIssues($nbr){
        if ($nbr != NULL) {
            $sql = 'SELECT * FROM assistance ORDER BY `date` LIMIT '.$nbr.'';
            $requete = $this -> bd -> query($sql);
            $donnees = $requete -> fetchAll(PDO::FETCH_ASSOC);
            for ($i = 0; $i < count($donnees); $i++) {
                echo "<ul>";
                echo "<li>id : ".$donnees[$i]['id']." | date : ".$donnees[$i]['date']." | statut : ".$this->statut[$donnees[$i]['statut']]." | sujet : ".$donnees[$i]['sujet']." | contenu : ".$donnees[$i]['contenu']." | date résolution : ".$donnees[$i]['date_resolution']."</li>";
                echo "</ul>";
            }
        }
    }

    public function getIssues($filtre, $nbr){
        if ($nbr != NULL) {
            if ($filtre == 3){
                $sql = 'SELECT * FROM assistance WHERE statut ='.$filtre.' ORDER BY `date` DESC LIMIT '.$nbr.'';
                $requete = $this -> bd -> query($sql);
                $donnees = $requete -> fetchAll(PDO::FETCH_ASSOC);
                for ($i = 0; $i < count($donnees); $i++) {
                    echo "<ul>";
                    echo "<li>id : ".$donnees[$i]['id']." | date : ".$donnees[$i]['date']." | statut : ".$this->statut[$donnees[$i]['statut']]." | sujet : ".$donnees[$i]['sujet']." | contenu : ".$donnees[$i]['contenu']." | date résolution : ".$donnees[$i]['date_resolution']."</li>";
                    echo "</ul>";
                }
            } else {
                $sql = 'SELECT id, `date`, statut, sujet, contenu FROM assistance WHERE statut ='.$filtre.' ORDER BY `date` DESC LIMIT '.$nbr.'';
                $requete = $this -> bd -> query($sql);
                $donnees = $requete -> fetchAll(PDO::FETCH_ASSOC);
                for ($i = 0; $i < count($donnees); $i++) {
                    echo "<ul>";
                    echo "<li>id : ".$donnees[$i]['id']." | date : ".$donnees[$i]['date']." | statut : ".$this->statut[$donnees[$i]['statut']]." | sujet : ".$donnees[$i]['sujet']." | contenu : ".$donnees[$i]['contenu']." </li>";
                    echo "</ul>";
                }
            }
        }   
    }

    // enregistre une fiche problème, selon l'id du responsable info, l'id de l'user qui a un problème, le sujet et le contenu
    public function registerIssue($idRespInfo, $idProbleme, $sujet, $contenu){
        if ($idProbleme != NULL && $sujet != NULL && $contenu != NULL){
            $sql = 'INSERT INTO assistance (id_responsable, id_probleme, `date`, sujet, contenu, statut) VALUES ('.$idRespInfo.', '.$idProbleme.', "'.date("Y-m-d").'", "'.$sujet.'", "'.$contenu.'", 1)';
            $requete = $this -> bd -> query($sql);
            $donnees = $requete -> fetch(PDO::FETCH_ASSOC);
        }
    }

    public function registerIssueNoConnect($idRespInfo, $nom, $sujet, $contenu){
        $sqlid = "SELECT id FROM utilisateur WHERE nom= '$nom'";
        $requeteid = $this -> bd -> query($sqlid);
        $donneesid= $requeteid->fetch(PDO::FETCH_ASSOC);
        if($donneesid != NULL && $contenu != NULL){    
            $idProbleme=$donneesid['id'];
            $sql = 'INSERT INTO assistance (id_responsable, id_probleme, `date`, sujet, contenu, statut) VALUES ('.$idRespInfo.', '.$idProbleme.', "'.date("Y-m-d").'", "'.$sujet.'", "'.$contenu.'", 0)';
            $requete = $this -> bd -> query($sql);
            $donnees = $requete -> fetch(PDO::FETCH_ASSOC);
        }
    }
        
        public function statsNumberOfIssues(){
            $date = date('Y-m-d', strtotime('-10 days'));
            $sql = "SELECT COUNT(*) as nb FROM assistance WHERE `date` >= '{$date}'";
            $requete = $this->bd->query($sql);
            $donnees = $requete -> fetch(PDO::FETCH_ASSOC);
            return $donnees['nb'];
        }
    
        public function statsTimeSolvedIssues(){
            $date = date('Y-m-d', strtotime('-10 days'));
            $sql = "SELECT AVG(TIMESTAMPDIFF(DAY, date, date_resolution)) AS moy FROM assistance;";
            $requete = $this->bd->query($sql);
            $donnees = $requete -> fetch(PDO::FETCH_ASSOC);
            return $donnees['moy'];
        }
    }    
    
?>
