<?php
$idFicheContact = $_GET['id']; // a modifier 
include '../Class/fichecontact.php';
$contactManager = new Contact();
$listeContacts = $contactManager->getContactByID($idFicheContact);
foreach ($listeContacts as $contact) {
    echo "<ul>";
    echo "<li><strong>Identifiant Compte:</strong> " . $contact->getIdCompte() . "</li>";
    echo "<li><strong>Identifiant Entreprise:</strong> " . $contact->getIdEntreprise() . "</li>";
    echo "<li><strong>Date:</strong> " . $contact->getDate() . "</li>";
    echo "<li><strong>Moyen de Contact:</strong> " . $contact->getMoyenDeContact() . "</li>";
    echo "<li><strong>Demande:</strong> " . $contact->getDemande() . "</li>";
    echo "<li><strong>Réponse:</strong> " . $contact->getReponse() . "</li>";
    echo "</ul>";
}
?>
