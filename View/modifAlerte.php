<?php
if(isset($_GET['idAlerte']) && ($_GET['statutAlerte'])){
    $alerteStatut = new ManagerRappelAlerte();
    $alerteStatut -> getAlerteSelected($_GET['idAlerte'], $_GET['statutAlerte']);
    $alerteSelected = $alerteStatut -> getAlerteSelected($_GET['idAlerte'], $_GET['statutAlerte']);
    echo "<b>date début :</b> ".$alerteSelected['date_debut']." </br>
        <b>date fin :</b> ".$alerteSelected['date_fin']." </br>
        <b>statut :</b> ".$alerte[$alerteSelected['statut']]." </br>
        <b>sujet :</b> ".$alerteSelected['sujet']." </br>
        <b>contenu :</b> ".$alerteSelected['contenu']."";
}
?>
<html>
    <form method="post"></br>
        <label for="idAlerte">Êtes-vous de vouloir terminer le rappel ci-dessus ?</label></br>
        <input type="submit" name="terminer" id='terminer' value='Terminer'></br>
    </form>
</html>
<?php

if (isset($_POST['terminer'])){
    $alerteRappelStatut = new ManagerRappelAlerte();
    $alerteRappelStatut -> stopAlerte($_GET['idAlerte']);
    if ($alerteRappelStatut -> stopAlerte($_GET['idAlerte']) ==  true){
        echo "-- Alerte ou rappel terminé --";
    }
}

?>