<?php
if(isset($_POST['id'])){
    $contact->deleteContact($_POST['id']);
    echo"<h3>Contact Supprime</h3>";
    //echo "<script>setTimeout(function(){location.reload(); },3000);</script>";}
    
require_once("../Class/fichecontact.php");///////A supprimer quand constructeur en place 
$bdsqll = new PDO("mysql:host=localhost;dbname=crm", 'root', '');//même chose
$contact = new Contact($bdsqll);//même chose
echo"<form method='post'>";
echo"<label for='id'>Entrer L'id du Contact à Supprimer :</label></br></br>";
echo"<input type='text' name='id' placeholder='1, 2, 3...' required></br></br>";
echo"<input type='submit' class='button' name='valider' class='button' value='supprimer Contact'/>";
echo"</form>";
}





?>