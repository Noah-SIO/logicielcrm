<?php
echo "<h2>Tableau de bord</h2>";
if ($_SESSION['droit'] == 1){
    echo "<div class='listeRappels'>";
    require('View/listeRappels.php');
    echo "</div>";
    //echo "<div class='dernierContact'>";
    //require('View/dernierContact.php');
    echo "</div>";
}

if ($_SESSION['droit'] == 2){
    echo "<div class='statistiques'>";
    require('View/statistiques.php');
    //echo "</div>";
    //echo "<div class='downloadFile'>";
    //require('View/downloadFile.php');
    echo "<div class='dernierContact'>";
    require('View/dernierContact.php');
    echo "</div>";
    echo "<div class='listeFicheContact'>";
    require('View/listeFicheContact.php');
    echo "</div>";
}

if ($_SESSION['droit'] == 3){
    echo "<div class='listeFicheContact'>";
    require('View/listeFicheContact.php');
    echo "</div>";
    echo "<div class='listeRappels'>";
    require('View/listeRappels.php');
    echo "</div>";
    echo "<input type='button' class='button2' value='Créer une fiche entreprise' onclick='document.location.href=\"?action=creerFicheEntreprise\"'>";
}

if ($_SESSION['droit'] == 4){
    echo "<div class='historiqueEntreprise'>";
    require('View/historiqueEntreprise.php');
    echo "</div>";
    //echo "<div class='attacheDocument'>";
    //require('View/attacheDocument.php');
    echo "</div>";
}

if ($_SESSION['droit'] == 5){
    echo "<div class='dernierProbleme'>";
    require('View/dernierProbleme.php');
    echo "</div>";
    echo "<div class='probleme'>";
    require('View/probleme.php');
    echo "</div>";
    echo "<a href='?action=creerProfil'>Créer un profil</a></br>";
}

if ($_SESSION['droit'] == 6){
    echo "</div>";
    echo "<div class='dernierProfil'>";
    require('View/dernierProfil.php');
    echo "</div>";
    //echo "<div class='dernierFichier'>";
    //require('View/derniersFichiers.php');
    //echo "</div>";
    // a verifier pour être sur qu'il y ait les derniers contacts
    echo "<div class='listeFicheContact'>";
    //require('View/dernierContact.php');
    echo "</div>";
    require('View/historiqueEntreprise.php');
    echo "</div>";
    echo "<div class='statistiques'>";
    require('View/statistiques.php');
    echo "</div>";
}
?>
