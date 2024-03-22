<html>
    <form method="post">
            <label for="login">Identifiant</label></br>
            <input type="text" name="login" id="login"></br>
            <label for="password"> Mot de passe</label></br>
            <input type="password" name="password" id="password"></br>
            <input type="submit" name="connection" id='connection'>  </br></br>
    </form>
    </br>
</html>
<?php

$testManager = new ManagerUtilisateur();

if (isset($_POST['login']) && isset($_POST['password'])){
    $testManager -> GetUser($_POST['login']);
    $testManager -> checkLoginInfos($_POST['login'], $_POST['password']);
    if ($testManager -> checkLoginInfos($_POST['login'], $_POST['password']) == true){
        header("Location: ?id=".$testManager -> GetUser($_POST['login'])[0]['id']."&action=tableauDeBord");
    } else if ($testManager -> checkLoginInfos($_POST['login'], $_POST['password']) == false){
        echo "Erreur de connexion";
    }
}

?>