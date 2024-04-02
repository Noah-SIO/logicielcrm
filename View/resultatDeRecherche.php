<?php
$statutUtilisateur = $_SESSION['droit'];//a modifier
$recherche = $_SESSION['recherche'];// a modifier un poste

//entreprise
$managerEntreprise = new ManagerEntreprise();
$listeEntreprise = $managerEntreprise->SearchClientByName($recherche);


//utilisateur
$managerUtilisateur = new ManagerUtilisateur();
$listeUtilisateur = $managerUtilisateur->SearchUserByType($recherche,'ALL');


//fichiers
$managerFichier = new ManagerFichier();
$fichiers = $managerFichier->GetFichierByName($recherche);


//contacts 
$managerContact = new Contact();
$contact = $managerContact->getContactByID((int)$recherche);

// affichage des resultats de recherche

//recherche entreprise

if($statutUtilisateur == 4 or $statutUtilisateur == 5){
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
}


//recherche Utilisateur

if($statutUtilisateur == 1 or $statutUtilisateur == 5 or $statutUtilisateur == 6){
if(!empty($listeUtilisateur)){
    echo "<p>Resultat de recherche Utilisateur</p>";
    foreach($listeUtilisateur as $utilisateur){
        echo "<p>ID: ".$utilisateur->getId()." - Nom: ".$utilisateur->getNom()." - Prenom: ".$utilisateur->getPrenom()." - Identifiant: ".$utilisateur->getIdentifiant()." - Profil: ".$utilisateur->getProfil()."</p>";
        echo "<a href='index.php?action=ficheProfil&id=".$utilisateur->getId()."'><button>Voir fiche</button></a>";
    }
}
else{
    echo "<p>Aucun utilisateur trouve</p>";
}
}


//recherche de fichier
if($statutUtilisateur == 4 or $statutUtilisateur == 5 or $statutUtilisateur == 6){
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
}

//fiche de contact
if($statutUtilisateur == 2 or $statutUtilisateur == 3 or $statutUtilisateur == 5 or $statutUtilisateur == 6){
if(!empty($contact)){
    echo "<p>Resultat de recherche Contact</p>";
    foreach($contact as $contact){
        echo "Date: " . $contact->getDate() . " - Demande: " ,$contact->getDemande() . " - Reponse: " . htmlspecialchars($contact->getReponse(), ENT_QUOTES, 'UTF-8') . ".</p>";
        echo '<a href="FicheContact.php?id='.$contact->getId(). '"><button>Voir fiche</button></a>';
    }
}//$id,$idCompte, $idEntreprise, $date, $demande, $reponse, $moyenDeContact
else{
    echo "<p>Aucun contact trouve</p>";
}
}


?>