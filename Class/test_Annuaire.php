<?php 
require_once('Annuaire.php');
$bdsqll = new PDO("mysql:host=localhost;dbname=crm", 'root', '');
$test = new ManagerAnnuaire($bdsqll);
?>