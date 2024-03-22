<?php 

require_once('entreprise.php');

?>
<html>
    <form method="post">
        <fieldset>
            <legend> Fiche entreprise </legend>
            <label for="nom"> Nom </label></br>
            <input type="text" name="nom" id="nom" placeholder="Dupont"></br>

            <label for="prenom"> Prénom </label></br>
            <input type="text" name="prenom" id="prenom" placeholder="Michel"></br>

            <label for="societe"> Société </label></br>
            <input type="text" name="societe" id="societe" placeholder="Auto Clean"></br>

            <label for="poste"> Poste (dans votre société) </label></br>
            <input type="text" name="poste" id="poste" placeholder="DRH"></br>

            <label for="tel"> Numéro de téléphone </label></br>
            <input type="tel" name="tel" id="tel" placeholder="0303030303"></br>

            <label for="mail"> E-mail </label></br>
            <input type="email" name="mail" id="mail" placeholder="dupont@michel.fr"></br>

            <input type="submit" name="envoyer" id='envoyer' value='Envoyer'></br>
        </fieldset>
    </form>
</html>
<?php

if (isset($_POST['tel'], $_POST['mail'], $_POST['nom'], $_POST['prenom'], $_POST['poste'], $_POST['societe'])){
    $test = new Entreprise($_POST['nom'], $_POST['prenom'], $_POST['tel'], $_POST['mail'], $_POST['societe'], $_POST['poste'], 1 /*à remplacer par $_SESSION['id']*/, date("Y-m-d"));
    $testManager = new ManagerEntreprise();
    $testManager -> createClientFiche($test);
    //echo $test -> getId();
}


?>