<?php 
require_once('utilisateur.php');
$bdsqll = new PDO("mysql:host=localhost;dbname=mediatheque", 'root', '');
$test = new ManagerUtilisateur($bdsqll);
$test->SearchUserByType("nonoa");
?>