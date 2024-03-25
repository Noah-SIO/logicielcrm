<?php
require_once('../Class/rappelAlerte.php');
require_once('../Class/entreprise.php');
require_once('../Class/utilisateur.php');
$utilisateurManager = new ManagerUtilisateur();
$commercial = $utilisateurManager->returnAllUsers();
?>
<form method="post" action="">
    <label for="nom">Nom:</label>
    <input type="text" name="nom" value=""><br>
    <label for="prenom">Prénom:</label>
    <input type="text" name="prenom" value=""><br>
    <label for="societe">Nom société:</label>
    <input type="text" name="societe" value=""><br>
    <label for="id_commercial">ID commercial:</label>
    <input type="text" name="id_commercial" value=""><br>
    <label for="commercial">Commercial :</label><br>
    <select name="commercial" id="commercial">
        <?php foreach ($commercial as $com) : ?>
            <option value="<?php echo $com->getId();?>">
                <?php echo $com->getNom() . " " . $com->getPrenom(); ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>
    <label for="date">Date:</label>
    <input type="date" name="date" value=""><br>
    <input type="submit" name="modifier" value="Modifier">
</form>
