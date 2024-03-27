<html>
    <form method="post">
        <fieldset>
            <legend>Connexion</legend>
            <label for="login">Identifiant</label></br>
            <input type="text" name="login" id="login"></br>
            <label for="password">Mot de passe</label></br>
            <input type="password" name="password" id="password"></br>
            <input type="submit" name="connection" id='connection' value="Se connecter"></br>
        </fieldset>
    </form>
</html>
<?php

if (isset($_POST['login']) && isset($_POST['password'])){
    $utilisateur = new ManagerUtilisateur();
    $utilisateur -> GetUser($_POST['login']);
    $utilisateur -> checkLoginInfos($_POST['login'], $_POST['password']);
    if ($utilisateur -> checkLoginInfos($_POST['login'], $_POST['password']) == true){
        $_SESSION['id'] = $utilisateur -> GetUser($_POST['login'])[0]['id'];
        $_SESSION['nom'] = $utilisateur -> GetUser($_POST['login'])[0]['nom'];
        $_SESSION['prenom'] = $utilisateur -> GetUser($_POST['login'])[0]['prenom'];
        $_SESSION['droit'] = $utilisateur -> GetUser($_POST['login'])[0]['droit'];
        header("Location: ?action=tableauDeBord");
    } else if ($utilisateur -> checkLoginInfos($_POST['login'], $_POST['password']) == false){
        echo "-- Erreur de connexion --";
    }
}

?>