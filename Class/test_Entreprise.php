<?php 
require_once('Entreprise.php');
$bdsqll = new PDO("mysql:host=localhost;dbname=mediatheque", 'root', '');
$test = new ManagerMedias($bdsqll);
?>