<?php 

require_once('assistance.php');

?>
<html>
    <form method="post">
            <label for="nombre"> Pour rechercher les derniers problèmes ajoutés </label></br>
            <input type="number" name="nombre" id="nombre" placeholder="entrer un chiffre"></br>
            <input type="submit" name="rechercher" id='rechercher' value='Rechercher'></br>           
    </form>
    <form method="post">
            <label for="nombre2"> Pour rechercher les problèmes résolus </label></br>
            <input type="number" name="nombre2" id="nombre2" placeholder="entrer un chiffre"></br>
            <input type="submit" name="rechercher" id='rechercher' value='Rechercher'></br>
    </form>
    <form method="post">
            <label for="nombre3"> Pour rechercher les problèmes à faire ou en cours </label></br>
            <input type="number" name="nombre3" id="nombre3" placeholder="entrer un chiffre"></br>
            <input type="submit" name="rechercher" id='rechercher' value='Rechercher'></br>
    </form>
    <form method="post">
            <label for="statut"> Pour changer le statut</label></br>
            <input type="number" name="statut" id="statut" placeholder="entrer le statut (1,2,3)"></br>
            <input type="number" name="idStatut" id="idStatut" placeholder="entrer l'id"></br>
            <input type="submit" name="rechercher" id='rechercher' value='Rechercher'></br>
    </form>
</html>
<?php

if (isset($_POST['nombre'])){
    $testManager = new ManagerAssistance();
    $testManager -> getLastIssues($_POST['nombre']);
}
if (isset($_POST['nombre2'])){
    $testManager = new ManagerAssistance();
    $testManager -> getSolvedIssues($_POST['nombre2']);
}
if (isset($_POST['nombre3'])){
    $testManager = new ManagerAssistance();
    $testManager -> getUnsolvedIssues($_POST['nombre3']);
}
if (isset($_POST['statut']) && isset($_POST['idStatut'])){
    $testManager = new ManagerAssistance();
    $testManager -> updateStatut($_POST['idStatut'], $_POST['statut']);
}

?>
