<?php
include '../Class/utilisateur.php';
    $idFicheProfilAChercher = $_GET['id'];
    $managerUtilisateur = new ManagerUtilisateur();
    $utilisateur = $managerUtilisateur->GetUserById($idFicheProfilAChercher);
    if ($utilisateur !== null) {
        echo "ID : " . $utilisateur[0]['id'] . "<br>";
        echo "Nom : " . $utilisateur[0]['nom'] . "<br>";
        echo "Prénom : " . $utilisateur[0]['prenom'] . "<br>";
        echo "Identifiant : " . $utilisateur[0]['identifiant'] . "<br>";
        echo "Droits : " . $utilisateur[0]['droit'] . "<br>";
    } else {
        echo "Cette id n'est assigné a aucune fiche.";
    }
    echo "Il faut spécifier un id de recherche dans l'url (pour lui afficher sa fiche).";

?>
