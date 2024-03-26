<?php
require_once("../Class/entreprise.php");///////A supprimer quand constructeur en place 
$bdsqll = new PDO("mysql:host=localhost;dbname=crm", 'root', '');//même chose
$enterprise = new ManagerEntreprise($bdsqll);//même chose
$donneestableau = $enterprise->getHistoriqueEntreprise(3);//getHistoriqueEntreprise(nombre de client retourner)
echo "<h2>Historique des derniers Clients</h2></br>";
    if($donneestableau != NULL){
    for ($i = 0; $i < count($donneestableau); $i++) {
        echo $donneestableau[$i]->getNom(). " ".$donneestableau[$i]->getPrenom()."</br>";
        echo "<p>Nom de la Societe : ".$donneestableau[$i]->getSociete()."</p>";
        echo "<p>Date d'ajout : ".$donneestableau[$i]->getDateCreationCompte()."</p></br>";
        }
    }
?>