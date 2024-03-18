<?php

require_once('utilisateur.php');
$test = new Utilisateur("Martin", "Robert", "Rmartin", 1, "martin71", "martin@test.fr", 0606060606);
//$nom = $test -> getNom();
//echo $nom;

?>

<html>
    <form method="post">
            <label for="login">identifiant</label></br>
            <input type="text" name="login" id="login"></br>
            <label for="password"> mot de passe</label></br>
            <input type="password" name="password" id="password"></br>
            <input type="submit" name="connection" id='connection'>  </br></br>
    </form>
</html>

<?php

$testManager = new ManagerUtilisateur();
/*if (isset($_POST['login'])){
    $testManager -> verifIdentifiant($_POST['login']);
}
if (isset($_POST['password'])){
    $testManager -> verifPassword($_POST['password']);
}*/

// test connexion 
if (isset($_POST['login']) && isset($_POST['password'])){
    $testManager -> verifConnexion($_POST['login'], $_POST['password']);
    if ($testManager == true){
        echo "true";
    } else {
        echo "false";
    }
}
?>