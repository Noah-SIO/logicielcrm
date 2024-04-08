<link rel="stylesheet" href="style.css">

<?php
session_start();

require_once("Class/annuaire.php");
require_once("Class/assistance.php");
require_once("Class/entreprise.php");
require_once("Class/fichier.php");
require_once("Class/utilisateur.php");
require_once("Class/fichecontact.php");
require_once("Class/rappelAlerte.php");

$type = [2 => "Téléphone fixe", 1 => "Téléphone portable", 3 => "E-mail"];
$statut= [1 => "à faire", 2 => "en cours", 3 => "terminé"];
$poste = [1 => "Conseiller client", 2 => "Manager", 3 => "Commercial", 4 => "Comptable", 5 => "Responsable informatique", 6 => "Directeur général"];
$document = [1 => "Facture", 2 => "Avoir", 3 => "Contrat"];

if(isset($_GET['action'])){
    if ($_GET["action"] == "formulaireAssistance"){
        $title = "Formulaire d'assistance";
        require_once("View/header.php");
        require_once("View/formulaireAssistance.php");
    }
    if ($_GET["action"] == "formulaireAssistanceCo"){
        $title = "Formulaire d'assistance";
        require_once("View/headerNavigation.php");
        require_once("View/formulaireAssistanceCo.php");
    }
    if ($_GET["action"] == "tableauDeBord"){
        $title = "Tableau de bord";
        require_once("View/headerNavigation.php");
        require_once("View/tableauDeBord.php");
    }
    if ($_GET["action"] == "creerProfil"){
        $title = "Page de création de profil";
        require_once("View/headerNavigation.php");
        require('View/creerProfil.php');
    }
    if ($_GET["action"] == "creerAlerte"){
        $title = "Page de création d'alerte'";
        require_once("View/headerNavigation.php");
        require('View/creerAlerte.php');
    } 
    if ($_GET["action"] == "creerRappel"){
        $title = "Page de création de rappel";
        require_once("View/headerNavigation.php");
        require_once('View/creerRappel.php');
    } 
    if ($_GET["action"] == "creerFicheEntreprise"){
        $title = "Page de création de fiche entreprise";
        require_once("View/headerNavigation.php");
        require('View/creerFicheEntreprise.php');
    }
    if ($_GET["action"] == "creerFicheContact"){
        $title = "Page de création de fiche contact";
        require_once("View/headerNavigation.php");
        require('View/newFicheContact.php');
    }
    if ($_GET["action"] == "modifierAlerteRappel"){
        $title = "Page de modification d'alerte & rappel'";
        require_once("View/headerNavigation.php");
        require('View/modifAlerte.php');
    }
    if ($_GET["action"] == "modifFicheEntreprise"){
        $title = "Page de modification d'alerte & rappel'";
        require_once("View/headerNavigation.php");
        require('View/modifierEntreprise.php');
    } 
    if ($_GET["action"] == "modifFicheContact"){
        $title = "Page de modification de fiche contact'";
        require_once("View/headerNavigation.php");
        require('View/modifierFicheDeContact.php');
    }  
    if ($_GET["action"] == "modifProfil"){
        $title = "Page de modification de profil'";
        require_once("View/headerNavigation.php");
        require('View/modifProfil.php');
    }
    if ($_GET["action"] == "modifStatut"){
        $title = "Page de modification de statut de problème'";
        require_once("View/headerNavigation.php");
        require('View/modifStatut.php');
    }
    if ($_GET["action"] == "ficheEntreprise"){
        $title = "Page de fiche entreprise'";
        require_once("View/headerNavigation.php");
        require('View/infoEntreprise.php');
    }
    if ($_GET["action"] == "ficheProfil"){
        $title = "Page de fiche profil'";
        require_once("View/headerNavigation.php");
        require('View/ficheProfil.php');
    }
    if ($_GET["action"] == "ficheContact"){
        $title = "Page de fiche contact'";
        require_once("View/headerNavigation.php");
        require('View/FicheContacts.php');
    }
    if ($_GET["action"] == "download"){
        $title = "Page de fiche téléchargement'";
        require_once("View/headerNavigation.php");
        require('View/downloadFile.php');
    }
    if ($_GET["action"] == "resultatDeRecherche"){
        $title = "Résultat de recherche pour : " . $_SESSION["recherche"];
        require_once("View/headerNavigation.php");
        require_once("View/resultatDeRecherche.php");
    }
    if ($_GET["action"] == "attacheDocument"){
        $title = "Page pour joindre un document";
        require_once("View/headerNavigation.php");
        require_once("View/attacheDocument.php");
    }
}
else {
    $title = "Page de connexion";
    require_once("View/header.php");
    require_once("View/connexion.php");
    require_once("View/appelAdmin.php");   
}

?>