<?php
$bdsqll = new PDO("mysql:host=localhost;dbname=crm", 'root', '');//même chose
$rappel = new ManagerFichier($bdsqll);//même chose
$donneestableau = $rappel->GetFichierByClient($_GET['id']);//$_SESSION['id']);
    echo "<h2>Vos Fichier</h2></br>";
    if($donneestableau != NULL){
    for ($i = 0; $i < count($donneestableau); $i++) {
        echo"<ul>";
        echo"<li>Fichier : ".$donneestableau[$i]->getNom()."</li>";
        $file = $donneestableau[$i]->getLienDoc();//Nom du fichier
        echo "<a href='download.php?file=".$file."'>download</a>";
        echo"</ul></br>";
    }}
    echo"</ul>";
?>
