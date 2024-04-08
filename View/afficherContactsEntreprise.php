<?php
if ($_GET['action'] == 'afficherContactsEntreprise' && isset($_GET['id'])) {
    $idEntreprise = $_GET['id'];
    require_once '../Class/fichecontact.php';
    $contactManager = new Contact();
    $contactsEntreprise = $contactManager->getContactByIDEntreprise($idEntreprise);
    if (!empty($contactsEntreprise)) {
        echo "<h2>Contacts associés à cette entreprise</h2>";
        echo "<ul>";
        foreach ($contactsEntreprise as $contact) {
            echo "<li>Date: " . $contact->getDate() . " - Demande: " . $contact->getDemande() . " - Réponse: " . $contact->getReponse() . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Aucun contact pour cette entreprise.</p>";
    }
}
?>
