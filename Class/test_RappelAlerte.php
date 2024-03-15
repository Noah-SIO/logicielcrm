<?php 
require_once('rappelAlerte.php');
$bdsqll = new PDO("mysql:host=localhost;dbname=crm", 'root', '');
$test = new ManagerRappelAlerte($bdsqll);
?>