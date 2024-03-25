<?php
require_once("../Class/utilisateur.php");///////A supprimer quand constructeur en place
require_once("../Class/rappelAlerte.php");///////A supprimer quand constructeur en place 
$bdsqll = new PDO("mysql:host=localhost;dbname=crm", 'root', '');//même chose
$rappel = new ManagerRappelAlerte($bdsqll);//même chose
$user = new ManagerUtilisateur($bdsqll);//même chose
echo"<h1>Formulaire Création de Rappel</h1>";
echo"<p>Ce service sert aux employés de l'entreprise à ne pas oublié les taches qu'il auront à effectuer en créer un rappel qu'il recevront d'ici quelques jour.</p></br>";
echo"<form method='post'>";
    echo"<label for='nom'>Entrer votre Identifiant :</label></br></br>";
    echo"<input type='text' name='identif' placeholder='ex : Latour.jerome' required></br></br>";
    echo"<label for='nom'>Le sujet:</label></br></br>";
    echo"<input type='text' name='suj' placeholder='ex : Rappeler Mr Latour' required></br></br>";
    echo"<label for='nom'>La Date de Fin de Rappel :</label></br></br>";
    echo "<input type='date' id='date' name='date' required/></br></br>";
    echo"<label for='mess'>Et votre Message :</label></br></br>";
    echo"<textarea id='mess' name='mess' rows='7' cols='50' placeholder='Rappeler Mr Latour le 28/03/2024 a 9h pour son probleme de MDP' required></textarea></br></br>";
    echo"<input type='submit' name='valider'class='button' value='Creer le Rappel'/>";
echo"</form>";

if (isset($_POST['valider'])) {
    $tableaudonnees = $user->GetUser($_POST['identif']);
    $iduser = $tableaudonnees[0]['id'];
    //echo $iduser."test";
    $rappelAlerte = new RappelAlerte( NULL,NULL,$_POST['date'],1,$iduser,$iduser,$_POST['suj'],$_POST['mess'],1);
    $rappel->sendAlerteRappel($rappelAlerte);
    echo"<p>Rappel Creer avec Succès !!!</p>";
}
?>