<?php 
require_once('fichier.php');
$bdsqll = new PDO("mysql:host=localhost;dbname=crm", 'root', '');
$test = new ManagerFichier($bdsqll);
?>
<form method="post">
        <label for="iduser">Id User</label>
        <input type="text" id="iduser" name="iduser">
        <br>
        <label for="date">Date</label>
        <input type="date" id="date" name="date">
        <br>
        <label for="lien">Lien Document</label>
        <input type="text" id="lien" name="lien">
        <br>
        <label for="type">Type</label>
        <input type="text" id="type" name="type">
        <br>
        <input type="submit" value="Submit">
</form>
<?php
if(isset($_POST['iduser'])&&isset($_POST['date'])&&isset($_POST['lien'])&&isset($_POST['type'])){
    $iduser = $_POST['iduser'];
    $date = $_POST['date'];
    $lien = $_POST['lien'];
    $type = $_POST['type'];
    $Document = new Fichier($iduser,$date,$lien,$type);
    $test -> LinkDocumentToClient($Document);
    echo"Liens de Fichier Créer";
}

?>