<?php
$idFicheContact = $_GET['id']; // a modifier 
$contactManager = new Contact();
$utilisateur = new ManagerUtilisateur();
$entreprisemanager = new ManagerEntreprise();
$entreprise = $entreprisemanager->getEntreprise($_GET['id']);
$listeContacts = $contactManager->getContactByID($idFicheContact);
foreach ($listeContacts as $contact) {
    echo "<ul>";
    echo "<li><strong>Identifiant Entreprise:</strong> " . $entreprise['societe'] . "</li>";
    echo "<li><strong>Date:</strong> " . $contact->getDate() . "</li>";
    echo "<li><strong>Moyen de Contact:</strong> " . $contact->getMoyenDeContact() . "</li>";
    echo "<li><strong>Demande:</strong> " . $contact->getDemande() . "</li>";
    echo "<li><strong>Réponse:</strong> " . $contact->getReponse() . "</li>";
    echo "</ul>";
    if ($_SESSION['droit'] == 2){
        echo "<a href='?action=modifFicheContact&id=".$idFicheContact."'><button>Modifier la fiche</button></a>";
    }
    
}
?>
