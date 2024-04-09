<?php
$rappel = new ManagerRappelAlerte();//même chose
$user = new ManagerUtilisateur();//même chose
$donneestableau = $user->SearchUserByType('%','ALL');
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
    echo"<strong><p>----------------Rappel créé avec Succès !!!---------------</p></strong></br></br>";
}
echo"<h1>Formulaire Création de Rappel</h1>";
echo"<p>Ce service sert aux employés de l'entreprise à ne pas oublié les taches qu'il auront à effectuer en créant un rappel qu'il recevront d'ici quelques jour.</p></br>";
echo"<form method='post'>";
    echo"<label for=''>Choix destinataire :</label></br></br>";
    echo "<input type='radio' id='sois' name='destinataire' value='".$_SESSION['id']."'/>
        <label for='".$_SESSION['id']."'>Sois-même</label> <br/>";
    echo "<input type='radio' id='dest' name='destinataire' value='".$_GET['iddest']."'/>
        <label for='".$_GET['iddest']."'>Commercial</label> <br/>";
    // echo"<input type='checkbox' id='sois' name='destinataire' value=".$_SESSION['id']."/>";
    // echo"<label for='sois'>Sois-même</label>";
    // echo"</div><div>";
    // echo"</br><select name='commercial' id='commercial-select'>";
    //     echo"<option value=''>--Choisissez un Destinataire--</option>";
    //     if($donneestableau != NULL){
    //         for ($i = 0; $i < count($donneestableau); $i++) {
    //             echo"<option value='".$donneestableau[$i]->getNom()."'>".$donneestableau[$i]->getNom()."</option>";
    //             }
    //         }
    echo"</select>";
    echo"</div> </br>";
    echo"<label for='nom'>Le sujet:</label></br></br>";
    echo"<input type='text' name='suj' placeholder='ex : Rappeler Mr Latour' required></br></br>";
    echo"<label for='nom'>La Date de Fin de Rappel :</label></br></br>";
    echo "<input type='date' id='date' name='date' required/></br></br>";
    echo"<label for='mess'>Et votre Message :</label></br></br>";
    echo"<textarea id='mess' name='mess' rows='7' cols='50' placeholder='Rappeler Mr Latour le 28/03/2024 a 9h pour son probleme de MDP' required></textarea></br></br>";
    echo"<input type='submit' name='valider' class='button' value='Créer'/>";
echo"</form>";
?>