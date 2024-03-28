<html>
    <form method="post">
        <label for="idAlerte">Pour terminer une alerte ou un rappel</label></br>
        <input type="number" name="idAlerte" id="idAlerte" placeholder="id de l'alerte ou du rappel"></br>
        <input type="submit" name="terminer" id='terminer' value='Terminer'></br>
    </form>
</html>
<?php

if (isset($_POST['idAlerte'])){
    $alerteRappelStatut = new ManagerRappelAlerte();
    $alerteRappelStatut -> stopAlerte($_POST['idAlerte']);
    if ($alerteRappelStatut -> stopAlerte($_POST['idAlerte']) ==  true){
        echo "-- Alerte ou rappel terminé --";
    }
}

?>