<?php
require_once("../Class/fichecontact.php");///////A supprimer quand constructeur en place 
$bdsqll = new PDO("mysql:host=localhost;dbname=crm", 'root', '');//même chose
$ContactFiche = new Contact($bdsqll);//même chose
echo"<h1>Formulaire Création de Fiche Contact</h1>";
echo"<form method='post'>";
    echo"<label for='identer'>L'id de l'Entreprise :</label></br></br>";
    echo"<input type='number' name='identer' placeholder='ex : 1515' min='1' required></br></br>";
    echo"<label for='moyen'>Le moyens de contact(Telephone Fixe 1, Smartphone 2, Email 3) :</label></br></br>";
    echo"<input type='number' name='moyen' placeholder='0606060606 = 2' min='1' max='3' required></br></br>";
    echo"<label for='dem'>La Demande :</label></br></br>";
    echo"<input type='text' name='dem' placeholder='ex : probleme impression' required></br></br>";
    echo"<label for='rep'>Et La Réponse :</label></br></br>";
    echo"<textarea id='rep' name='rep' rows='7' cols='50' placeholder='Nous vous envoyons les données par mail' required></textarea></br></br>";
    echo"<input type='submit' name='valider'class='button' value='Creer le Contact'/>";
echo"</form>";
if (isset($_POST['valider'])) {
    $iduser=$_SESSION['id'];
    $newContact = new FicheContact( $iduser,$_POST['identer'],$_POST['moyen'],$_POST['dem'],$_POST['rep'],date('Y-m-d'));
    $ContactFiche->createFicheContact($newContact);
    echo"<p>Fiche Contact Creer avec Succès !!!</p>";
}
?>