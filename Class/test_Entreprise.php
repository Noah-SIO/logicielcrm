<?php 
require_once('entreprise.php');
$bdsqll = new PDO("mysql:host=localhost;dbname=mediatheque", 'root', '');
$test = new ManagerMedias($bdsqll);
?>