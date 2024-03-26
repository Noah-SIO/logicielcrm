<?php
$assistance = new ManagerAssistance();
echo"<h1>Formulaire De Contact Services Informatique</h1>";
echo"<p>Pour les problème de mot de passe tapper 1, pour la création de compte tapper 2.</p></br></br></br>";
echo"<form method='post'>";
    echo"<label for='idrespinfo'>Entrer un Responsable Informatique :</label></br></br>";
    echo"<input type='text' name='idrespinfo' placeholder='1 ou 2...' required></br></br>";
    echo"<label for='nom'>Entrer votre Nom :</label></br></br>";
    echo"<input type='text' name='nom' placeholder='ex : Latour' required></br></br>";
    echo"<label for='suj'>Entrer Le sujet de votre Problème :</label></br></br>";
    echo"<input type='text' name='suj' placeholder='Un problème de MDP' required></br></br>";
    echo"<label for='mess'>Et votre Message :</label></br></br>";
    echo"<textarea id='mess' name='mess' rows='7' cols='50' placeholder='salut c est jêrome du service comptable j ai un problème de mot de passe...' required></textarea></br></br>";
    echo"<input type='submit' name='valider'class='button' value='Envoyer au Service Informatique'/>";
echo"</form>";    
if(isset($_POST['idrespinfo'])){
$assistance->registerIssueNoConnect($_POST['idrespinfo'],$_POST['suj'],$_POST['suj'],$_POST['mess']);
echo"Votre problème à bien été transmis à nos Administrateur";
}
echo"<form action=''>";
echo"<input type='submit' name='valider' class='button' value='Retourner page connexion'/>";
echo"</form>";
?>
