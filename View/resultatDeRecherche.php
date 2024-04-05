<?php
$statutUtilisateur = $_SESSION['droit'];//a modifier
$recherche = $_SESSION['recherche'];// a modifier un poste

//entreprise
$managerEntreprise = new ManagerEntreprise();
$listeEntreprise = $managerEntreprise->SearchClientByName($recherche);
$tmp = $managerEntreprise->SearchClientBySociete($recherche);



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

if($statutUtilisateur == 0 or $statutUtilisateur == 4 or $statutUtilisateur == 6 or $statutUtilisateur == 5){
if(empty($listeEntreprise)){
    echo "<strong><p>Resultat de recherche Entreprise</p></strong>";
    foreach($listeEntreprise as $entreprise){
        echo "Nom: ".$entreprise->getNom()." - Prenom: ".$entreprise->getPrenom()." - Societe: ".$entreprise->getSociete()." - Poste: ".$entreprise->getPoste()."</p>";
        echo "<a href='index.php?action=ficheEntreprise&id=".$entreprise->getId()."'><button>Voir fiche</button></a></br></br>";

    }
}

if(!empty($tmp)){
    foreach($tmp as $entreprise){
        echo "Nom: ".$entreprise->getNom()." - Prenom: ".$entreprise->getPrenom()." - Societe: ".$entreprise->getSociete()." - Poste: ".$entreprise->getPoste()."</p>";
        echo "<a href='index.php?action=ficheEntreprise&id=".$entreprise->getId()."'><button>Voir fiche</button></a></br></br>";

    }
}
}
else{
    echo "<strong><p>Aucun entreprise trouve</p></strong>";
}



//recherche Utilisateur

if($statutUtilisateur == 5 or $statutUtilisateur == 6 or $statutUtilisateur == 4 or $statutUtilisateur == 0 or $statutUtilisateur == 1){
if(!empty($listeUtilisateur)){
    echo "<strong><p>Resultat de recherche Utilisateur</p></strong>";
    foreach($listeUtilisateur as $utilisateur){
        echo "Nom: ".$utilisateur->getNom()." - Prenom: ".$utilisateur->getPrenom()." - Identifiant: ".$utilisateur->getIdentifiant()." - Profil: ".$poste[$utilisateur->getProfil()]."</p>";
        echo "<a href='index.php?action=ficheProfil&id=".$utilisateur->getId()."'><button>Voir fiche</button></a></br></br>";
    }
}
else{
    echo "<strong><p>Aucun utilisateur trouve</p></strong>";
}
}


//recherche de fichier
if($statutUtilisateur == 3 or $statutUtilisateur == 6 or $statutUtilisateur == 4 or $statutUtilisateur == 0 or $statutUtilisateur == 5){
if(!empty($fichiers)){
    echo "<strong><p>Resultat de recherche Fichier</p></strong>";
    foreach($fichiers as $fichier){
        echo "Nom: ".$fichier->getNom()." - Type: ".$fichier->getType()." - Date: ".$fichier->getDate()."<br>";
        echo "<a href='view/download.php?file=../".$fichier->getLienDoc()."'><button>télécharger ". $fichier->getNom()." </button></a>"."<br><br>";
    }
}
else{
    echo "<strong><p>Aucun fichier trouve</p></strong>";
}
}

//fiche de contact
if($statutUtilisateur == 0 or $statutUtilisateur == 6 or $statutUtilisateur == 2 or $statutUtilisateur == 1 or $statutUtilisateur == 5){
if(!empty($contact)){
    echo "<strong><p>Resultat de recherche Contact</p></strong>";
    foreach($contact as $contact){
        echo "Date: " . $contact->getDate() . " - Demande: " ,$contact->getDemande() . " - Reponse: " .$contact->getReponse(). ".</p>";
        echo '<a href="index.php?action=ficheContact&id='.$contact->getId(). '"><button>Voir fiche</button></a>';
        }
}//$id,$idCompte, $idEntreprise, $date, $demande, $reponse, $moyenDeContact
else{
    echo "<strong><p>Aucun contact trouve</p></strong>";
}
}


?>