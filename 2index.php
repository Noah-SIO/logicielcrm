<?php
session_start();

require_once("Class/annuaire.php");
require_once("Class/assistance.php");
require_once("Class/entreprise.php");
require_once("Class/fichier.php");
require_once("Class/utilisateur.php");
require_once("Class/fichecontact.php");
require_once("Class/rappelAlerte.php");

$type = [1 => "téléphone fixe", 2 => "téléphone portable", 3 => "e-mail"];
$statut= [1 => "à faire", 2 => "en cours", 3 => "terminé"];
$poste = [1 => "conseiller client", 2 => "manager", 3 => "commercial", 4 => "comptable", 5 => "responsable informatique", 6 => "directeur général"];


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
        require('View/creerRappel.php');
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
}
else {
    $title = "Page de connexion";
    require_once("View/header.php");
    require_once("View/connexion.php");
    require_once("View/appelAdmin.php");   
}

?>