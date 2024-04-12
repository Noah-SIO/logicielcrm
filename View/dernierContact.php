<?php
$managerContact = new Contact();
$managerUtilisateur = new ManagerUtilisateur();
$derniersContacts = $managerContact->getContact(3, 'date', 'DESC');
echo "<h2>Les derniers contacts</h2>";
echo "<hr>";
if ($derniersContacts) {
    foreach ($derniersContacts as $dernierContact) {
        $profil = $managerUtilisateur->GetUserById($dernierContact['id_utilisateur']);
        echo "Conseiller : " . $profil[0]['nom'] . "<br>";
        echo "ID Entreprise : " . $dernierContact->getIdEntreprise() . "<br>";
        echo "Date : " . $dernierContact->getDate() . "<br>";
        echo "Moyen de contact : " . $dernierContact->getMoyenDeContact() . "<br>";
        echo "Demande : " . $dernierContact->getDemande() . "<br>";
        echo "Réponse : " . $dernierContact->getReponse() . "<br>";
        echo "<hr>";
        //echo "<script>setTimeout(function(){location.reload(); },3000);</script>";
    }
    echo "</br></br>";
} else {
    echo "Aucun contact n'a été  .";
}
?>
