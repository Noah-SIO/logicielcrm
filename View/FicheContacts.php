<?php
$idFicheContact = 5; // a modifier 
include '../Class/fichecontact.php';
$contactManager = new Contact();
$listeContacts = $contactManager->getContact($idFicheContact);
foreach ($listeContacts as $contact) {
    echo "<tr>";
    echo "<td>" . $contact->getId() . "</td>";
    echo "<td>" . $contact->getIdCompte() . "</td>";
    echo "<td>" . $contact->getIdEntreprise() . "</td>";
    echo "<td>" . $contact->getDate() . "</td>";
    echo "<td>" . $contact->getMoyenDeContact() . "</td>";
    echo "<td>" . $contact->getDemande() . "</td>";
    echo "<td>" . $contact->getReponse() . "</td>";
    echo "</tr>";
}
?>

# Modif a faire