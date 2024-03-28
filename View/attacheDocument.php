<?php 

$test = new ManagerFichier();
?>
<form method="post">
<h1>Ajouter Document À un Client</h1></br>
        <label for="lien">Lien Document</label></br></br>
        <input type="file" id="lien" name="lien" required></br>
        <br>
        <label for="type">Type (Facture 1, Avoir 2, Contrat 3)</label></br></br>
        <input type="number" id="type" name="type" min='1' max='3' placeholder='ex : Facture.pdf = 1'required></br></br>
        <label for="type">Et Le nom du Fichier</label></br></br>
        <input type="text" id="nom" name="nom" placeholder='ex : FactureNoah'required></br>
        <br>
        <input type="submit" value="Submit">
</form>
<?php
//LinkDocumentToClient liens fichier.php || Noah
if(isset($_POST['lien'])&&isset($_POST['type'])){
    $iduser = 1;//$_GET['iduser'];
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