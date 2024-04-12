<?php
$idEntreprise = $_GET['id'];
$utilisateurManager = new ManagerUtilisateur();
$commercial = $utilisateurManager->returnAllUsers();
$entrepriseManager = new ManagerEntreprise();
$infosEntreprise = $entrepriseManager->returnClientById($idEntreprise);
$nom = $infosEntreprise->getNom();
$prenom = $infosEntreprise->getPrenom();
$societe = $infosEntreprise->getSociete();
$id_commercial = $infosEntreprise->getIdCommercial();
$date = $infosEntreprise->getDateCreationCompte();


if (isset($_POST['modifier'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $societe = $_POST['societe'];
    $poste = $_POST['poste'];
    
    $date = $_POST['date'];
    if ($_SESSION['droit'] == 3){
        $modifEntreprie = new Entreprise(NULL,$nom, $prenom, $societe,$poste, $_SESSION['id'], $date);
        $modifEntreprie->setId($idEntreprise);
        $entrepriseManager->ModifClient($modifEntreprie);
        echo"<h3>Entreprise Modifier avec Succès !!!</h3>";
        //echo "<script>setTimeout(function(){location.reload(); },3000);</script>";
    } else {
        $id_commercial = $_POST['commercial'];
        $modifEntreprie = new Entreprise(NULL,$nom, $prenom, $societe,$poste, $id_commercial, $date);
        $modifEntreprie->setId($idEntreprise);
        $entrepriseManager->ModifClient($modifEntreprie);
        echo"<h3>Entreprise Modifier avec Succès !!!</h3>";
        //echo "<script>setTimeout(function(){location.reload(); },3000);</script>";
    }
}




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
    
    <?php
    if ($_SESSION['droit'] == 1){
        echo '<label for="commercial">Commercial :</label><br>
            <select name="commercial" id="commercial">';
            foreach ($commercial as $com){
                if ($com ->getProfil() == 3){
                    echo '<option value="'.$com->getId().'">'.$com->getNom() . " " . $com->getPrenom().'</option>';
                }
            }
        echo '</select><br><br>';
    }  else if ($_SESSION['droit'] == 3){

    }
    ?>
    <label for="date">Date:</label>
    <input type="date" name="date" value="<?php echo $date; ?>"><br>
    <input type="submit" name="modifier" value="Modifier" class="button">
</form>
<?php