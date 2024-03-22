<?php 

require_once('../Class/assistance.php');

?>
<html>
    <form method="post">
            <label for="statut"> Pour changer le statut</label></br>
            <input type="number" name="statut" id="statut" placeholder="entrer le statut (1,2,3)"></br>
            <input type="number" name="idStatut" id="idStatut" placeholder="entrer l'id"></br>
            <input type="submit" name="rechercher" id='rechercher' value='Rechercher'></br>
    </form>
</html>
<?php

if (isset($_POST['statut']) && isset($_POST['idStatut'])){
    $testManager = new ManagerAssistance();
    $testManager -> updateStatut($_POST['idStatut'], $_POST['statut']);

    echo "Statut changé";
}

?>