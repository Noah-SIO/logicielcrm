<?php 
require_once('RappelAlerte.php');
$bdsqll = new PDO("mysql:host=localhost;dbname=mediatheque", 'root', '');
$test = new ManagerMedias($bdsqll);
?>