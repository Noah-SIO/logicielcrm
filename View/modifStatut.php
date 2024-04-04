<html>
    <form method="post">
        <select name="statut" id="statut">
            <option value="">- Choix du statut -</option>
            <option value=1>A faire</option>
            <option value=2>En cours</option>
            <option value=3>Terminé</option>
        </select>
        <input type="submit" name="rechercher" id='rechercher' value='Modifier'></br>
    </form>
</html>
<?php
if (isset($_POST['statut'])){
    $assistanceSatut = new ManagerAssistance();
    $assistanceSatut -> updateStatut($_SESSION['idProbleme'], $_POST['statut']);
    if ($assistanceSatut -> updateStatut($_SESSION['idProbleme'], $_POST['statut']) ==  true){
        echo "-- Statut changé --";
    }
}

?>