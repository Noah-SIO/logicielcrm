<?php
$id_entreprise=0;
require_once("../class/fichier.php");
$files = new ManagerFichier();
$result = $files->GetFichierByClient($id_entreprise);
$nbrAffichageProblème = 5;
var_dump($result);


?>