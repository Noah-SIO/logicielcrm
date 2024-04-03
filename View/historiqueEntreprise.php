<?php

$entreprise = new ManagerEntreprise();//même chose
$donneestableau = $entreprise->getHistoriqueEntreprise();//getHistoriqueEntreprise(nombre de client retourner)
echo "<h2>Derniers Clients</h2></br>";
echo "<hr>";

    if($donneestableau != NULL){
    for ($i = 0; $i < count($donneestableau); $i++) {
        echo $donneestableau[$i]->getNom(). " ".$donneestableau[$i]->getPrenom()."</br>";
        echo "Nom de la Societe : ".$donneestableau[$i]->getSociete()."</br>";
        echo "Date d'ajout : ".$donneestableau[$i]->getDateCreationCompte()."</p>";
        echo "<hr>";
        }
    }
    echo "</br></br>";
?>