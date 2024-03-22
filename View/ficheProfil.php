<?php
include 'Class/utilisateur.php';
$managerUtilisateur = new ManagerUtilisateur();
if (isset($_SESSION['login']) && isset($_SESSION['mdp'])) {
    $login = $_SESSION['login'];
    $mdp = $_SESSION['mdp'];

