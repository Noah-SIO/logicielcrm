<html>
    <form method="post">
        <fieldset>
            <legend>Formulaire de modification de profil</legend>
            <label for="nom">Nom</label></br>
            <input type="text" name="nom" id="nom" value="<?php echo $_GET['nom'] ?>"></br>
            <label for="prenom">Prénom</label></br>
            <input type="text" name="prenom" id="prenom" value="<?php echo $_GET['prenom'] ?>"></br>
            <label for="login">Identifiant</label></br>
            <input type="text" name="login" id="login" value="<?php echo $_GET['login'] ?>"></br>
            <label for="mdp">Mot de passe</label></br>
            <input type="text" name="mdp" id="mdp" placeholder="ex : davidDUPONT1234"></br>
            <label for="droit">Droit (poste)</label></br>
            <select name="pets" id="pet-select">
                <option value="">- Choisir un droit -</option>
                <option value=1>Conseiller client</option>
                <option value=2>Manager</option>
                <option value=3>Commercial</option>
                <option value=4>Comptable</option>
                <option value=5>Responsable informatique</option>
                <option value=6>Directeur général</option>
            </select>
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