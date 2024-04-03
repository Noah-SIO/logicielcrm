<?php
if(isset($_GET['id'])) {
    $idFicheProfilAChercher = $_GET['id'];
    $managerUtilisateur = new ManagerUtilisateur();
    $utilisateur = $managerUtilisateur->GetUserById($idFicheProfilAChercher);
    if ($utilisateur != NULL) {
        echo"<fieldset><h1>Fiche Profil</h1>";
        echo "<b>Nom : </b>" . $utilisateur[0]['nom'] . "<br>";
        echo "<b>Prénom : </b>" . $utilisateur[0]['prenom'] . "<br>";
        echo "<b>Identifiant : </b>" . $utilisateur[0]['identifiant'] . "<br>";
        echo "<b>Droit : </b>" . $poste[$utilisateur[0]['droit']] . "<br></fieldset>";
        echo "<a href='?action=modifProfil&id=".$idFicheProfilAChercher."'><button>Modifier la fiche</button></a>";
    } else {
        echo "Cette id n'est assigné a aucune fiche.";
    }
} else {
    echo "Il faut spécifier un id de recherche dans l'url (pour lui afficher sa fiche).";
}
?>

