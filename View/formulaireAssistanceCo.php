<?php
$assistance = new ManagerAssistance();
echo"<h1>Formulaire De Contact Services Informatique</h1></br>";
if(isset($_POST['idrespinfo'])){
    $assistance->registerIssue($_POST['idrespinfo'], $_SESSION['id'], $_POST['suj'], $_POST['mess']);
    echo"<strong><p>----------------Votre problème à bien été transmis à nos Administrateur---------------</p></strong></br></br>";

}
echo"<form method='post'>";
echo"<label for='idrespinfo'>Entrer un Responsable Informatique :</label></br></br>";
    $bd = new PDO("mysql:host=localhost;dbname=crm", 'root', '');
    $s = 'SELECT id, nom, prenom, droit FROM utilisateur WHERE droit = 5';
    $r = $bd -> query($s);
    $donnees = $r -> fetchAll(PDO::FETCH_ASSOC);
    for ($i = 0; $i < count($donnees); $i++) {
        echo "<div><input type='radio' id='".$donnees[$i]['prenom']."' name='idrespinfo' value=".$donnees[$i]['id']." />
            <label for='".$donnees[$i]['prenom']."'>".$donnees[$i]['nom']." ".$donnees[$i]['prenom']."</label>
            </div></br>";
    }
    echo"<label for='suj'>Entrer Le sujet de votre Problème :</label></br></br>";
    echo"<input type='text' name='suj' placeholder='Un problème de MDP' required></br></br>";
    echo"<label for='mess'>Et votre Message :</label></br></br>";
    echo"<textarea id='mess' name='mess' rows='7' cols='50' placeholder='salut c est jêrome du service comptable j ai un problème de mot de passe...' required></textarea></br></br>";
    echo"<input type='submit' class='button' name='valider'class='button' value='Envoyer au Service Informatique'/></br>";
    echo"</form>";
?>