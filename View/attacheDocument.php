<?php 

$test = new ManagerFichier();
?>
<form method="post">
<h1>Ajouter Document À un Client</h1></br>
        <label for="lien">Lien Document</label></br></br>
        <input type="file" id="lien" name="lien" required></br>
        <br>
        <label for="">Type document :</label> </br></br>
        <input type="radio" id="Facture" name='type' value='1' />
            <label for="Facture">Facture</label>
            </div>
            <div>
            <input type="radio" id="Avoir" name='type' value='2' />
            <label for="Avoir">Avoir</label>
            </div>
            <div>
            <input type="radio" id="Contrat" name='type' value='3' />
            <label for="Contrat">Contrat</label>
            </div> </br>
        <label for="type">Et Le nom du Fichier</label></br></br>
        <input type="text" id="nom" name="nom" placeholder='ex : FactureNoah'required></br>
        <br>
        <input type="submit" value="Envoyer" class='button'>
</form>
<?php
//LinkDocumentToClient liens fichier.php || Noah
if(isset($_POST['lien'])&&isset($_POST['type'])){
    $ident = $_GET['ident'];
    $nom= $_POST['nom'];
    $date = date("Y-m-d");
    $lien = "Document/".$_POST['lien'];
    $type = $_POST['type'];
    $Document = new Fichier(NULL,$ident,$nom,$date,$lien,$type);
    $test -> LinkDocumentToClient($Document);
    echo"Liens de Fichier Créer ";
    echo $lien;
}

?>