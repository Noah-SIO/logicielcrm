<?php
$rappel = new ManagerRappelAlerte();//même chose
$user = new ManagerUtilisateur();//même chose
$donneestableau = $user->SearchUserByType('%','ALL');
echo"<h1>Formulaire Création de Rappel</h1>";
echo "<p>Ce service permet aux employés de l'entreprise de ne pas oublier les tâches qu'ils auront à effectuer en créant un rappel qu'ils recevront d'ici quelques jours.</p></br>";
echo "<form method='post'>";
echo "<label for=''>Choix destinataire :</label><br/><br/>";
echo "<input type='checkbox' id='sois' name='destinataire' value='" . $_SESSION['id'] . "'/>";
echo "<label for='sois'>Sois-même</label><br/>";
echo "<div><select name='commercial' id='commercial-select'>";
echo "<option value=''>--Choisissez un destinataire--</option>";
if ($donneestableau != null) {
    foreach ($donneestableau as $utilisateur) {
        echo "<option value='" . $utilisateur->getNom() . "'>" . $utilisateur->getNom() . "</option>";
    }
}
echo "</select></div><br/>";
echo "<label for='nom'>Le sujet :</label><br/><br/>";
echo "<input type='text' name='suj' placeholder='ex : Rappeler M. Latour' required><br/><br/>";
echo "<label for='nom'>La date de fin de rappel :</label><br/><br/>";
echo "<input type='date' id='date' name='date' required><br/><br/>";
echo "<label for='mess'>Et votre message :</label><br/><br/>";
echo "<textarea id='mess' name='mess' rows='7' cols='50' placeholder='Rappeler M. Latour le 28/03/2024 à 9h pour son problème de MDP' required></textarea><br/><br/>";
echo "<input type='submit' name='valider' class='button' value='Créer'/>";
echo "</form>";

if (isset($_POST['valider'])) {
    //$tableaudonnees = $user->GetUser($_POST['identif']);
    //$iduser = $tableaudonnees[0]['id'];
    //echo $iduser."test";
    if(isset($_POST['destinataire'])){
    $rappelAlerte = new RappelAlerte( NULL,date("Y-m-d"),$_POST['date'],1,$_SESSION['id'],$_SESSION['id'],$_POST['suj'],$_POST['mess'],1);
    }
    if(isset($_POST['commercial']) && !isset($_POST['destinataire'])){
        $donneestableau2 = $user->SearchUserByType($_POST['commercial'],'NOMTEST');
        $idexpediteur=$donneestableau2[0]->getId();
        $rappelAlerte = new RappelAlerte( NULL,date("Y-m-d"),$_POST['date'],1,$_SESSION['id'],$idexpediteur,$_POST['suj'],$_POST['mess'],1);
        }
    $rappel->sendAlerteRappel($rappelAlerte);
    echo"<strong><p>----------------Rappel créé avec Succès !!!---------------</p></strong><br/><br>/";
}
?>