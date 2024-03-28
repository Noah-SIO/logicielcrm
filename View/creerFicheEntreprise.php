<form method="post" action="">
    <label for="nom">Nom:</label>
    <input type="text" name="nom" required><br>
    <label for="prenom">Prénom:</label>
    <input type="text" name="prenom" required><br>
    <label for="societe">Nom société:</label>
    <input type="text" name="societe" required><br>
    <label for="poste">Poste:</label>
    <input type="text" name="poste" required><br>
    <label for="id_commercial">ID commercial:</label>
    <input type="text" name="id_commercial" required><br>
    <label for="date">Date:</label>
    <input type="date" name="date" required><br>
    <input type="submit" name="creer" value="Créer">
</form>
<?php
if(isset($_POST['creer'])){
    $newEntreprise = new Entreprise($_POST['nom'], $_POST['prenom'], $_POST['societe'], $_POST['poste'], $_POST['id_commercial'], $_POST['date']);
    $entrepriseManager = new ManagerEntreprise();
    $entrepriseManager->createClientFiche($newEntreprise);
}
?>

