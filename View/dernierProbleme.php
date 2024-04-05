<html>
    <form method="post">
        <label for="nombre">Les derniers problèmes ajoutés :</label></br>
    <!--    <input type="number" name="nombre" id="nombre" placeholder="entrer un chiffre"></br>
        <input type="submit" name="rechercher" id='rechercher' value='Rechercher'></br>           
    </form> -->
</html>
<?php

$dernierProbleme = new ManagerAssistance();
$dernierProbleme -> getLastIssues(10);
$dernierPb = $dernierProbleme -> getLastIssues(10);
for ($i = 0; $i < count($dernierPb); $i++) {
    echo "<ul>";
    echo "<li>date : ".$dernierPb[$i]['date']." | statut : ".$statut[$dernierPb[$i]['statut']]." | sujet : ".$dernierPb[$i]['sujet']." | contenu : ".$dernierPb[$i]['contenu']."";
    if ($dernierPb[$i]['date_resolution'] != NULL){
        echo " | date résolution : ".$dernierPb[$i]['date_resolution']."";
    }
    echo "</li>";
    echo "</ul>";
}

?>