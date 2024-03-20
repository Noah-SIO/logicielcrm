<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post">
    <label for="id">ID:</label><br>
    <input type="number" id="id" name="id" required><br>
    <label for="dateDebut">Date debut:</label><br>
    <input type="date" id="dateDebut" name="dateDebut" required><br>
    <label for="dateFin">Date fin:</label><br>
    <input type="date" id="dateFin" name="dateFin" required><br>
    <label for="type">Type:</label><br>
    <input type="number" id="type" name="type" required><br>
    <label for="id_expediteur">ID Expediteur:</label><br>
    <input type="number" id="id_expediteur" name="id_expediteur" required><br>
    <label for="id_destinataire">ID Destinataire:</label><br>
    <input type="number" id="id_destinataire" name="id_destinataire" required><br>
    <label for="sujet">Sujet:</label><br>
    <textarea id="sujet" name="sujet" required></textarea><br>
    <label for="societeConcerne">Société concernée:</label><br>
    <input type="text" id="societeConcerne" name="societeConcerne" required><br>
    <label for="contenu">Contenu:</label><br>
    <textarea id="contenu" name="contenu" required></textarea><br>
    <label for="statut">Statut:</label><br>
    <input type="number" id="statut" name="statut" required><br>
    <input type="submit" value="Envoyer">
</form>
<p>-------------Test stop alerte-------------------<p>
<form method="post">
<label for="id">ID Alerte : </label><br>
    <input type="number" id="id" name="id" required><br>
<input type="submit" value="Envoyer">
</form>
<?php
require_once('rappelAlerte.php');
$bdsqll = new PDO("mysql:host=localhost;dbname=crm", 'root', '');
$test = new ManagerRappelAlerte($bdsqll);
if (isset($_POST['submit'])) {
    $rappelAlerte = new RappelAlerte(
        $_POST['id'],
        $_POST['dateDebut'],
        $_POST['dateFin'],
        $_POST['type'],
        $_POST['id_expediteur'],
        $_POST['id_destinataire'],
        $_POST['sujet'],
        $_POST['societeConcerne'],
        $_POST['contenu'],
        $_POST['statut']
    );
    var_dump($rappelAlerte);
    $test->sendAlerteRappel($rappelAlerte);
}
if(isset($_POST['id'])){
    $test->stopAlerte($_POST['id']);
}
?>
</body>
</html>