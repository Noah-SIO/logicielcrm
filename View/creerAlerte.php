<?php
require_once('../Class/rappelAlerte.php');
require_once('../Class/entreprise.php');
require_once('../Class/utilisateur.php');
$utilisateurManager = new ManagerUtilisateur();
$utilisateurs = $utilisateurManager -> returnAllUsers();
?>
<form action="traiterAlerte.php" method="POST">
    <label for="destinataire">Destinataire :</label></br>
    <select name="destinataire" id="destinataire">
        <?php foreach ($utilisateurs as $utilisateur) : ?>
            <option value="<?php echo $utilisateur->getNom(); ?>"><?php echo $utilisateur->getNom(); ?></option>
        <?php endforeach; ?>
    </select><br>
    </br>
    <label for="titre">Titre :</label></br>
    <input type="text" name="titre" id="titre"><br>
    <label for="contenu">Contenu :</label></br>
    <textarea name="contenu" id="contenu" rows="5" cols="30"></textarea><br>

    <input type="submit" value="Envoyer">
</form>
