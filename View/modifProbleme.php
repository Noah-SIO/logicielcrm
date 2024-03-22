<?php
require_once("../Class/assistance.php");///////A supprimer quand constructeur en place 
$bdsqll = new PDO("mysql:host=localhost;dbname=crm", 'root', '');//même chose
$assistance = new ManagerAssistance($bdsqll);//même chose

?>