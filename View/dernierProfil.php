<?php
$managerUtilisateur = new ManagerUtilisateur();
$derniersProfils = $managerUtilisateur->returnAllUsers();
$derniersTroisProfils = array_slice($derniersProfils, -3, 3);
$poste = [1 => "Conseiller client", 2 => "Manager", 3 => "Commercial", 4 => "Comptable", 5 => "Responsable informatique", 6 => "Directeur général"];
foreach ($derniersTroisProfils as $utilisateur) {
    //echo "ID : " . $utilisateur->getID() . "<br>";
    echo "Nom : " . $utilisateur->getNom() . "<br>";
    echo "Prénom : " . $utilisateur->getPrenom() . "<br>";
    echo "Identifiant : " . $utilisateur->getIdentifiant() . "<br>";
    echo "Profil : " . $poste[$utilisateur->getProfil()] . "<br>";
    echo "<hr>";
}
?>
