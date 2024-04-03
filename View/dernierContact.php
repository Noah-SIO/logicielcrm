<?php
$managerContact = new Contact();
$managerUtilisateur = new ManagerUtilisateur();
$derniersContacts = $managerContact->getContact(3, 'date', 'DESC');
echo "<h3>Les derniers contacts</h3>";
if ($derniersContacts) {
    foreach ($derniersContacts as $dernierContact) {
        $profil = $managerUtilisateur->GetUserById($dernierContact->getIdCompte());
        echo "Conseiller : " . $profil[0]['nom'] . "<br>";
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
