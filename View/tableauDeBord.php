<?php  // EN COURS, FINI LORSQUE LES VIEWS SERONT FINIES (utiliser CSS avec les div pour les organisées)

echo "<h2>Tableau de bord</h2></br> Bonjour ".$_SESSION['nom']." ".$_SESSION['prenom'].", nous sommes le ".date("d-m-Y").".</br>
    ID utilisateur : ".$_SESSION['id']." | ".$poste[$_SESSION['droit']]."</br>";

if ($_SESSION['droit'] == 1){
    echo "<div class='creerAlerte'>";
    require_once('View/creerAlerte.php');
    echo "</div>";
}

if ($_SESSION['droit'] == 2){
    echo "<div class=''>";
    require_once('View/.php');
    echo "</div>";
}

if ($_SESSION['droit'] == 3){
    echo "<div class=''>";
    require_once('View/.php');
    echo "</div>";
}

if ($_SESSION['droit'] == 4){
    echo "<div class=''>";
    require_once('View/.php');
    echo "</div>";
}

if ($_SESSION['droit'] == 5){
    echo "<div class='dernierProbleme'>";
    require_once('View/dernierProbleme.php');
    echo "</div>";
    echo "<div class='problemeEnCours'>";
    require_once('View/problemeEnCours.php');
    echo "</div>";
    echo "<div class='problemeResolus'>";
    require_once('View/problemeResolus.php');
    echo "</div>";
    echo "<div class='modifStatut'>";
    require_once('View/modifStatut.php');
    echo "</div>";
}

if ($_SESSION['droit'] == 6){
    echo "<div class='dernierProbleme'>";
    require_once('View/dernierProbleme.php');
    echo "</div>";
}

echo"<form action=''>
    <input type='submit' name='valider' class='button' value='Se déconnecter'/>
    </form>";
?>
