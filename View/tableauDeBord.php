<?php  // EN COURS, FINI LORSQUE LES VIEWS SERONT FINIES (utiliser CSS avec les div pour les organiser)

echo "<h2>Tableau de bord</h2></br> <h4>Bonjour ".$_SESSION['nom']." ".$_SESSION['prenom'].", nous sommes le ".date("d-m-Y")." | ".$poste[$_SESSION['droit']]."</h4></br>";

if ($_SESSION['droit'] == 1){
    echo "<div class='creerAlerte'>";
    require_once('View/creerAlerte.php');
    echo "</div>";
}

if ($_SESSION['droit'] == 2){
    echo "<div class=''>";
    require('View/.php');
    echo "</div>";
}

if ($_SESSION['droit'] == 3){
    echo "<div class=''>";
    require('View/.php');
    echo "</div>";
}

if ($_SESSION['droit'] == 4){
    echo "<div class=''>";
    require('View/.php');
    echo "</div>";
}

if ($_SESSION['droit'] == 5){
    echo "<div class='dernierProbleme'>";
    require('View/dernierProbleme.php');
    echo "</div>";
    echo "<div class='problemeEnCours'>";
    require('View/problemeEnCours.php');
    echo "</div>";
    echo "<div class='problemeResolus'>";
    require('View/problemeResolus.php');
    echo "</div>";
    echo "<div class='modifStatut'>";
    require('View/modifStatut.php');
    echo "</div>";
}

if ($_SESSION['droit'] == 6){
    echo "<div class='dernierProbleme'>";
    require('View/dernierProbleme.php');
    echo "</div>";
}
?>
