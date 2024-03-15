<?php 
require_once('fichier.php');
$bdsqll = new PDO("mysql:host=localhost;dbname=mediatheque", 'root', '');
$test = new ManagerMedias($bdsqll);
?>