<?php 

$test = new ManagerFichier();
?>
<form method="post">
<h1>Ajouter Document À un Client</h1></br>
        <label for="lien">Lien Document</label></br></br>
        <input type="file" id="lien" name="lien" required></br>
        <br>
        <label for="type">Le Type du Document</label></br></br>
        <select name="type">
            <option value="">--Choisissez un Type de Document--</option>
            <option value="1">Facture</option>
            <option value="2">Avoir</option>
            <option value="3">Contrat</option>
        </select></br></br>
        <label for="type">Et Le nom du Fichier</label></br></br>
        <input type="text" id="nom" name="nom" placeholder='ex : FactureNoah'required></br>
        <br>
        <input type="submit" value="Submit">
</form>
<?php
//LinkDocumentToClient liens fichier.php || Noah
if(isset($_POST['lien'])&&isset($_POST['type'])){
    $iduser = $_GET['id'];//à modifier si besoin
    $nom= $_POST['nom'];
    $date = date("Y-m-d");
    $lien = "Document/".$_POST['lien'];
    $type = $_POST['type'];
    $Document = new Fichier(NULL,$iduser,$nom,$date,$lien,$type);
    $test -> LinkDocumentToClient($Document);
    echo"Liens de Fichier Créer ";
    echo $lien;
}

?>