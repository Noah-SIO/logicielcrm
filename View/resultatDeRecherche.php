<?php
$statutUtilisateur = 2;//a modifier
$recherche = "i";// a modifier un poste

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



?>