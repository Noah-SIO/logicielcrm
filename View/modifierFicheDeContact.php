<?php

?>
<form method="post" action="">
<label for="commercial">Commercial :</label><br>
    <select name="commercial" id="commercial">
        <?php foreach ($commercial as $com) : ?>
            <option value="<?php echo $com->getId();?>">
                <?php echo $com->getNom() . " " . $com->getPrenom(); ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>
    <label for="idEntreprise">ID entreprise:</label>
    <input type="text" name="idEntreprise" value="<?php echo $idEntreprise; ?>"><br>
    <label for="moyenDeContact">Moyen de contact:</label>
    <input type="text" name="moyenDeContact" value="<?php echo $moyenDeContact; ?>"><br>
    <label for="demande">Demande:</label>
    <input type="text" name="demande" value="<?php echo $demande; ?>"><br>
    <label for="reponse">Réponse:</label>
    <input type="text" name="reponse" value="<?php echo $reponse; ?>"><br>
    <label for="date">Date:</label>
    <input type="date" name="date" value="<?php echo $date; ?>"><br>
    <label for="date">Date:</label>
    <input type="date" name="date" value="<?php echo $date; ?>"><br>
    <input type="submit" name="modifier" value="Modifier">
</form>
<?php
if (isset($_POST['modifier'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $societe = $_POST['societe'];
    $poste = $_POST['poste'];
    $id_commercial = $_POST['id_commercial'];
    $commercial = $_POST['commercial'];
    $date = $_POST['date'];
    $modifEntreprie = new Entreprise($nom, $prenom, $societe,$poste, $id_commercial, $date);
    $modifEntreprie->setId($idEntreprise);
    $entrepriseManager->ModifClient($modifEntreprie);
}