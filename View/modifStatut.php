<html>
<?php

if (isset($_POST['statut']) && isset($_POST['idStatut'])){
    $assistanceSatut = new ManagerAssistance();
    $assistanceSatut -> updateStatut($_POST['idStatut'], $_POST['statut']);
    if ($assistanceSatut -> updateStatut($_POST['idStatut'], $_POST['statut']) ==  true){
        echo "-- Statut changé --";
        echo "<script>setTimeout(function(){location.reload(); },3000);</script>";
    }
}

?>
    <form method="post">
        <label for="statut">Pour modifier le statut</label></br>
        <input type="number" name="idStatut" id="idStatut" placeholder="id du problème"></br>
        <select name="statut" id="statut">
            <option value="">- Choix du statut -</option>
            <option value=1>A faire</option>
            <option value=2>En cours</option>
            <option value=3>Terminé</option>
        </select>
        <input type="submit" name="rechercher" id='rechercher' value='Modifier'></br>
    </form>
</html>
