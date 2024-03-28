<?php
if(isset($_GET['id'])) {
    $idFicheProfilAChercher = $_GET['id'];
    $managerUtilisateur = new ManagerUtilisateur();
    $utilisateur = $managerUtilisateur->GetUser($idFicheProfilAChercher);
    if ($utilisateur !== null) {
        echo "ID : " . $utilisateur['id'] . "<br>";
        echo "Nom : " . $utilisateur['nom'] . "<br>";
        echo "Prénom : " . $utilisateur['prenom'] . "<br>";
        echo "Identifiant : " . $utilisateur['identifiant'] . "<br>";
        echo "Droit : " . $utilisateur['droit'] . "<br>";
    } else {
        echo "Cette id n'est assigné a aucune fiche.";
    }
} else {
    echo "Il faut spécifier un id de recherche dans l'url (pour lui afficher sa fiche).";
}
?>
