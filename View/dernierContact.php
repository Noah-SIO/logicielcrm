<?php
$managerUtilisateur = new ManagerUtilisateur();
$derniersProfils = $managerUtilisateur->returnAllUsers();
$derniersTroisProfils = array_slice($derniersProfils, -3, 3);
echo "<h3>Les derniers Contacts</h3>";
foreach ($derniersTroisProfils as $utilisateur) {
    echo "ID : " . $utilisateur->getID() . "<br>";
    echo "Nom : " . $utilisateur->getNom() . "<br>";
    echo "Prénom : " . $utilisateur->getPrenom() . "<br>";
    echo "Identifiant : " . $utilisateur->getIdentifiant() . "<br>";
    echo "Profil : " . $utilisateur->getProfil() . "<br>";
    echo "Droits : " . $utilisateur->getProfil() . "<br>";
    echo '<a href="?/viewUtilisateur.php?action=ficheProfil&id=' . $utilisateur->getID() . '"><button>Voir la fiche d\'utilisateur</button></a>';
    echo "<hr>";
}
?>