<?php
$managerUtilisateur = new ManagerUtilisateur();
$derniersProfils = $managerUtilisateur->returnAllUsers();
$derniersTroisProfils = array_slice($derniersProfils, -3, 3);
$poste = [1 => "Conseiller client", 2 => "Manager", 3 => "Commercial", 4 => "Comptable", 5 => "Responsable informatique", 6 => "Directeur général"];
echo "<h2>Les derniers Profils</h2>";
echo "<hr>";
foreach ($derniersTroisProfils as $utilisateur) {
    echo "Nom : " . $utilisateur->getNom() . "<br>";
    echo "Prénom : " . $utilisateur->getPrenom() . "<br>";
    echo "Identifiant : " . $utilisateur->getIdentifiant() . "<br>";
    echo "Profil : " . $poste[$utilisateur->getProfil()] . "<br>";
    echo '<a href="?action=ficheProfil&id=' . $utilisateur->getID() . '"><button class="MINIbutton">Voir la fiche</button></a>';
    echo "<hr>";
}
echo "</br></br>";
?>
