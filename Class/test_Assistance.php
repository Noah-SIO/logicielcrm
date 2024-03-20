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
    <form method="post">
        <fieldset>
            <legend> Fiche entreprise </legend>
            <label for="sujet"> Pour enregistrer un problème</label></br>
            <input type="number" name="idProbleme" id="idProbleme" placeholder="entrer votre id"></br>
            <input type="text" name="sujet" id="sujet" placeholder="entrer le sujet"></br>
            <input type="text" name="contenu" id="contenu" placeholder="entrer le contenu"></br>          
            <label> responsable(s) informatique(s) :</label>
<?php
$bd = new PDO("mysql:host=localhost;dbname=crm", 'root', '');
$s = 'SELECT id, nom, prenom, droit FROM utilisateur WHERE droit = 5';
$r = $bd -> query($s);
$donnees = $r -> fetchAll(PDO::FETCH_ASSOC);
for ($i = 0; $i < count($donnees); $i++) {
    echo "<div>
          <input type='radio' id='".$donnees[$i]['prenom']."' name='idResp' value=".$donnees[$i]['id']." />
          <label for='".$donnees[$i]['prenom']."'>".$donnees[$i]['nom']." ".$donnees[$i]['prenom']."</label>
          </div>";
}
?>
            <input type="submit" name="envoyer" id='envoyer' value='Envoyer'></br>
        </fieldset>
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
if (isset($_POST['sujet']) && isset($_POST['contenu']) && isset($_POST['idResp']) && isset($_POST['idProbleme'])){
    $testManager = new ManagerAssistance();
    $testManager -> registerIssue($_POST['idResp'], $_POST['idProbleme'], $_POST['sujet'], $_POST['contenu']);
}


?>
