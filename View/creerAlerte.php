<?php
$utilisateurManager = new ManagerUtilisateur();
$utilisateurs = $utilisateurManager->returnAllUsers();
$rappeleAlerteManager = new ManagerRappelAlerte();
if (isset($_POST['submit'])) {
    $rappelAlerte = new RappelAlerte(null,null,$_POST['date'],1,$_GET['id'],$_POST['destinataire'],$_POST['titre'],$_POST['contenu'],1);
    $rappeleAlerteManager->sendAlerteRappel($rappelAlerte);
    echo"<h3>Alerte ajouté</h3>";
    //echo "<script>setTimeout(function(){location.reload(); },3000);</script>";
}
?>

<form method="POST">
    <label for="destinataire">Destinataire :</label><br>
    <select name="destinataire" id="destinataire">
        <?php  ?>
            <?php foreach ($utilisateurs as $utilisateur) : ?>
                <option value="<?php echo $utilisateur->getId();?>">
                    <?php echo $utilisateur->getNom() . " " . $utilisateur->getPrenom(); ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>

    <label for="titre">Titre :</label><br>
    <input type="text" name="titre" id="titre"><br>
    <label for="date">Date :</label><br>
    <input type="date" name="date" id="date"><br>
    <label for="contenu">Contenu :</label><br>
    <textarea name="contenu" id="contenu" rows="5" cols="30"></textarea><br>

    <input type="submit" name="submit" value="Envoyer" class='button'>
</form>


