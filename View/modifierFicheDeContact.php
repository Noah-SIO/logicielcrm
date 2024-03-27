<?php
// contact
$idFicheContact= 8 ;// a modifier 
require_once('../class/fichecontact.php');
$contactManager = new Contact();
$listeContacts = $contactManager->getContactByID($idFicheContact);
foreach ($listeContacts as $contact) {
$idEntreprise= $contact->getIdEntreprise();
$date =  $contact->getDate() ;
$moyenDeContact = $contact->getMoyenDeContact();
$demande = $contact->getDemande();
$reponse =$contact->getReponse();

// utilisateur
require_once('../class/utilisateur.php');
$utilisateurManager = new ManagerUtilisateur();
$commercial = $utilisateurManager->returnAllUsers();
$id_commercial = $contact->getIdCompte();

//entreprise 
require_once('../class/entreprise.php');
$entreprisemanager = new ManagerEntreprise();
$listeEntreprise = $entreprisemanager->getAllEntreprise();
}
?>
<form method="post" action="">
<label for="commercial">Commercial :</label><br>
    <select name="commercial" id="commercial">
        <?php foreach ($commercial as $com) : ?>
            <option value="<?php echo $com->getId();?>" <?php if ($com->getId() == $id_commercial) echo 'selected'; ?>>
                <?php echo $com->getNom() . " " . $com->getPrenom(); ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>
    <label for="idEntreprise">Entreprise:</label>
    <select name="idEntreprise" id="idEntreprise">
        <?php foreach ($listeEntreprise as $entreprise) : ?>
            <option value="<?php echo $entreprise->getId();?>" <?php if ($entreprise->getId() == $idEntreprise) echo 'selected'; ?>>
                <?php echo $entreprise->getSociete(); ?> (<?php echo $entreprise->getNom(); ?>)
            </option>
        <?php endforeach; ?>
    </select><br><br>
    <label for="moyenDeContact">Moyen de contact:</label>
    <input type="text" name="moyenDeContact" value="<?php echo $moyenDeContact; ?>"><br>
    <label for="demande">Demande:</label>
    <input type="text" name="demande" value="<?php echo $demande; ?>"><br>
    <label for="reponse">Réponse:</label>
    <input type="text" name="reponse" value="<?php echo $reponse; ?>"><br>
    <label for="date">Date(<?php echo $date; ?>):</label>
    <input type="date" name="date" value="<?php echo $date ? $date : date('Y-m-d'); ?>"><br>
    <input type="submit" name="modifier" value="Modifier">
</form>
<?php
if (isset($_POST['modifier'])) {
    $id_commercial = $_POST['commercial'];
    $idEntreprise = $_POST['idEntreprise'];
    $moyenDeContact = $_POST['moyenDeContact'];
    $demande = $_POST['demande'];
    $reponse = $_POST['reponse'];
    $date = $_POST['date'];
    $modifContact = new FicheContact($idFicheContact,$id_commercial, $idEntreprise, $date, $demande, $reponse, $moyenDeContact);
    $contactManager->modifContact($modifContact);
    header('Location: modifierFicheDeContact.php');
    
}