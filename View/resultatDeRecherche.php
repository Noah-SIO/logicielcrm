<?php
$statutUtilisateur = 2;//a modifier
$recherche = "1";// a modifier un poste

//entreprise
require_once("../class/entreprise.php");
$managerEntreprise = new ManagerEntreprise();
$listeEntreprise = $managerEntreprise->SearchClientByName($recherche);


//utilisateur
require_once("../class/utilisateur.php");
$managerUtilisateur = new ManagerUtilisateur();
$listeUtilisateur = $managerUtilisateur->SearchUserByType($recherche,'ALL');


//fichiers
//require_once("../class/fichiers.php");
require_once("../class/fichier.php");
$managerFichier = new ManagerFichier();
$fichiers = $managerFichier->GetFichierByName($recherche);


//contacts 
require_once("../class/fichecontact.php");
$managerContact = new Contact();
$contact = $managerContact->getContactByID((int)$recherche);

// affichage des resultats de recherche

if(!empty($listeEntreprise)){
    echo "<p>Resultat de recherche Entreprise</p>";
    foreach($listeEntreprise as $entreprise){
        echo "Nom: ".$entreprise->getNom()." - Prenom: ".$entreprise->getPrenom()." - Societe: ".$entreprise->getSociete()." - Poste: ".$entreprise->getPoste()."</p>";
        echo "<a href='infoEntreprise.php?id=".$entreprise->getId()."'><button>Voir fiche</button></a>";

    }
}
else{
    echo "<p>Aucun entreprise trouve</p>";
}
if(!empty($listeUtilisateur)){
    echo "<p>Resultat de recherche Utilisateur</p>";
    foreach($listeUtilisateur as $utilisateur){
        echo "<p>ID: ".$utilisateur->getId()." - Nom: ".$utilisateur->getNom()." - Prenom: ".$utilisateur->getPrenom()." - Identifiant: ".$utilisateur->getIdentifiant()." - Profil: ".$utilisateur->getProfil()."</p>";
        echo "<a href='ficheProfil.php?id=".$utilisateur->getId()."'><button>Voir fiche</button></a>";
    }
}
else{
    echo "<p>Aucun utilisateur trouve</p>";
}
if(!empty($fichiers)){
    echo "<p>Resultat de recherche Fichier</p>";
    foreach($fichiers as $fichier){
        echo"Nom: ".$fichier->getNom()." - Type: ".$fichier->getType()." - Date: ".$fichier->getDate()."</p>";
        echo "<a href='download.php?file=".$fichier->getLienDoc()."'><button>télécharger le fichier</button></a>";
    }
}
else{
    echo "<p>Aucun fichier trouve</p>";
}

//fiche de contact

if(!empty($contact)){
    echo "<p>Resultat de recherche Contact</p>";
    foreach($contact as $contact){
        echo "Date: " . htmlspecialchars($contact->getDate(), ENT_QUOTES, 'UTF-8') . " - Demande: " . htmlspecialchars($contact->getDemande(), ENT_QUOTES, 'UTF-8') . " - Reponse: " . htmlspecialchars($contact->getReponse(), ENT_QUOTES, 'UTF-8') . ".</p>";
        echo '<a href="FicheContact.php?id=' . htmlspecialchars($contact->getId(), ENT_QUOTES, 'UTF-8') . '"><button>Voir fiche</button></a>';
    }
}//$id,$idCompte, $idEntreprise, $date, $demande, $reponse, $moyenDeContact
else{
    echo "<p>Aucun contact trouve</p>";
}



?>