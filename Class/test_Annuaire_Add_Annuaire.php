
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Test pour l'ajout d'un element dans l'annuaire || romain -->
<form method="post">
    <label for="id">ID:</label><br>
    <input type="number" name="id" id="id" placeholder="ID" min="1" required><br>
    <label for="idEntreprise">ID Entreprise:</label><br>
    <input type="number" name="idEntreprise" id="idEntreprise" placeholder="ID Entreprise" min="1" required><br>
    <label for="type">Type:</label><br>
    <input type="number" name="type" id="type" placeholder="Type" min="1" required><br>
    <label for="ValeurDeContact">Valeur De Contact:</label><br>
    <input type="text" name="ValeurDeContact" id="ValeurDeContact" placeholder="Valeur De Contact" required><br>
    <label for="date">Date:</label><br>
    <input type="date" name="date" id="date" required><br>
    <input type="submit" name="ajouter" value="Ajouter" id="ajouter">
</form>

<?php

require_once('annuaire.php');
if (isset($_POST['ajouter'])) {
    $annuaire = new Annuaire(
        $_POST['id'],
        $_POST['idEntreprise'],
        $_POST['type'],
        $_POST['ValeurDeContact'],
        $_POST['date']
    );
    var_dump($annuaire);
    $test = new ManagerAnnuaire();
    $test->addContactToAnnuaire($annuaire);
}

?>
</body>
</html>
