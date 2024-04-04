<html>
    <form method="post">
        <label for="idAlerte">Pour terminer une alerte ou un rappel</label></br>
        <input type="submit" name="terminer" id='terminer' value='Terminer'></br>
    </form>
</html>
<?php

if (isset($_POST['terminer'])){
    $alerteRappelStatut = new ManagerRappelAlerte();
    $alerteRappelStatut -> stopAlerte($_GET['idalerte']);
    if ($alerteRappelStatut -> stopAlerte($_POST['idAlerte']) ==  true){
        echo "-- Alerte ou rappel terminé --";
    }
}

?>