<?php
if(isset($_GET['id'])) {
    $idFicheProfilAChercher = $_GET['id'];
    $managerUtilisateur = new ManagerUtilisateur();
    $utilisateur = $managerUtilisateur->GetUserById($idFicheProfilAChercher);
    if ($utilisateur != NULL) {
        echo"<h1>Fiche Profil</h1>";
        echo "<h3>Nom : </h3>" . $utilisateur[0]['nom'] . "<br>";
        echo "<h3>Prénom : </h3>" . $utilisateur[0]['prenom'] . "<br>";
        echo "<h3>Identifiant : </h3>" . $utilisateur[0]['identifiant'] . "<br>";
        echo "<h3>Droit : </h3>" . $poste[$utilisateur[0]['droit']] . "<br>";
    } else {
        echo "Cette id n'est assigné a aucune fiche.";
    }
} else {
    echo "Il faut spécifier un id de recherche dans l'url (pour lui afficher sa fiche).";
}
?>
