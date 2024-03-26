<?php
require_once("../Class/rappelAlerte.php");///////A supprimer quand constructeur en place 
$bdsqll = new PDO("mysql:host=localhost;dbname=crm", 'root', '');//même chose
$rappel = new ManagerRappelAlerte($bdsqll);//même chose
$donneestableau = $rappel->getAlerteRappel($_SESSION['id']);
    echo "<h2>Vos Rappel</h2></br>";
    if($donneestableau != NULL){
    for ($i = 0; $i < count($donneestableau); $i++) {
        if($donneestableau[$i]->getType()==1){
        echo $donneestableau[$i]->getDateDebut(). " -- ".$donneestableau[$i]->getDateFin()."</br>";
        echo "<p>".$donneestableau[$i]->getSujet()."</p>";
        echo "<p>".$donneestableau[$i]->getContenu()."</p></br>";
        }
    }}
?>