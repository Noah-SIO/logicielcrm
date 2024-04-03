<html>
    <form method="post">
        <fieldset>
            <legend>Formulaire de modification de profil</legend>
            <label for="nom">Nom</label></br>
            <input type="text" name="nom" id="nom" placeholder="ex : David"></br>
            <label for="prenom">Prénom</label></br>
            <input type="text" name="prenom" id="prenom" placeholder="ex : Dupont"></br>
            <label for="login">Identifiant</label></br>
            <input type="text" name="login" id="login" placeholder="ex : daponT"></br>
            <label for="mdp">Mot de passe</label></br>
            <input type="text" name="mdp" id="mdp" placeholder="ex : davidDUPONT1234"></br>
            <label for="droit">Droit (poste)</label></br>
            <input type="number" name="droit" id="droit" placeholder="ex : 1 (=  Conseiller client)"></br>
            <input type="submit" name="rechercher" id='rechercher' value='Modifier'></br>
        </fieldset>           
    </form>
</html>
<?php

if (isset($_GET['id'], $_POST['nom'], $_POST['prenom'], $_POST['login'], $_POST['mdp'], $_POST['droit'])){
    $utilisateur = new Utilisateur($_GET['id'], $_POST['nom'], $_POST['prenom'], $_POST['login'], $_POST['mdp'], $_POST['droit']);
    $utilisateurProfil = new ManagerUtilisateur();
    $utilisateurProfil -> ModifyUser($utilisateur);
}

?>