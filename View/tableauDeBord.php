<?php  // EN COURS, FINI LORSQUE LES VIEWS SERONT FINIES (utiliser CSS avec les div pour les organiser)

echo "<h2>Tableau de bord</h2></br> <h4>Bonjour ".$_SESSION['nom']." ".$_SESSION['prenom'].", nous sommes le ".date("d-m-Y")." | ".$poste[$_SESSION['droit']]."</h4></br>";

if ($_SESSION['droit'] == 1){
    echo "<div class='listeFicheContact'>";
    require('View/listeFicheContact.php');
    echo "</div>";
    echo "<div class='resumeAlertes'>";
    require('View/ResumeAlertes.php');
    echo "</div>";
    echo "<div class='listeRappels'>";
    require('View/listeRappels.php');
    echo "</div>";
    echo "<div class='dernierContact'>";
    require('View/dernierContact.php');
    echo "</div>";
    echo "<a href='?action=creerAlerte'>Créer une alerte</a></br>";
    echo "<a href='?action=creerRappel'>Créer un rappel</a></br>";
    echo "<a href='?action=modifierAlerteRappel'>Modifier une alerte ou un rappel</a></br>";
}

if ($_SESSION['droit'] == 2){
    echo "<div class='statistiques'>";
    require('View/statistiques.php');
    echo "</div>";
    echo "<div class='downloadFile'>";
    require('View/downloadFile.php');
    echo "</div>";
    echo "<div class='listeFicheContact'>";
    require('View/listeFicheContact.php');
    echo "</div>";
}

if ($_SESSION['droit'] == 3){
    echo "<div class='attacheDocument'>";
    require('View/attacheDocument.php');
    echo "</div>";
    echo "<div class='listeFicheContact'>";
    require('View/listeFicheContact.php');
    echo "</div>";
    echo "<div class='resumeAlertes'>";
    require('View/ResumeAlertes.php');
    echo "</div>";
    echo "<a href='?action=creerFicheEntreprise'>Créer une fiche entreprise</a></br>";
    echo "<a href='?action=modifFicheEntreprise'>Modifier une fiche entreprise</a></br>";
    echo "<a href='?action=creerFicheContact'>Créer une fiche contact</a></br>";
    echo "<a href='?action=modifFicheContact'>Modifier une fiche contact</a></br>";
}

if ($_SESSION['droit'] == 4){
    echo "<div class='historiqueEntreprise'>";
    require('View/historiqueEntreprise.php');
    echo "</div>";
    echo "<div class='attacheDocument'>";
    require('View/attacheDocument.php');
    echo "</div>";
}

if ($_SESSION['droit'] == 5){
    echo "<div class='dernierProbleme'>";
    require('View/dernierProbleme.php');
    echo "</div>";
    echo "<div class='probleme'>";
    require('View/probleme.php');
    echo "</div>";
    echo "<div class='modifStatut'>";
    require('View/modifStatut.php');
    echo "</div>";
    echo "<a href='?action=creerProfil'>Créer un profil</a></br>";
    echo "<a href='?action=modifProfil'>Modifier un profil</a></br>";
}

if ($_SESSION['droit'] == 6){
    echo "</div>";
    echo "<div class='dernierProfil'>";
    require('View/dernierProfil.php');
    echo "</div>";
    //echo "<div class='dernierFichier'>";
    //require('View/derniersFichiers.php');
    echo "</div>";
    // a verifier pour être sur qu'il y ait les derniers contacts
    echo "<div class='listeFicheContact'>";
    require('View/dernierContact.php');
    echo "</div>";
    require('View/historiqueEntreprise.php');
    echo "</div>";
    echo "<div class='statistiques'>";
    require('View/statistiques.php');
    echo "</div>";
}
?>
