<?php
require_once('../Class/rappelAlerte.php');
require_once('../Class/entreprise.php');
require_once('../Class/utilisateur.php');
$idEntreprise = $_GET['id_entreprise'];
$utilisateurManager = new ManagerUtilisateur();
$commercial = $utilisateurManager->returnAllUsers();
$entrepriseManager = new ManagerEntreprise();
$infosEntreprise = $entrepriseManager->returnClientById($idEntreprise);
$nom = $infosEntreprise->getNom();
$prenom = $infosEntreprise->getPrenom();
$societe = $infosEntreprise->getSociete();
$id_commercial = $infosEntreprise->getIdCommercial();
$date = $infosEntreprise->getDateCreationCompte();




?>
<form method="post" action="">
    <label for="nom">Nom:</label>
    <input type="text" name="nom" value='<?php echo $nom; ?>'><br>
    <label for="prenom">Prénom:</label>
    <input type="text" name="prenom" value="<?php echo $prenom; ?>"><br>
    <label for="societe">Nom société:</label>
    <input type="text" name="societe" value="<?php echo $societe; ?>"><br>
    <label for="poste">Poste:</label>
    <input type="text" name="poste" value="<?php echo $infosEntreprise->getPoste(); ?>"><br>
    <label for="id_commercial">ID commercial:</label>
    <input type="text" name="id_commercial" value="<?php echo $id_commercial; ?>"><br>
    <label for="commercial">Commercial :</label><br>
    <select name="commercial" id="commercial">
        <?php foreach ($commercial as $com) : ?>
            <option value="<?php echo $com->getId();?>">
                <?php echo $com->getNom() . " " . $com->getPrenom(); ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>
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