<?php

$rappel = new ManagerRappelAlerte();//même chose
$donneestableau = $rappel->getAlerteRappel($_SESSION['id']);
    echo "<h2>Vos Rappels et Alertes</h2></br>";
    if($donneestableau != NULL){
    for ($i = 0; $i < count($donneestableau); $i++) {
        echo $donneestableau[$i]->getDateDebut(). " -- ".$donneestableau[$i]->getDateFin()."</br>";
        echo "<p>".$donneestableau[$i]->getSujet()."</p>";
        echo "<p>".$donneestableau[$i]->getContenu()."</p></br>";
        }
    }
?>