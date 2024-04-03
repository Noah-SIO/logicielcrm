<?php
require_once '../Class/fichecontact.php';
$managerContact = new Contact();
$derniersContacts = $managerContact->getContact(3, 'date', 'DESC');
if ($derniersContacts) {
    foreach ($derniersContacts as $dernierContact) {
        echo "ID : " . $dernierContact->getId() . "<br>";
        echo "ID Compte : " . $dernierContact->getIdCompte() . "<br>";
        echo "ID Entreprise : " . $dernierContact->getIdEntreprise() . "<br>";
        echo "Date : " . $dernierContact->getDate() . "<br>";
        echo "Moyen de contact : " . $dernierContact->getMoyenDeContact() . "<br>";
        echo "Demande : " . $dernierContact->getDemande() . "<br>";
        echo "Réponse : " . $dernierContact->getReponse() . "<br>";
        echo "<hr>";
    }
} else {
    echo "Aucun contact n'a été  .";
}
?>
