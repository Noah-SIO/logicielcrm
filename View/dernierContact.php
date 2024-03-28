<?php
$derniersProfils = $managerUtilisateur->returnAllUsers();
$derniersTroisProfils = array_slice($derniersProfils, -3, 3);
foreach ($derniersTroisProfils as $utilisateur) {
    echo "ID : " . $utilisateur->getID() . "<br>";
    echo "Nom : " . $utilisateur->getNom() . "<br>";
    echo "Prénom : " . $utilisateur->getPrenom() . "<br>";
    echo "Identifiant : " . $utilisateur->getIdentifiant() . "<br>";
    echo "Profil : " . $utilisateur->getProfil() . "<br>";
    echo "Droits : " . $utilisateur->getProfil() . "<br>";
    echo "<hr>";
}
?>
# EN COURS A MODIF (rapide)
