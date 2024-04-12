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
        echo "ID Entreprise : " . $dernierContact['id_entreprise'] . "<br>";
        echo "Date : " . $dernierContact['date' ] . "<br>";
        echo "Moyen de contact : " . $type[$dernierContact['moyen_contact']] . "<br>";
        echo "Demande : " . $dernierContact['demande'] . "<br>";
        echo "Réponse : " . $dernierContact['reponse'] . "<br>";
        echo "<hr>";
        //echo "<script>setTimeout(function(){location.reload(); },3000);</script>";
    }
    echo "</br></br>";
} else {
    echo "Aucun contact n'a été  .";
}
?>
