<?php

$idFicheContact = (int)$_GET['id'];

// Get the contact details
$contactManager = new Contact();
$listeContacts = $contactManager->getContactByID($idFicheContact);
$contact = $listeContacts[0]; // Expecting only one result

// Get the users and companies
$utilisateurManager = new ManagerUtilisateur();
$commercial = $utilisateurManager->returnAllUsers();
$id_commercial = $contact->getIdCompte();

$entreprisemanager = new ManagerEntreprise();
$listeEntreprise = $entreprisemanager->getAllEntreprise();
$idEntreprise = $contact->getIdEntreprise();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_commercial = $_POST['commercial'];
    $idEntreprise = $_POST['idEntreprise'];
    $moyenDeContact = $_POST['moyenDeContact'];
    $demande = $_POST['demande'];
    $reponse = $_POST['reponse'];
    $date = $_POST['date'];
    $modifContact = new FicheContact($idFicheContact, $id_commercial, $idEntreprise, $date, $demande, $reponse, $moyenDeContact);
    $contactManager->modifContact($modifContact);
    header('Location: modifierFicheDeContact.php?id=' . $idFicheContact);
    exit;
}
?>
<form method="post" action="">
    <label for="commercial">Commercial :</label><br>
    <select name="commercial" id="commercial">
        <?php foreach ($commercial as $com) : ?>
            <option value="<?php echo $com->getId(); ?>" <?php if ($com->getId() == $id_commercial) echo 'selected'; ?>>
                <?php echo $com->getNom() . " " . $com->getPrenom(); ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>
    <label for="idEntreprise">ID entreprise:</label>
    <select name="idEntreprise" id="idEntreprise">
        <?php foreach ($listeEntreprise as $entreprise) : ?>
            <option value="<?php echo $entreprise->getId(); ?>" <?php if ($entreprise->getId() == $idEntreprise) echo 'selected'; ?>>
                <?php echo $entreprise->getSociete(); ?> (<?php echo $entreprise->getNom(); ?>)
            </option>
        <?php endforeach; ?>
    </select><br><br>
    <label for="moyenDeContact">Moyen de contact:</label>
    <label for="moyenDeContact">Moyen de contact:</label>
    <select name="moyenDeContact" id="moyenDeContact">
        <?php foreach ($type as $id => $libelle) : ?>
            <option value="<?php echo $id; ?>" <?php if ($id == $contact->getMoyenDeContact()) echo 'selected'; ?>>
                <?php echo $libelle; ?>
            </option>
        <?php endforeach; ?>
    </select><br>
    <label for="demande">Demande:</label>
    <input type="text" name="demande" value="<?php echo $contact->getDemande(); ?>"><br>
    <label for="reponse">Réponse:</label>
    <input type="text" name="reponse" value="<?php echo $contact->getReponse(); ?>"><br>
    <label for="date">Date:</label>
    <input type="date" name="date" value="<?php echo $contact->getDate(); ?>"><br>
    <input type="submit" name="modifier" value="Modifier" class="button">
</form>

