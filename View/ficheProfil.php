<?php
include 'Class/utilisateur.php';
$managerUtilisateur = new ManagerUtilisateur();
if (isset($_SESSION['login']) && isset($_SESSION['mdp'])) {
    $login = $_SESSION['login'];
    $mdp = $_SESSION['mdp'];

    if ($managerUtilisateur->checkLoginInfos($login, $mdp)) {
        $utilisateur = $managerUtilisateur->GetUser($login);

        if ($utilisateur) {
            echo "<h1>Profil de {$utilisateur['prenom']} {$utilisateur['nom']}</h1>";
            echo "<p><strong>Identifiant:</strong> {$utilisateur['identifiant']}</p>";
            echo "<p><strong>Profil:</strong> {$managerUtilisateur->getProfilById($utilisateur['profil'])}</p>";
            echo "<p><strong>Email:</strong> {$utilisateur['email']}</p>";
            echo "<p><strong>Numéro de téléphone:</strong> {$utilisateur['numTel']}</p>";
        } else {
            echo "<p>Impossible de récupérer les informations du profil.</p>";
        }
    } else {
        echo "<p>Identifiant ou mot de passe incorrect.</p>";
    }
} else {
    echo "<p>Vous n'êtes pas connecté.</p>";
}
?>
