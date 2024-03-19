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
        $this ->statut=$statut;
    }
    //Fonction Get et Set
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    public function getIdUtilisateurResponsable() {
        return $this->id_utilisateur_responsable;
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

    public function __construct() {
        $this -> bd = new PDO("mysql:host=localhost;dbname=crm", 'root', '');
    }

    // traduit le statut, de int à string
    public function tradStatut($statut){
        if ($statut == 1){
            return "à faire";
        }
        if ($statut == 2){
            return "en cours";
        }
        if ($statut == 3){
            return "terminé";
        }
    }

    // renvoie les derniers problèmes envoyés, le nombre vaire en fonction de $nbr
    public function getLastIssues($nbr){
        $sql = 'SELECT `date`, statut, sujet, contenu FROM assistance ORDER BY `date` DESC LIMIT '.$nbr.'';
        $requete = $this -> bd -> query($sql);
        $donnees = $requete -> fetchAll(PDO::FETCH_ASSOC);
        for ($i = 0; $i < count($donnees); $i++) {
            echo "<ul>";
            echo "<li>date : ".$donnees[$i]['date']." statut : ".$this->tradStatut($donnees[$i]['statut'])." sujet : ".$donnees[$i]['sujet']." contenu : ".$donnees[$i]['contenu']." </li>";
            echo "</ul>";
        }
    }

    // renvoie les problèmes résolus, le nombre varie en fonction de $nbr
    public function getSolvedIssues($nbr){
        $sql = 'SELECT `date`, statut, sujet, contenu FROM assistance WHERE statut =3 ORDER BY `date` DESC LIMIT '.$nbr.'';
        $requete = $this -> bd -> query($sql);
        $donnees = $requete -> fetchAll(PDO::FETCH_ASSOC);
        for ($i = 0; $i < count($donnees); $i++) {
            echo "<ul>";
            echo "<li>date : ".$donnees[$i]['date']." sujet : ".$donnees[$i]['sujet']." contenu : ".$donnees[$i]['contenu']." </li>";
            echo "</ul>";
        }
    }

    // renvoie les problèmes à faire ou en cours, le nombre varie en fonction de $nbr
    public function getUnsolvedIssues($nbr){
        $sql = 'SELECT `date`, statut, sujet, contenu FROM assistance WHERE statut =1 or 2 ORDER BY `date` DESC LIMIT '.$nbr.'';
        $requete = $this -> bd -> query($sql);
        $donnees = $requete -> fetchAll(PDO::FETCH_ASSOC);
        for ($i = 0; $i < count($donnees); $i++) {
            echo "<ul>";
            echo "<li>date : ".$donnees[$i]['date']." statut : ".$this->tradStatut($donnees[$i]['statut'])." sujet : ".$donnees[$i]['sujet']." contenu : ".$donnees[$i]['contenu']." </li>";
            echo "</ul>";
        }
    }
}    
?>
