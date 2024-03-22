<?php
include '../Class/utilisateur.php';
$managerUtilisateur = new ManagerUtilisateur();
$utilisateur = null;
if (isset($_SESSION['login']) && isset($_SESSION['mdp'])) {
    $login = $_SESSION['login'];
    $mdp = $_SESSION['mdp'];
    if ($managerUtilisateur->checkLoginInfos($login, $mdp)) {
        $utilisateur = $managerUtilisateur->GetUser($login);
    }
}
?>
</head>
    <h1>Profil de <?= $utilisateur['prenom'] . ' ' . $utilisateur['nom']; ?></h1>
    <p><strong>Identifiant:</strong> <?= $utilisateur['identifiant']; ?></p>
    <p><strong>Profil:</strong> <?= $managerUtilisateur->getProfilById($utilisateur['profil']); ?></p>
    <p><strong>Email:</strong> <?= $utilisateur['email']; ?></p>
    <p><strong>Numéro de téléphone:</strong> <?= $utilisateur['numTel']; ?></p>
</html>



# A MODIFIER (EN COURS)