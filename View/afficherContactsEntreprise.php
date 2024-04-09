<?php
$contactManager = new Contact();
$utilisateur = new ManagerUtilisateur();
$entreprisemanager = new ManagerEntreprise();
$entreprise = $entreprisemanager->getEntreprise($_GET['id']);
if ($_GET['action'] == 'afficherContactsEntreprise' && isset($_GET['id'])) {
    $idEntreprise = $_GET['id'];
    $contactsEntreprise = $contactManager->getContactByID($idEntreprise);

    if (!empty($contactsEntreprise)) {
        echo "<h2>Voici tout les contacts associés à cette entreprise : </h2>";
        echo "<ul>";
        foreach ($contactsEntreprise as $contact) {
            echo "<ul>";
            echo "<li><strong>Identifiant Entreprise :</strong> " . $entreprise['societe'] . "</li>";
            echo "<li><strong>Date :</strong> " . $contact->getDate() . "</li>";
            echo "<li><strong>Moyen de Contact :</strong> " . $type[$contact->getMoyenDeContact()] . "</li>";
            echo "<li><strong>Demande :</strong> " . $contact->getDemande() . "</li>";
            echo "<li><strong>Réponse :</strong> " . $contact->getReponse() . "</li>";
            echo "</ul>";
        }
        echo "</ul>";
    } else {
        echo "<p>Aucun contact pour cette entreprise.</p>";
    }
}
?>