<?php
// require_once("../Class/utilisateur.php");///////A supprimer quand constructeur en place
// require_once("../Class/rappelAlerte.php");///////A supprimer quand constructeur en place 
// $bdsqll = new PDO("mysql:host=localhost;dbname=crm", 'root', '');//même chose
$rappel = new ManagerRappelAlerte();//même chose
$user = new ManagerUtilisateur();//même chose
$idCommercial = $_GET["iddest"];
echo"<h1>Formulaire Création de Rappel</h1>";
echo"<p>Ce service sert aux employés de l'entreprise à ne pas oublié les taches qu'il auront à effectuer en créant un rappel qu'il recevront d'ici quelques jour.</p></br>";
echo"<form method='post'>";
    echo"<label for=''>Choix desinataire :</label></br></br>
        <input type='radio' id='sois' name='destinataire' value=".$_SESSION['id']."/>
        <label for='sois'>Sois-même</label>
        </div>
        <div>
        <input type='radio' id='commercial' name='destinataire' value=".$idCommercial."/>
        <label for='commercial'>Commercial responsable du dossier</label>
        </div> </br>";
    echo"<label for='nom'>Le sujet:</label></br></br>";
    echo"<input type='text' name='suj' placeholder='ex : Rappeler Mr Latour' required></br></br>";
    echo"<label for='nom'>La Date de Fin de Rappel :</label></br></br>";
    echo "<input type='date' id='date' name='date' required/></br></br>";
    echo"<label for='mess'>Et votre Message :</label></br></br>";
    echo"<textarea id='mess' name='mess' rows='7' cols='50' placeholder='Rappeler Mr Latour le 28/03/2024 a 9h pour son probleme de MDP' required></textarea></br></br>";
    echo"<input type='submit' name='valider'class='button' value='Créer'/>";
echo"</form>";

if (isset($_POST['valider'])) {
    $tableaudonnees = $user->GetUser($_POST['identif']);
    $iduser = $tableaudonnees[0]['id'];
    //echo $iduser."test";
    $rappelAlerte = new RappelAlerte( NULL,date("Y-m-d"),$_POST['date'],1,$_SESSION['id'],$iduser,$_POST['suj'],$_POST['mess'],1);
    $rappel->sendAlerteRappel($rappelAlerte);
    echo"<p>Rappel créé avec Succès !!!</p>";
}
?>